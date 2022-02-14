<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // Define table name
    protected $table = 'recipes';

    // Allow which columns can insert,update data and which don'ts
    protected $fillables = ['name','image','description','ingredients','category'];
}
