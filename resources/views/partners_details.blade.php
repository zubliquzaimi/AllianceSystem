@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class=" text-center "><h3>{{$partners_details->part_CompanyName}}</h3></div>
            <div class="card-body to-background">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center"> Company Description </th>
                        <td>{{$partners_details->part_Description}}</td>
                    </tr>
                    <tr>
                        <th class="text-center"> Parent Company </th>
                        <td>{{$partners_details->part_ParentCompany}}</td>
                    <tr>
                    <tr>
                        <th class="text-center"> Category </th>
                        <td>{{$partners_details->part_Category}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6 mb-4"> 
                    <div class="card">
                        <div class="card-header text-center bg-aqua"><b>ALLIANCE</b></div>
                        <div class="card-body">
                            @if(!empty($alliance_name))
                                <div class="" id="style-3">
                                    <div class="scroll">
                                        <div class="overflow">
                                            <table class="table table-bordered">
                                            @foreach($alliance_name as $row)
                                                <tr>
                                                    <td>{{$row}}</td>
                                                    <td>
                                                    <form class="form-inline" method="POST" action="/partners_details/{{$partners_details->part_CompanyName}}">
                                                        @csrf
                                                            <input type="hidden" id="activityDetails" name="activityDetails" value="{{$row}}">                                                         
                                                            <button type="submit" class="btn btn-outline-secondary mb-2">Show Activity</button>
                                                    </form>   
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </table>  
                                        </div> 
                                    </div>
                                </div>
                            @else
                                <div class="text-center"> No Alliance </div>
                            @endif
                        </div>    
                    </div>                    
                </div>  
                <div class="col-md-6 mb-4"> 
                    <div class="card">
                        <div class="card-header text-center bg-aqua"><b>ACTIVITY</b></div>
                        <div class="card-body">
                            @if(!empty($activity_name))
                                <div class="" id="style-3">
                                    <div class="scroll">
                                        <div class="overflow">
                                            <table class="table table-bordered">
                                            @foreach($activity_name as $rows)
                                                <tr>
                                                    <td><a href="/progress_list/{{$rows['act_ActivityName']}}">{{$rows['act_ActivityName']}}</td>
                                                </tr>
                                            @endforeach
                                            </table>     
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-center"> No Activity (Try clicking on any alliance)</div>
                            @endif  
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
