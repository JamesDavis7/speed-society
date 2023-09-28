<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMeetupRequest;
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
     * Displays the create page.
     */
    public function create()
    {
        $locations = Location::all();
        $categories = MeetupCategoryEnum::cases();
        return view('pages.meetups.create', compact('categories', 'locations'));
    }

    /**
     * Stores the user input
     */
    public function store(CreateMeetupRequest $request)
    {
        $validatedData = $request->validated();
    
        $validatedData['organiser_id'] = Auth::id();

        Meetup::create($validatedData);

        return redirect()->route('meetups.index');
    }

    /**
     * Displays the edit page
     */
    public function edit($id)
    {
        $meetup = Meetup::findOrFail($id);
        $locations = Location::all();
        $categories = MeetupCategoryEnum::cases();
        return view('pages.meetups.edit', compact('locations', 'categories', 'meetup' ));
    }

    /**
     * Updates the previous user input
     */
    public function update(CreateMeetupRequest $request, $id)
    {
        $validatedData = $request->validated();

        $meetup = Meetup::find($id);
        $meetup->update($validatedData);

        return redirect()->route('meetups.index');
    }


    public function destroy()
    {

    }
}
