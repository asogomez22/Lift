<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'required|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'privacy' => 'accepted',
        ]);

        // Send email via native PHP mail()
        $to = 'Mcano@lift-es.com';
        $emailSubject = 'Contacto Web LIFT: ' . $validated['subject'];

        $body = "
        <html><body style='font-family:Arial,sans-serif;color:#333'>
        <h2 style='color:#ff3333'>Nuevo mensaje desde el formulario de contacto</h2>
        <table style='border-collapse:collapse;width:100%'>
            <tr><td style='padding:8px;font-weight:bold;border-bottom:1px solid #eee'>Nombre</td><td style='padding:8px;border-bottom:1px solid #eee'>{$validated['name']}</td></tr>
            <tr><td style='padding:8px;font-weight:bold;border-bottom:1px solid #eee'>Empresa</td><td style='padding:8px;border-bottom:1px solid #eee'>" . ($validated['company'] ?? '—') . "</td></tr>
            <tr><td style='padding:8px;font-weight:bold;border-bottom:1px solid #eee'>Email</td><td style='padding:8px;border-bottom:1px solid #eee'>{$validated['email']}</td></tr>
            <tr><td style='padding:8px;font-weight:bold;border-bottom:1px solid #eee'>Teléfono</td><td style='padding:8px;border-bottom:1px solid #eee'>" . ($validated['phone'] ?? '—') . "</td></tr>
            <tr><td style='padding:8px;font-weight:bold;border-bottom:1px solid #eee'>Servicio</td><td style='padding:8px;border-bottom:1px solid #eee'>{$validated['service']}</td></tr>
            <tr><td style='padding:8px;font-weight:bold;border-bottom:1px solid #eee'>Asunto</td><td style='padding:8px;border-bottom:1px solid #eee'>{$validated['subject']}</td></tr>
            <tr><td style='padding:8px;font-weight:bold' valign='top'>Mensaje</td><td style='padding:8px'>" . nl2br(e($validated['message'])) . "</td></tr>
        </table>
        <p style='margin-top:20px;font-size:12px;color:#999'>Enviado desde el formulario de contacto de lift-es.com</p>
        </body></html>";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: LIFT Web <noreply@lift-es.com>\r\n";
        $headers .= "Reply-To: {$validated['email']}\r\n";

        mail($to, $emailSubject, $body, $headers);

        // Store in database
        \App\Models\ContactMessage::create($validated);

        Log::info('Contact form submitted:', $validated);

        return back()->with('success', '¡Gracias! Hemos recibido tu consulta. Te responderemos en breve.');
    }
}
