<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMeetupRequest;
use Illuminate\View\View;
use App\Models\Meetup;
use Illuminate\Support\Facades\Auth;
use App\Enums\MeetupCategoryEnum;

class MeetupController extends Controller
{
    /**
     * Display the meetups index view.
     */
    public function index(): View
    {
        return view('pages.meetups.index');
    }

    /**
     * Displays the create page.
     */
    public function create()
    {
        $categories = MeetupCategoryEnum::cases();
        return view('pages.meetups.create', compact('categories'));
    }

    /**
     * Stores the user input from the create page fields
     */
    public function store(CreateMeetupRequest $request)
    {
        $validatedData = $request->validated();
    
        $validatedData['organiser_id'] = Auth::id();

        Meetup::create($validatedData);

        return redirect()->route('meetups.index');
    }
}
