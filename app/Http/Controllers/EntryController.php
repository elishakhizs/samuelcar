<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Competition;
use App\Models\Competitions;
use App\Models\entries;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function EntryFree(Request $request, $id)
    {
        if (!Auth::check()) {
            return back()->with('error', 'You must be logged in.');
        }

        if ($request->answer === "Abuja")
        {

            $user = Auth::user();
            $competition = Competitions::findOrFail($id);

            if (!entries::where('user_id', $user->id)
            ->where('competition_id', $competition->id)
            ->exists()) {

                entries::create([
                    'user_id' => $user->id,
                    'competition_id' => $competition->id,
                    'type' => 'free'
                ]);

                $freeTickets = session()->get('free_tickets', []);

                $freeTickets[$competition->id] = [
                    'quantity' => 15
                ];
                session()->put('free_tickets', $freeTickets);
                return back()->with('success', 'You received 15 free tickets!');
            }

        }
        return back()->with('error', 'You already entered this competition.');
    }
    
    public function pay(Request $request, $id)
    {
        $user = Auth::user();
        $competition = Competitions::findOrFail($id);

        // simulate payment success for now
        entries::create([
            'user_id' => $user->id,
            'competition_id' => $competition->id,
            'type' => 'paid'
        ]);

        return back()->with('success', 'Payment successful, entry added!');
    }
}