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

class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Dashboard', [
            'rescues' => Rescue::with('user', 'vehicle')->orderBy('id', 'DESC')->get(),
            'cr' => Rescue::where('status', 1)->count(),
            'pr' => Rescue::where('status', 0)->count(),
        ]);
    }
}
