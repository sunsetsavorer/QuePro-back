<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prize_fund',
        'event_date',
        'tournament_discipline_id',
        'user_id',
    ];

    public function discipline(): HasOne
    {
        return $this->hasOne(TournamentDiscipline::class, 'id', 'tournament_discipline_id');
    }
}
