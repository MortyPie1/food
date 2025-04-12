<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;



class Food extends Model
{
    protected $fillable = ['name', 'plu_code'];

    // Add this line to tell Laravel the correct table name
    protected $table = 'foods';
}
