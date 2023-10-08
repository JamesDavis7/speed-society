<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMeetupRequest;
use App\Http\Requests\EditMeetupRequest;
use Illuminate\View\View;
use App\Models\Meetup;
use Illuminate\Support\Facades\Auth;
use App\Enums\MeetupCategoryEnum;
use App\Models\Location;

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
     * Display the users personal created meetups.
     */
    public function myMeetups(): View
    {
        $userMeetups = auth()->user()->meetups;
        return view('pages.meetups.my-meetups', compact('userMeetups'));
    }

    /**
     * Displays the create page.
     */
    public function create(Meetup $meetup): View
    {
        $meetup = Meetup::firstOrFail();
        $locations = Location::all();
        $categories = MeetupCategoryEnum::cases();
        return view('pages.meetups.create', compact('categories', 'locations', 'meetup'));
    }

    /**
     * Stores the user input.
     */
    public function store(CreateMeetupRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['organiser_id'] = Auth::id();
        Meetup::create($validatedData);

        session()->flash('success', 'Meetup created successfully!');

        return redirect()->route('meetups.index');    
}

    /**
     * Displays the edit page.
     */
    public function edit($id): View
    {
        $meetup = Meetup::findOrFail($id);
        $categories = MeetupCategoryEnum::cases();
        $locations = Location::all();

        return view('pages.meetups.edit', compact('meetup', 'categories', 'locations'));
    }

    /**
     * Updates the previous user input.
     */
    public function update(EditMeetupRequest $request, $id)
    {
        $validatedData = $request->validated();
        $meetup = Meetup::find($id);
        $meetup->update($validatedData);

        session()->flash('success', 'Meetup updated successfully!');

        return redirect()->route('meetups.index');    
    }

    /**
     * Deletes the meetup from the database.
     */
    public function destroy($id)
    {
        $meetup = Meetup::findOrFail($id);
        $meetup->delete();
    
        session()->flash('success', 'Meetup deleted successfully!');

        return redirect()->route('meetups.index');    
    }
}
