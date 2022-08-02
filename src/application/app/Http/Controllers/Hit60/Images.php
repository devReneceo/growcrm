<?php

namespace App\Http\Controllers\Api\Hit60;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyReport;
class Images extends Controller
{
    public function updatePhotoProgress(Request $request)
    {
        try {
            DailyReport::where('id', $request->input('dailyId'))->update([
                'picture_progress' => $request->input('name'),
            ]);
            echo json_encode([
                'status' => 'updated',
            ]);
        } catch (Throwable $th) {
            echo json_encode(['updarted' => 'ok', 'error' => $th]);
        }
    }
}
