<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Meetup;

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
     * Display a single meetup.
     */
    public function single($id): View
    {
        $meetup = Meetup::with('user')->where('id', $id)->firstOrFail();

        return view('pages.meetups.single', [
            'meetup' => $meetup
        ]);
    }
}
