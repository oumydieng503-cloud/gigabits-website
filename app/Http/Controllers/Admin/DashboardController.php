<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'applicationsCount' => JobApplication::count(),
            'unreadApplications' => JobApplication::whereNull('read_at')->count(),
            'messagesCount' => ContactMessage::count(),
            'unreadMessages' => ContactMessage::whereNull('read_at')->count(),
            'recentApplications' => JobApplication::latest()->limit(5)->get(),
            'recentMessages' => ContactMessage::latest()->limit(5)->get(),
        ]);
    }

    public function applications()
    {
        $applications = JobApplication::latest()->paginate(15);

        return view('admin.applications', compact('applications'));
    }

    public function showApplication(JobApplication $application)
    {
        if ($application->isUnread()) {
            $application->update(['read_at' => now()]);
        }

        return view('admin.application-show', compact('application'));
    }

    public function downloadCv(JobApplication $application): StreamedResponse
    {
        abort_unless($application->cv_path && Storage::disk('public')->exists($application->cv_path), 404);

        return Storage::disk('public')->download($application->cv_path);
    }

    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(15);

        return view('admin.messages', compact('messages'));
    }

    public function showMessage(ContactMessage $message)
    {
        if ($message->read_at === null) {
            $message->update(['read_at' => now()]);
        }

        return view('admin.message-show', compact('message'));
    }

    public function destroyApplication(JobApplication $application)
    {
        if ($application->cv_path) {
            Storage::disk('public')->delete($application->cv_path);
        }

        $application->delete();

        return redirect()->route('admin.applications')->with('success', 'Candidature supprimée.');
    }

    public function destroyMessage(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages')->with('success', 'Message supprimé.');
    }
}
