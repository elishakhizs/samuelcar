<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    protected $fillable = [
        'title',
        'prize_name',
        'prize_value',
        'ticket_price',
        'max_entries',
        'draw_date',
        'status'
    ];

    // Relationships
    public function entries()
    {
        return $this->hasMany(entries::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'entries');
    }

    public function show($id)
    {
        $competition = Competitions::findOrFail($id);

        return view('pay', compact('competition')); // 👈 reuse your Pay page
    }
}

