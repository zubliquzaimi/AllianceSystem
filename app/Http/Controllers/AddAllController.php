<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Partner;

class AddAllController extends Controller
{
    public function index()
    {
        return view('addAll');
    }
  
    public function autocomplete(Request $request)
    {
        $data = Partner::select("part_DepartmentName")
        ->where("name","LIKE","%{$request->input('query')}%")
        ->get();
        return response()->json($data);
    }
}