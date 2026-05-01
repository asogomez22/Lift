<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Support\HandlesPublicUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    use HandlesPublicUploads;
    /**
     * Display a listing of clients
     */
    public function index()
    {
        $clients = Client::ordered()->get();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Show the form for editing a client
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Store a newly created client in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'logo' => 'required|file|mimes:jpeg,jpg,png,svg,webp|max:2048', // 2MB max
        ]);

        // Upload logo using safe pattern
        $logoPath = $this->storeAndReplace(
            $request->file('logo'),
            'clients'
        );

        // Get next display_order
        $maxOrder = Client::max('display_order') ?? 0;

        // Create client
        $client = Client::create([
            'name' => $request->name,
            'logo_path' => $logoPath,
            'display_order' => $maxOrder + 1,
        ]);

        return redirect()->route('clients.index')->with('success', 'Cliente añadido correctamente.');
    }

    /**
     * Update an existing client
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'logo' => 'nullable|file|mimes:jpeg,jpg,png,svg,webp|max:2048',
            'display_order' => 'nullable|integer',
        ]);

        $data = [
            'name' => $request->name,
            'display_order' => $request->display_order ?? $client->display_order
        ];

        // If new logo uploaded, replace old one using safe pattern
        if ($request->hasFile('logo')) {
            $data['logo_path'] = $this->storeAndReplace(
                $request->file('logo'),
                'clients',
                $client->logo_path
            );
        }

        $client->update($data);

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified client from storage
     */
    public function destroy(Client $client)
    {
        // Delete logo file if it's in storage (not an asset)
        if (str_starts_with($client->logo_path, 'clients/')) {
            Storage::disk('public')->delete($client->logo_path);
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
