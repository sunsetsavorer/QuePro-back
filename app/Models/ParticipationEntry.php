<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipationEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'team_name',
        'captain_fullname',
        'captain_phone',
        'captain_email',
    ];
}
