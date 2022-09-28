<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Models\DailyReport;
use App\Models\Remainder;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ProgramController extends Controller
{
    public function joel(Request $request)
    {
        echo json_encode(['test' => 'okok']);
        die();
    }
}
