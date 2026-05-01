<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $message)
    {
        if (!$message->read_at) {
            $message->update(['read_at' => now()]);
        }
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Mensaje eliminado.');
    }
}
