<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiringRequest extends Model
{
    use HasFactory;

    protected $table = 'hiring_requests';

    protected $fillable = [
        'name',
        'email',
        'country',
        'applying_for',
        'birthdate',
        'question_one',
        'question_two',
        'question_three',
        'question_four',
        'question_five',
        'question_six',
        'question_seven',
        'question_eight',
        'question_nine',
        'files_link'
    ];
}
