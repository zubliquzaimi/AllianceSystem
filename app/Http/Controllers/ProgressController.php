<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Progress;
use App\Activity;

class ProgressController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $progress = new Progress();
        $progress->act_ActivityName = $request->input('act_ActivityName');
        $progress->prog_Details = $request->input('prog_Details');
        $progress->prog_Status = $request->input('prog_Status');
        $progress->prog_Date = $request->input('prog_Date');
        $progress->save(); 
        return redirect()->route('activity_list')->with('info','Activity Added Successfully');
    }

    public function progress($activityName)
    {
        $progress_all = Progress::where('act_ActivityName', $activityName)->where('prog_Vis', '1')->orderBy('created_at', 'desc')->get();
        $name_act = $activityName;
        return view('progress_list')->with(compact('progress_all', 'name_act'));
    }

    public function update_details($prog_ID)
    {
        $activity = Activity::where('act_Vis', '1')->get()->toArray();
        $update = Progress::where('prog_ID', $prog_ID)->first(); 
        return view('progress_update', compact('update', 'activity'));
    }

    public function update(Request $request)
    {
        Progress::where(
            [
                'prog_ID' => $request->input('prog_ID')
            ]
        )->update(
            [
                'prog_Details' => $request->input('prog_Details'),
                'prog_Status' => $request->input('prog_Status'),
                'prog_Date' => $request->input('prog_Date')
            ]
        );
        print_r($request->input('prog_ID'));
        return redirect()->route('activity_list')->with('info','Employee Added Successfully');
    }

    public function delete($prog_ID)
    {
        Progress::where(['prog_ID' => $prog_ID])
        ->update(['prog_Vis' => '0']);
        return redirect()->route('activity_list')->with('info','Employee Added Successfully');
    } 
}

