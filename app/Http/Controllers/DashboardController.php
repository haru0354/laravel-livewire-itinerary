<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function show($trip_id)
    {
        return view('dashboard.trip-show', ['trip_id' => $trip_id]);
    }
}
