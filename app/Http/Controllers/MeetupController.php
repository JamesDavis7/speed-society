<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetupRequest;
use Illuminate\View\View;
use App\Models\Meetup;
use Illuminate\Support\Facades\Auth;
use App\Enums\MeetupCategoryEnum;
use App\Models\Location;
use App\Models\User;

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
        $meetup = new Meetup();
        $locations = Location::all();
        $categories = MeetupCategoryEnum::cases();
        return view('pages.meetups.create', compact('categories', 'locations', 'meetup'));
    }

    /**
     * Stores the user input.
     */
    public function store(MeetupRequest $request)
    {
        $validatedData = $request->validated();

        $meetup = Meetup::create($validatedData);

        $user = Auth::user();

        $user->meetups()->attach($meetup->id, ['role' => 'organiser']);

        session()->flash('meetupSuccess', 'Meetup created successfully!');

        return redirect()->route('meetups.my-meetups')->with('meetupSuccess', 'Meetup create successfully!');
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
    public function update(MeetupRequest $request, $id)
    {
        $validatedData = $request->validated();
        $meetup = Meetup::find($id);
        $meetup->update($validatedData);

        session()->flash('meetupSuccess', 'Meetup updated successfully!');

        return redirect()->route('meetups.my-meetups');    
    }

    /**
     * Deletes the meetup from the database.
     */
    public function destroy($id)
    {
        $meetup = Meetup::findOrFail($id);

        $relatedUser = User::find(Auth::id());
        $relatedUser->meetups()->detach($id);

        $meetup->delete();
    
        session()->flash('meetupSuccess', 'Meetup deleted successfully!');

        return redirect()->route('meetups.my-meetups');    
    }
}
