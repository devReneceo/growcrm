<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //    use HasFactory;
    // table name
    protected $table = 'program';

    //primary key
    public $primarykey = 'id';

    // timestamps

    public $timestamps = true;
}
