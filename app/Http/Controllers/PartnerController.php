<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Partner;
use App\Alliance;
use App\Activity;
use App\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use http\Env\Response;

class PartnerController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        $partners = Partner::where('part_Vis', '1')->get()->toArray();
        return view('alliance', compact('partners'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list()
    {
        $partners = Partner::where('part_Vis', '1')->get()->toArray();
        return view('partners_list', compact('partners'));
    }

    public function store(Request $request)
    {
        $partner = new Partner();
        $partner->part_CompanyName = $request->input('part_CompanyName');
        $partner->part_Description = $request->input('part_Description');
        $partner->part_ParentCompany = $request->input('part_ParentCompany');
        $partner->part_Category = $request->input('part_Category');
        $partner->save(); 
        return redirect()->route('partners_list')->with('info','Employee Added Successfully');
    }

    public function partner($part_CompanyName)
    {
        $alliance_name = array();
        $activity_name = array();
        $partners_details = Partner::where('part_CompanyName', $part_CompanyName)->first(); 
        $all_alliance = Alliance::where('part_CompanyName', $partners_details->part_CompanyName)->where('all_Vis', '1')->get(); 
        foreach($all_alliance as $row)
        {
            $alliance_name[] = $row->all_PartnershipName;
        }

        return view('partners_details')->with(compact('partners_details', 'alliance_name','activity_name'));       
    }

    public function activityDetails($part_CompanyName, Request $request)
    {
        $alliance_name = array();
        $activity_name = array();
        $partners_details = Partner::where('part_CompanyName', $part_CompanyName)->first(); 
        $all_alliance = Alliance::where('part_CompanyName', $part_CompanyName)->where('all_Vis', '1')->get(); 
        foreach($all_alliance as $row)
        {
            $alliance_name[] = $row->all_PartnershipName;
        }
        if(!empty($all_alliance))
        {
                $all_activities  = Activity::where('all_PartnershipName', $request->input('activityDetails'))->get(); 
                foreach($all_activities as $row)
                {
                    $activity_name[] = $row;
                }
        } 

        else
        {
            $all_activities = $all_activities + array(null);
        }

        return view('partners_details')->with(compact('partners_details', 'alliance_name','activity_name'));       
    }

    public function update_details($part_CompanyName)
    {
        $update = Partner::where('part_CompanyName', $part_CompanyName)->first(); 
        return view('partners_update', compact('update'));
    }

    public function update(Request $request)
    {
        Partner::where(
            [
                'part_CompanyName' => $request->input('part_CompanyName')
            ]
        )->update(
            [
                'part_Description' => $request->input('part_Description'),
                'part_ParentCompany' => $request->input('part_ParentCompany'),
                'part_Category' => $request->input('part_Category')
            ]
        );

        return redirect()->route('partners_list')->with('info','Employee Added Successfully');
    }

    public function delete($part_CompanyName)
    {
        $alliance_name = array();
        $activity_name = array();
        $progress_name = array();
        Alliance::where('part_CompanyName', $part_CompanyName)->update(['all_Vis' => '0']);
        $all_alliance = Alliance::where('part_CompanyName', $part_CompanyName)->get();
        foreach($all_alliance as $row)
        {
            $alliance_name[] = $row->all_PartnershipName;
        }

        if(!empty($all_alliance))
        {
            foreach($alliance_name as $alliance_name)
            {
                Activity::where('all_PartnershipName', $alliance_name)->update(['act_Vis' => '0']);
                $all_activities[] = Activity::where('all_PartnershipName', $alliance_name)->get();
            }

            foreach($all_activities[0] as $row)
            {
                
                $activity_name[] = $row->act_ActivityName;
            }
        } 
        print_r($activity_name);

        if(!empty($all_activities))
        {
            foreach($activity_name as $activity_name)
            {
                Progress::where('act_ActivityName', $activity_name)->update(['prog_Vis' => '0']);
            }
        } 

        Partner::where(['part_CompanyName' => $part_CompanyName])
        ->update(['part_Vis' => '0']);
        return redirect()->route('partners_list')->with('info','Employee Added Successfully');
    } 
    
    public function find(Request $request)
    {
        $query = $request->input('find_partner');
        $partners = Partner::where('part_Category', 'LIKE', "%{$query}%")->orWhere('part_CompanyName', 'LIKE', "%{$query}%")->get();
        return view('partners_list', compact('partners'));
    }
}