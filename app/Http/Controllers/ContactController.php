<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        if ($request->filled('website')) {
            return back()->with('success', 'Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ], [
            'name.required' => 'Veuillez indiquer votre nom.',
            'message.required' => 'Veuillez écrire votre message.',
            'email.email' => 'L\'adresse e-mail n\'est pas valide.',
        ]);

        $contactMessage = ContactMessage::create($validated);

        try {
            Mail::to(config('gigabits.mail_to'))
                ->send(new ContactFormSubmitted($contactMessage));

            Log::info('Message contact envoyé par e-mail.', [
                'contact_message_id' => $contactMessage->id,
                'to' => config('gigabits.mail_to'),
            ]);
        } catch (\Throwable $e) {
            Log::error('Échec envoi e-mail contact.', [
                'contact_message_id' => $contactMessage->id,
                'error' => $e->getMessage(),
            ]);
        }

        return back()->with('success', 'Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.');
    }
}
