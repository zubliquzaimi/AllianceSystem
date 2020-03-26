<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Alliance;
use App\Partner;
use App\Activity;
use App\Progress;
 
class AllianceController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        $alliance = Alliance::where('all_Vis', '1')->get()->toArray();
        return view('activity', compact('alliance'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list()
    {
        $alliance = Alliance::where('all_Vis', '1')->get()->toArray();
        return view('alliance_list', compact('alliance'));
    }

    public function store(Request $request)
    {

        $alliance = new Alliance();

        $alliance->part_CompanyName = $request->input('part_CompanyName');
        $alliance->all_PartnershipName = $request->input('all_PartnershipName');
        $alliance->all_Collaboration = $request->input('all_Collaboration');
        $alliance->all_PetEquity = $request->input('all_PetEquity');
        $alliance->all_PartnerEquity = $request->input('all_PartnerEquity');
        $alliance->all_InvValue = $request->input('all_InvValue');
        $alliance->all_Phases = $request->input('all_Phases');
        $alliance->all_Attachment = $request->input('all_Attachment');
        $alliance->save(); //persist the data
        return redirect()->route('alliance_list')->with('info','Alliance Added Successfully');
    }

    public function find(Request $request)
    {
        $query = $request->input('find_alliance');
        $alliance = Alliance::where('all_PartnershipName', 'LIKE', "%{$query}%")->where('all_Vis', '1')->get();
        return view('alliance_list', compact('alliance'));
    }

    public function alliance($partnerName)
    {
        $alliance_details = Alliance::where('all_PartnershipName', $partnerName)->first();
        $all_alliance = Alliance::where('part_CompanyName', $alliance_details->partner)->get();
        return view('alliance_details')->with(compact('alliance_details','all_alliance'));
    }

    public function graphCount()
    {
        $allianceCount = Alliance::select('all_PartnershipName', Alliance::raw('count(*) as total'))
        ->where('all_Vis', '1')
        ->groupBy('all_PartnershipName')
        ->get();
        print_r($allianceCount);
    }

    public function update_details($all_PartnershipName)
    {
        $partners = Partner::where('part_Vis', '1')->get()->toArray();
        $update = Alliance::where('all_PartnershipName', $all_PartnershipName)->first(); 
        return view('alliance_update', compact('update', 'partners'));
    }

    public function update(Request $request)
    {
        Alliance::where(
            [
                'all_PartnershipName' => $request->input('all_PartnershipName')
            ]
        )->update(
            [
                'all_Collaboration' => $request->input('all_Collaboration'),
                'all_PetEquity' => $request->input('all_PetEquity'),
                'all_PartnerEquity' => $request->input('all_PartnerEquity'),
                'all_InvValue' => $request->input('all_InvValue'),
                'all_Phases' => $request->input('all_Phases'),
                'all_Attachment' => $request->input('all_Attachment')
            ]
        );

        return redirect()->route('alliance_list')->with('info','Employee Added Successfully');
    }

    public function delete($all_PartnershipName)
    {
        $activity_name = array();
        $progress_name = array();
        Activity::where('all_PartnershipName', $all_PartnershipName)->update(['act_Vis' => '0']);
        $all_activities[] = Activity::where('all_PartnershipName', $all_PartnershipName)->get();
        foreach($all_activities[0] as $row)
        {
            $activity_name[] = $row->act_ActivityName;
        }

        if(!empty($all_activities))
        {
            foreach($activity_name as $activity_name)
            {
                Progress::where('act_ActivityName', $activity_name)->update(['prog_Vis' => '0']);
            }
        } 

        Alliance::where(['all_PartnershipName' => $all_PartnershipName])
        ->update(['all_Vis' => '0']);
        return redirect()->route('alliance_list')->with('info','Employee Added Successfully');
    }
}
