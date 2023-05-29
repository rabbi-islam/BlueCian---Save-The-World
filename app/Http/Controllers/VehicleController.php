<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('VehiclesList', [
            'vehicles' => Vehicle::with('user')->get(),
        ]);
    }

    public function new(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required',
            'img' => 'required',
            'price' => 'required',
        ]);

        $vehicle = Vehicle::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'desc' => $request->desc,
            'price' => $request->price,
            'img' => $request->img,
        ]);

        return Redirect::route('vehicles.list');
    }
}
