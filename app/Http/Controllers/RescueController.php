<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rescue;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class RescueController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('RescueRequest', [
            'rescues' => Rescue::with('user', 'vehicle')->orderBy('id', 'DESC')->get(),
            'vehicles' => Vehicle::with('user')->get(),
        ]);
    }

    public function new(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'vehicle' => 'required',
        ]);

        $vehicle = Vehicle::find($request->vehicle);

        $rescue = Rescue::create([
            'user_id' => Auth::id(),
            'vehicle_id' => $request->vehicle,
            'title' => $request->title,
            'location' => $request->location,
            'order_id' => rand(1111111111,9999999999),
        ]);

        return Redirect::route('rescue.request');
    }

    public function status(Request $request): RedirectResponse
    {
        $rescue = Rescue::find($request->id);
        if($rescue->status){
            $rescue->status = 0;
        }else{
            $rescue->status = 1;
        }

        $rescue->save();

        return Redirect::route('dashboard');
    }
}
