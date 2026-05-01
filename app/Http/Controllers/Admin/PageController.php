<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\ContentBlock;
use App\Support\HandlesPublicUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    use HandlesPublicUploads;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Filter out pages that should not be managed here or are unwanted
        $pages = Page::whereNotIn('slug', [
            'proyectos',
            'contacto',
            'prueba',
            'estudios-tecnicos',
            'estudios', // just in case
        ])->get();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $page->load('contentBlocks');
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $inputs = $request->input('blocks', []);
        $files = $request->file('blocks', []);

        // 1. Process text inputs and deletions (empty values)
        foreach ($inputs as $id => $content) {
            $block = ContentBlock::find($id);
            if ($block && $block->page_id === $page->id) {
                // If content is empty string and block is an image, delete the image
                if ($content === '' && $block->type === 'image') {
                    if ($block->value) {
                        $oldPath = $this->normalizePublicPath($block->value);
                        if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                            Storage::disk('public')->delete($oldPath);
                        }
                    }
                    $block->update(['value' => null]);
                } else {
                    // Regular text update
                    $block->update(['value' => $content]);
                }
            }
        }

        // 2. Process file uploads (images) using safe pattern
        foreach ($files as $id => $file) {
            $block = ContentBlock::find($id);
            if ($block && $block->page_id === $page->id) {
                $path = $this->storeAndReplace(
                    $file,
                    'pages/' . $page->slug,
                    $block->value
                );
                $block->update([
                    'value' => $path,
                    'type' => 'image'
                ]);
            }
        }

        // Return appropriate response based on request type
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Contenido actualizado.']);
        }

        return redirect()->route('pages.edit', $page)->with('success', 'Contenido actualizado.');
    }

    /**
     * Upload an image for a specific content block via AJAX.
     * This dedicated POST route avoids 405 errors from PUT method spoofing with multipart data.
     */
    public function uploadBlockImage(Request $request, Page $page, ContentBlock $block)
    {
        // Verify the block belongs to this page
        abort_unless($block->page_id === $page->id, 404);

        $request->validate([
            'image' => 'required|image|max:5120', // 5MB max
        ]);

        // Save new image first using safe pattern
        $path = $this->storeAndReplace(
            $request->file('image'),
            'pages/' . $page->slug,
            $block->value
        );

        // Update the block
        $block->update([
            'value' => $path,
            'type' => 'image',
        ]);

        return response()->json([
            'ok' => true,
            'url' => asset('storage/' . $path),
            'path' => $path,
        ]);
    }

    /**
     * Delete an image from a specific content block via AJAX.
     */
    public function deleteBlockImage(Request $request, Page $page, ContentBlock $block)
    {
        // Verify the block belongs to this page
        abort_unless($block->page_id === $page->id, 404);

        // Delete the image file if it exists and is local
        if ($block->value && !str_starts_with($block->value, 'http')) {
            $old = $this->normalizePublicPath($block->value);
            if ($old && Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
        }

        // Clear the block value
        $block->update(['value' => null]);

        return response()->json(['ok' => true]);
    }
}
