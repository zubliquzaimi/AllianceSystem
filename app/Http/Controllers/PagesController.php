<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Partner;
use App\Alliance;
use App\Activity;
use App\Charts\UserChart;
use Charts;
use DB;

class PagesController extends Controller
{
    public function partner()
    {
        return view('/partner');
    }

    public function index()
    {
        $partners = Partner::all()->toArray();
        return view('home', compact('partners', 'alliance'));
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function count()
    {
        $partners = Partner::where('part_Vis', '1')->get()->toArray();
        $alliances = Alliance::where('all_Vis', '1')->get()->toArray();
        $activities = Activity::where('act_Vis', '1')->get()->toArray();
        $total_part = 0;
        $total_alliance = 0;
        $total_activity = 0;
        foreach($partners as $count)
        {
            $total_part = $total_part + 1; 
        }

        foreach($alliances as $count_1)
        {
            $total_alliance = $total_alliance + 1;
        }

        foreach($activities as $count)
        {
            $total_activity = $total_activity + 1;
        }

        $allianceCount = DB::table('alliances')->select('part_CompanyName', DB::raw('count(*) as total'))->where('all_Vis', '1')->groupBy('part_CompanyName')
        ->get();

        $phaseCount = DB::table('alliances')->select('all_Phases', DB::raw('count(*) as total_b'))->where('all_Vis', '1')->groupBy('all_Phases')
        ->get();

        foreach($allianceCount as $row)
        {
            $partner[] = $row->part_CompanyName;
            $total[] = $row->total;
        }

        foreach($phaseCount as $row)
        {
            $status[] = $row->all_Phases;
            $total_b[] = $row->total_b;
        }

        $borderColors = [
            "rgba(63, 132, 197, 1)",
            "rgba(248, 176, 25, 1)",
            "rgba(240,85,83, 1.0)",
            "rgba(245, 126, 32, 1)",
            "rgba(230,73,128, 1.0)",
            "rgba(158,88,163, 1.0)",
            "rgba(107, 94, 169, 1.0)",
            "rgba(134, 142, 151, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];

        $fillColors = [
            "rgba(63, 132, 197, 1)",
            "rgba(248, 176, 25, 1)",
            "rgba(240,85,83, 1.0)",
            "rgba(245, 126, 32, 1)",
            "rgba(230,73,128, 1.0)",
            "rgba(158,88,163, 1.0)",
            "rgba(107, 94, 169, 1.0)",
            "rgba(134, 142, 151, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];

        $chart = new UserChart;
        $chart->displayaxes(false);
        $chart->labels($partner);
        $chart->dataset('Alliance Count', 'doughnut', $total)
        ->color($borderColors)
        ->backgroundcolor($fillColors);

        $chart_b = new UserChart;
        $chart_b->displaylegend(false);
        $chart_b->labels($status);
        $chart_b->dataset('Alliance Phase', 'bar', $total_b)
        ->color($borderColors)
        ->backgroundcolor($fillColors);

        return view('home', compact('total_part', 'total_alliance', 'total_activity', 'chart', 'chart_b'));

    }
}
