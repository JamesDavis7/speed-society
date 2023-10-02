<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Group;

class GroupController extends Controller
{
    /**
     * Display the groups index view.
     */
    public function index(): View
    {
        return view('pages.groups.index');
    }

}
