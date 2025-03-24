<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $fillable = [
        'full_name',
        'college',
        'course',
        'age',
        'contact_number',
        'email',
        'accepted_terms',
        'status',
    ];
}

