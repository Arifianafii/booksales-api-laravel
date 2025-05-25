<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
<<<<<<< HEAD
        'name', 'title'];
=======
        'name', 'title', 'genres'];
>>>>>>> ba6352a56acf224075111c2d03053095babc5e19
}