@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card">
      <div class="card-header text-center">Alliance</div>
      <div class="card-body">
        @if(empty($alliance))
          No Partner
        @endif
        
        @if(!empty($alliance))
          <div name="search">
            <form class="form-inline" method="POST" action="{{ route('alliance_find') }}">
              @csrf
              <div class="form-group mb-2">
                <div class="form-group mx-sm-3 mb-2">
                  <input type="text" class="form-control" id="find_alliance" name="find_alliance" placeholder="Partnership Name">
                </div>
              </div>
                <button type="submit" class="btn btn-outline-secondary mb-2">Find
                </button>
            </form>
            </div>
              <div class="scroll">
                <table class="table table-bordered text-center">
                  <tr class="bg-light">
                    <th></th>
                    <th> Partners </th>
                    <th> Partnership Name </th>
                    <th> Collaboration Type </th>
                    <th> Petronas Equity </th>
                    <th> Partner Equity </th>
                    <th> Investment Value </th>
                    <th> Status </th>
                    <th> Attachment </th>
                  </tr>
                  @foreach($alliance as $row)
                  <tr>
                    <td> 
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>

                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="/partners_details/{{$row['part_CompanyName']}}"> View </a>
                          <a class="dropdown-item" href="/alliance_update/{{$row['all_PartnershipName']}}"> Update </a>
                          <a class="dropdown-item" href="/alliance_delete/{{$row['all_PartnershipName']}}" onclick="return confirm('Do you want to delete the alliance?')"> Delete </a>
                        </div>
                      </div>
                    </td>
                    <td>{{$row['part_CompanyName']}}</td>
                    <td>{{$row['all_PartnershipName']}}</td>
                    <td>{{$row['all_Collaboration']}}</td>
                    <td>{{$row['all_PetEquity']}}</td>
                    <td>{{$row['all_PartnerEquity']}}</td>
                    <td>{{$row['all_InvValue']}}</td>
                    <td>{{$row['all_Phases']}}</td>
                    <td>{{$row['all_Attachment']}}</td>
                  </tr>
                @endforeach
                </table>
              </div>
            @endif                
          </br></br><a href="/alliance" class="btn btn-outline-secondary btn-sm float-right">New Alliance</a></br>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>

@endsection
