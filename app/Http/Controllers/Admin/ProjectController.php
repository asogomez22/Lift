<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Support\HandlesPublicUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    use HandlesPublicUploads;
    public function index()
    {
        $projects = Project::ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'required|image|max:10240',
            'gallery_images.*' => 'nullable|image|max:10240',
            'tags' => 'nullable|string|max:500',
        ]);

        $coverPath = $this->storeAndReplace(
            $request->file('cover_image'),
            'projects'
        );
        $maxOrder = Project::max('display_order') ?? 0;

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $coverPath, // For backward compatibility
            'cover_image' => $coverPath,
            'tags' => $request->tags,
            'display_order' => $maxOrder + 1,
        ]);

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $index => $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->images()->create([
                    'image_path' => $path,
                    'display_order' => $index,
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Proyecto añadido correctamente.');
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:10240',
            'gallery_images.*' => 'nullable|image|max:10240',
            'tags' => 'nullable|string|max:500',
            'delete_gallery_images' => 'nullable|array',
            'delete_gallery_images.*' => 'exists:project_images,id',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'tags' => $request->tags,
        ];

        // Update cover image if provided using safe pattern
        if ($request->hasFile('cover_image')) {
            $newCover = $this->storeAndReplace(
                $request->file('cover_image'),
                'projects',
                $project->cover_image ?? $project->image_path
            );

            $data['cover_image'] = $newCover;
            $data['image_path'] = $newCover; // backward compatibility
        }

        $project->update($data);

        // Add new gallery images
        if ($request->hasFile('gallery_images')) {
            $maxOrder = $project->images()->max('display_order') ?? -1;
            foreach ($request->file('gallery_images') as $index => $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->images()->create([
                    'image_path' => $path,
                    'display_order' => $maxOrder + $index + 1,
                ]);
            }
        }

        // Delete selected gallery images
        if ($request->delete_gallery_images) {
            foreach ($request->delete_gallery_images as $imageId) {
                $image = $project->images()->find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->image_path);
                    $image->delete();
                }
            }
        }

        return redirect()->route('projects.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project)
    {
        // Delete cover image
        $cover = $this->normalizePublicPath($project->cover_image ?? $project->image_path);
        if ($cover) {
            Storage::disk('public')->delete($cover);
        }

        // Delete all gallery images from storage and database
        foreach ($project->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }
        $project->images()->delete();

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Proyecto eliminado correctamente.');
    }
}
