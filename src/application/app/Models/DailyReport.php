<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    // table name
    protected $table = 'daily_report';

    //primary key
    public $primarykey = 'id';

    // timestamps

    public $timestamps = true;
}
