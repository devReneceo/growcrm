<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Models\DailyReport;
use App\Models\Remainder;
class ProgramController extends Controller
{
    public function joel(Request $request)
    {
        return json_encode(['test' => 'okok']);
    }
}
