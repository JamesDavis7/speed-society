<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{

    /**
     * Display the dashboard.
     */
    public function index(): View
    {
        return view('pages.dashboard');
    }
}