<?php

namespace App\Http\Controllers\Hit60;

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
        echo '11111';
    }
    public function dailyReport(Request $request)
    {
        $user = $request->input('user');
        $day = $request->input('day');

        $remainders = '[]';
        $program = Program::where('user_id', $user)
            ->take(1)
            ->get();

        if (!$program) {
            echo json_encode([]);
            die();
        }
        $program = $program[0];

        $dailyReport = DailyReport::where('program_id', $program->id)
            ->where('start_date', $day)
            ->get();

        $remainders = Remainder::where('program_id', $program->id)->get();

        if (count($remainders) == 0) {
            $remainders = '[]';
        }

        echo json_encode([
            'program' => [
                'id' => $program->id,
                'user_id' => $program->user_id,
                'daily_settings' => $program->daily_settings,
                'time_settings' => $program->time_settings,
                'current_daily_id' => $program->current_daily_id,
                'current_days' => $program->current_days,
                'dailyReports' => $dailyReport,
                'remainders' => $remainders,
            ],
        ]);
    }

    public function newProgram(Request $request)
    {
        try {
            $user_id = $request->input('user');
            $day = $request->input('day');
            $program = new Program();
            $program->user_id = $user_id;
            $program->current_days = 1;
            $program->status = 'active';
            $program->save();

            $dailyReport = new DailyReport();
            $dailyReport->program_id = $program->id;
            $dailyReport->start_date = $day;
            $dailyReport->save();

            Program::where('id', $program->id)->update([
                'current_daily_id' => $dailyReport->id,
            ]);

            return json_encode([
                'program' => [
                    'id' => $program->id,
                    'user_id' => $program->user_id,
                    'daily_settings' => $program->daily_settings,
                    'time_settings' => $program->time_settings,
                    'current_daily_id' => $program->current_daily_id,
                    'current_days' => $program->current_days,
                    'dailyReports' => $dailyReport,
                    'remainders' => '[]',
                ],
            ]);
        } catch (\Throwable $th) {
            return json_encode([
                'status' => 'error',
                'message' => 'error creating program',
            ]);
        }
    }

    public function newDayReport(Request $request)
    {
        $user_id = $request->input('user');
        $program_id = $request->input('program');
        $currentDayNumber = $request->input('currentDayNumber');
        $inputDay = $request->input('day');
        $todaysDay = date('Y-m-d', strtotime($inputDay));
        // this query is for doble check if the current day is already created then we return the curren day data
        $dailyReport = DailyReport::where('program_id', $program_id)
            ->where('start_date', $todaysDay)
            ->get();
        if (count($dailyReport) == 0) {
            $days = DailyReport::where('program_id', $program_id)
                ->orderBy('start_date', 'desc')
                ->take(1)
                ->get();
            $diff = ceil(
                abs(strtotime($inputDay) - strtotime($days[0]->start_date)) /
                    86400
            );
            $newDay_number = $days[0]->day_number;
            for ($i = 1; $i <= $diff; $i++) {
                $newDay_number = $newDay_number + 1;
                $newStartDay = date(
                    'Y-m-d',
                    strtotime(
                        '+' . $i . ' day',
                        strtotime($days[0]->start_date)
                    )
                );

                $dailyReport = new DailyReport();
                $dailyReport->program_id = $program_id;
                $dailyReport->start_date = $newStartDay;
                $dailyReport->day_number = $newDay_number;
                $dailyReport->save();
            }

            $dailyReport = DailyReport::where('program_id', $program_id)
                ->where('start_date', $todaysDay)
                ->get();
            Program::where('id', $program_id)->update([
                'current_daily_id' => $dailyReport[0]->id,
                'current_days' => $dailyReport[0]->day_number,
            ]);
        }

        $remainders = Remainder::where('program_id', $program_id)->get();

        if (count($remainders) == 0) {
            $remainders = '[]';
        }
        $program = Program::where('id', $program_id)->get();
        return json_encode([
            'program' => [
                'id' => $program_id,
                'user_id' => $user_id,
                'daily_settings' => $program[0]->daily_settings,
                'time_settings' => $program[0]->time_settings,
                'current_daily_id' => $dailyReport[0]->id,
                'current_days' => $dailyReport[0]->day_number,
                'dailyReports' => $dailyReport,
                'remainders' => $remainders,
            ],
        ]);
    }

    public function updateDailyReport(Request $request)
    {
        $currentDayID = $request->input('currentDayID');
        $program_id = $request->input('program');
        $first_workout = $request->input('first_workout');
        $second_workout = $request->input('second_workout');
        $ten_pages_of_reading = $request->input('ten_pages_of_reading');
        $drink_one_gallon_of_water = $request->input(
            'drink_one_gallon_of_water'
        );
        $follow_diet = $request->input('follow_diet');
        $no_cheat_meals_or_alcohol = $request->input(
            'no_cheat_meals_or_alcohol'
        );

        $data = [
            'first_workout' => $first_workout,
            'second_workout' => $second_workout,
            'ten_pages_of_reading' => $ten_pages_of_reading,
            'drink_one_gallon_of_water' => $drink_one_gallon_of_water,
            'follow_diet' => $follow_diet,
            'no_cheat_meals_or_alcohol' => $no_cheat_meals_or_alcohol,
        ];

        if ($request->input('picture_progress') == '0') {
            $data['picture_progress'] = null;
        }

        DailyReport::where('program_id', $program_id)
            ->where('id', $currentDayID)
            ->update($data);

        return json_encode([
            'status' => 'updated',
        ]);
    }

    public function updateDailyReportNotes(Request $request)
    {
        $currentDayID = $request->input('currentDay');
        $program_id = $request->input('program');
        $notes = $request->input('notes');
        DailyReport::where('program_id', $program_id)
            ->where('id', $currentDayID)
            ->update([
                'notes' => $notes,
            ]);

        return json_encode([
            'status' => 'updated',
            'id' => $currentDayID,
            'notyes' => $notes,
            'program' => $program_id,
        ]);
    }

    public function addRemainder(Request $request)
    {
        $program_id = $request->input('program');
        $activity_id = $request->input('activity_id');
        $weekday = $request->input('weekday');
        $identifier = $request->input('identifier');

        $getRemainder = Remainder::where('program_id', $program_id)
            ->where('activity_id', $activity_id)
            ->get();

        if (count($getRemainder) == 0) {
            $remainder = new Remainder();
            $remainder->program_id = $program_id;
            $remainder->activity_id = $activity_id;
            if ($weekday == 1) {
                $remainder->sunday = $identifier;
            } elseif ($weekday == 2) {
                $remainder->monday = $identifier;
            } elseif ($weekday == 3) {
                $remainder->tuesday = $identifier;
            } elseif ($weekday == 4) {
                $remainder->wednesday = $identifier;
            } elseif ($weekday == 5) {
                $remainder->thursday = $identifier;
            } elseif ($weekday == 6) {
                $remainder->friday = $identifier;
            } elseif ($weekday == 7) {
                $remainder->saturday = $identifier;
            }

            $remainder->save();
            return json_encode([
                'status' => 'added',
            ]);
        } // end add
        $day = 'sunday';
        // update
        if ($weekday == 1) {
            $day = 'sunday';
        } elseif ($weekday == 2) {
            $day = 'monday';
        } elseif ($weekday == 3) {
            $day = 'tuesday';
        } elseif ($weekday == 4) {
            $day = 'wednesday';
        } elseif ($weekday == 5) {
            $day = 'thursday';
        } elseif ($weekday == 6) {
            $day = 'friday';
        } elseif ($weekday == 7) {
            $day = 'saturday';
        }
        Remainder::where('id', $getRemainder[0]->id)->update([
            $day => $identifier,
        ]);

        return json_encode([
            'status' => 'updated',
            'day' => $day,
            'weekday' => $weekday,
        ]);
    }

    public function dailySettings(Request $request)
    {
        $program_id = $request->input('program');
        $currentDayID = $request->input('currentDay');
        $dailySettings = $request->input('dailySettings');
        $timeSettings = $request->input('timeSettings');

        Program::where('id', $program_id)->update([
            'daily_settings' => $dailySettings,
            'time_settings' => $timeSettings,
        ]);
    }

    public function getProgramDays(Request $request)
    {
        $program_id = $request->input('program');
        echo json_encode(
            DailyReport::where('program_id', $program_id)
                ->orderBy('day_number')
                ->get()
        );
    }
    public function isDayCompleted(Request $request)
    {
        $program_id = $request->input('program');
        $dayId = $request->input('dayId');
        $completed = $request->input('completed');

        DailyReport::where('id', $dayId)->update([
            'completed' => $completed,
        ]);
        echo json_encode(['is completed ' => 'updated']);
    }

    public function isautoCompleted(Request $request)
    {
        $program_id = $request->input('program');
        $dayId = $request->input('dayId');
        DailyReport::where('id', $dayId)->update([
            'auto_completed' => 1,
        ]);
        echo json_encode(['is auto completed ' => 'updated']);
    }
}
