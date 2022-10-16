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
        'meeting_date',
        'time_before_meeting',
        'meeting_link',

    ];
}
