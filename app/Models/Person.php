<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'name',
        'document_type',
        'document_number',
        'address',
        'phone',
        'email',
    ];
}
