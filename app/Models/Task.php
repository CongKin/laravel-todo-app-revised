<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // to store specific info when create new data
    protected $fillable = [
        'task',
        'description',
        'status',
        'priority',
        'deadline',
        'user_session',
    ];
}
