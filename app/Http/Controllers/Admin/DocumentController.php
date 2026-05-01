<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Support\HandlesPublicUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    use HandlesPublicUploads;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::latest()->paginate(20);
        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'section' => 'required|string|in:formacion,proyectos',
            'file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
            'is_visible' => 'boolean',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $this->storeAndReplace(
                $request->file('file'),
                'documents'
            );
        }

        $validated['is_visible'] = $request->has('is_visible');

        Document::create($validated);

        return redirect()->route('documents.index')->with('success', 'Documento subido correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'section' => 'required|string|in:formacion,proyectos',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'is_visible' => 'boolean',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $this->storeAndReplace(
                $request->file('file'),
                'documents',
                $document->file_path
            );
        }

        $validated['is_visible'] = $request->has('is_visible');

        $document->update($validated);

        return redirect()->route('documents.index')->with('success', 'Documento actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Documento eliminado.');
    }

    public function toggleVisibility(Document $document)
    {
        $document->update(['is_visible' => !$document->is_visible]);
        return back()->with('success', 'Visibilidad actualizada.');
    }
}
