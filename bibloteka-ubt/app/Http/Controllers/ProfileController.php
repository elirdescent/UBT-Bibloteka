<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Book;
use App\Models\CheckInHistory;
use App\Models\Student;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index()
    {
        // Get the current date and time
        $now = \Carbon\Carbon::now();
    
        // Calculate the timestamp for 24 hours ago
        $last24Hours = $now->subDay();
    
        // Number of check-ins in the last 24 hours
        $checkInsCount = CheckInHistory::where('timestamp', '>=', $last24Hours)->count();
    
        // Number of new books in the last 24 hours
        $newBooksCount = Book::where('created_at', '>=', $last24Hours)->count();
    
        // Number of new students in the last 24 hours
        $newStudentsCount = Student::where('created_at', '>=', $last24Hours)->count();
    
        // Get all check-in records from the last 24 hours
        $checkInRecords = CheckInHistory::where('timestamp', '>=', $last24Hours)->get();

        $newStudents = Student::where('created_at', '>=', $last24Hours)->get();

        $username = Auth::user()->name;
    
        // Pass the data to the home dashboard view
        return view('dashboard', [
            'checkInsCount' => $checkInsCount,
            'newBooksCount' => $newBooksCount,
            'newStudentsCount' => $newStudentsCount,
            'checkInRecords' => $checkInRecords,
            'newStudents' => $newStudents,
            'username' => $username,
        ]);
    }
    
}
