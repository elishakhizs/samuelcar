<?php

namespace App\Http\Controllers;

use App\Models\Competitions;
use App\Models\entries;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Entry;


class CompetitionController extends Controller
{

    // 🔹 Show SINGLE competition (your "Pay" page)
    public function show($id)
    {
        $competition = Competitions::findOrFail($id);

        return view('pay', compact('competition')); // reuse your Pay blade
        
    }
    
    public function store(Request $request)
    {
        Competitions::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'prize_name' => $request->prize_name,
            'prize_value' => $request->prize_value,
            'ticket_price' => $request->ticket_price,
            'max_entries' => $request->max_entries,
            'draw_date' => $request->draw_date,
            'status' => 'active'
        ]);

        return back()->with('success', 'Competition created!');
    }
}