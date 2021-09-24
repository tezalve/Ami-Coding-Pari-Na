<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoj extends Model
{
    use HasFactory;
    protected $table = 'sorted';
    protected $fillable = [
        'sorted',
        'user_id'
    ];
}
