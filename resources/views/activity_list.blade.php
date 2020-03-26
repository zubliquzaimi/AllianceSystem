@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card recolor">
      <div class="card-header text-center recolor">
        Activity
      </div>

      <div class="card-body">
        @if(empty($activity))
          No Activity
        @endif
        
        @if(!empty($activity))
          <div name="search">
            <form class="form-inline" method="POST" action="{{ route('activity_find') }}">
            @csrf
              <div class="form-group mb-2">
                <div class="form-group mx-sm-3 mb-2">
                  <input type="text" class="form-control" id="find_activity" name="find_activity" placeholder="Activity Name">
                </div>
                <button type="submit" class="btn btn-outline-secondary mb-2">
                  Find
                </button>
              </div>
            </form>
          </div> 
          
          <div class="scroll">
            <table class="table table-bordered">
              <tr class="bg-dark text-white">
                <th> </th>
                <th> Activity Name </th>
                <th> Partnership Name </th>
              </tr>

              @foreach($activity as $row)

              <tr>
                <td> 
                  <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>

                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/progress_list/{{$row['act_ActivityName']}}"> View </a>
                      <a class="dropdown-item" href="/activity_update/{{$row['act_ActivityName']}}"> Update </a>
                          <a class="dropdown-item" href="/activity_delete/{{$row['act_ActivityName']}}" onclick="return confirm('Do you want to delete the alliance?')"> Delete </a>
                    </div>
                  </div>
                </td>
                <td width="50%">{{$row['act_ActivityName']}}</td>
                <td>{{$row['all_PartnershipName']}}</td>
              </tr>

              @endforeach 

            </table>
          </div>
        @endif                
        </br></br>
        <a href="/activity" class="btn btn-outline-secondary btn-sm float-right">New Activity</a>
        </br>
    </div>
  </div>
</div>

@endsection
