<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    public function show($id)
    {
        $route = Route::find($id); // Replace with data retrieval logic
        // Fetch associated bus stops, route details, and stop times here

        return view('routes.show', compact('route'));
    }
}
