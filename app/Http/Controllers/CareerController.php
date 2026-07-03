<?php

namespace App\Http\Controllers;

use App\Mail\JobApplicationSubmitted;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    public function index()
    {
        return view('careers.index');
    }

    public function store(Request $request)
    {
        if ($request->filled('website')) {
            return back()->with('success', 'Votre candidature a bien été envoyée. Nous vous recontacterons si votre profil correspond.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'type' => ['required', 'in:stage,emploi'],
            'position' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:5000'],
            'cv' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ], [
            'name.required' => 'Veuillez indiquer votre nom.',
            'email.required' => 'Veuillez indiquer votre e-mail.',
            'email.email' => 'L\'adresse e-mail n\'est pas valide.',
            'type.required' => 'Choisissez stage ou emploi.',
            'type.in' => 'Le type de candidature est invalide.',
            'cv.mimes' => 'Le CV doit être un fichier PDF, DOC ou DOCX.',
            'cv.max' => 'Le CV ne doit pas dépasser 5 Mo.',
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        $application = JobApplication::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'type' => $validated['type'],
            'position' => $validated['position'] ?? null,
            'message' => $validated['message'] ?? null,
            'cv_path' => $cvPath,
        ]);

        try {
            Mail::to(config('gigabits.mail_to'))
                ->send(new JobApplicationSubmitted($application));
        } catch (\Throwable $e) {
            Log::error('Échec envoi e-mail candidature.', [
                'job_application_id' => $application->id,
                'error' => $e->getMessage(),
            ]);
        }

        return back()->with('success', 'Votre candidature a bien été envoyée. Nous vous recontacterons si votre profil correspond.');
    }
}
