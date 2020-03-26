<?php

namespace App\Http\Controllers;
 
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Activity;
use App\Alliance;
use App\Progress;

class ActivityController extends Controller
{
    public function index($name_act)
    {
        $activity = Activity::where('act_Vis', '1')->get()->toArray();
        return view('progress', compact('activity', 'name_act'));
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $activity = new Activity();
        $activity->all_PartnershipName = $request->input('all_PartnershipName');
        $activity->act_Business = $request->input('act_Business');
        $activity->act_ActivityName = $request->input('act_ActivityName');
        $activity->save(); //persist the data
        return redirect()->route('activity_list')->with('info','Activity Added Successfully');
    }

    public function list()
    {
        $activity = Activity::where('act_Vis', '1')->get()->toArray();
        return view('activity_list', compact('activity'));
    }

    public function find(Request $request)
    {
        $query = $request->input('find_activity');
        $activity = Activity::where('act_ActivityName', 'LIKE', "%{$query}%")->where('act_Vis', '1')->get();
        return view('activity_list', compact('activity'));
    } 

    public function update_details($act_ActivityName)
    {
        $alliance = Alliance::where('all_Vis', '1')->get()->toArray();
        $update = Activity::where('act_ActivityName', $act_ActivityName)->first(); 
        return view('activity_update', compact('update', 'alliance'));
    }

    public function update(Request $request)
    {
        Activity::where(
            [
                'act_ActivityName' => $request->input('act_ActivityName')
            ]
        )->update(
            [
                'act_Business' => $request->input('act_Business'),
            ]
        );

        return redirect()->route('activity_list')->with('info','Employee Added Successfully');
    }

    public function delete($act_ActivityName)
    {
        Progress::where('act_ActivityName', $act_ActivityName)->update(['prog_Vis' => '0']);

        Activity::where(['act_ActivityName' => $act_ActivityName])
        ->update(['act_Vis' => '0']);
        return redirect()->route('activity_list')->with('info','Employee Added Successfully');
    }
}
 