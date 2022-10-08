<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoiceMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'country',
        'birthdate',
        'app',
        'meeting-date',
        'time-before-meeting',
        'meeting-link',

    ];
}
