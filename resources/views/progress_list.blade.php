@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><h3>PROGRESS</h3></div>
                <div class="card-body">
                @if(empty($progress_all))
                    No Progress
                @endif

                @if(!empty($progress_all))
                    <div name="search">
                        <form class="form-inline" method="POST" action="{{ route('partners_find') }}">
                            @csrf
                                <div class="form-group mb-2">
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" class="form-control" id="find_partner" name="find_partner" placeholder="Date">
                                    </div>
                                    <button type="submit" class="btn btn-outline-secondary mb-2">Find
                                    </button>
                                </div>
                        </form>
                    </div>
                    <div class="scroll">
                        <table class="table table-bordered">
                            <tr class="bg-light">
                                <th></th>
                                <th> Activity Name </th>
                                <th> Details </th>
                                <th> Date </th>
                                <th> Status </th>
                            </tr>
                            @foreach($progress_all as $row)
                            <tr>
                            <td> 
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                                </button>

                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="/progress_update/{{$row['prog_ID']}}"> Update </a>
                                <a class="dropdown-item" href="/progress_delete/{{$row['prog_ID']}}" onclick="return confirm('Do you want to delete the progress?')"> Delete </a>
                                </div>
                            </div>
                            </td>
                                <td>{{$row['act_ActivityName']}}</td>
                                <td>{{$row['prog_Details']}}</td>
                                <td>{{$row['prog_Date']}}</td>
                                @if(strtolower($row['prog_Status']) == "pending")
                                    <td><div class="FF1A2B"></div> </td>
                                @elseif(strtolower($row['prog_Status']) == "on-going")
                                    <td><div  class="F6FF43"> </div></td>
                                @elseif(strtolower($row['prog_Status']) == "almost done")
                                    <td ><div class="F1FF50"> </div> </td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                    </div>
                @endif
                </br></br><a href="/progress/{{$name_act}}" class="btn btn-outline-secondary btn-sm float-right">New Progress</a></br>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var tableOffset = $("#table-1").offset().top;
    var $header = $("#table-1 > thead").clone();
    var $fixedHeader = $("#header-fixed").append($header);

    $(window).bind("scroll", function() {
        var offset = $(this).scrollTop();

        if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
            $fixedHeader.show();
        }
        else if (offset < tableOffset) {
            $fixedHeader.hide();
        }
    });
</script>

@endsection
