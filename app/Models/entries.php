<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Competition;


class entries extends Model
{
    protected $fillable = [
        'user_id',
        'competition_id',
        'type',
        'reference'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competitions()
    {
        return $this->belongsTo(Competitions::class);
    }
}