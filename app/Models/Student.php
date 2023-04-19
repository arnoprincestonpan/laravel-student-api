<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // if you don't list this it'll auto assign an id
    protected $primaryKey = 'id';

    protected $fillable = [
        'FirstName',
        'LastName',
        'School'
    ];
}
