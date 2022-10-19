<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'country',
        'birthdate',
        'app',
        'about',
        'goals',
        'budget',
        'logo_info',
        'logo_file',
        'more_info',
        'more_info_file',
    ];
}
