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
        'applying-for',
        'birthdate',
        'questions-answers',
    ];
}
