<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Meetup;

class MeetupController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index($id): View
    {
        $meetup = Meetup::with('user')->where('id', $id)->firstOrFail();

        return view('pages.meetup-directory.single', [
            'meetup' => $meetup
        ]);
    }
}
