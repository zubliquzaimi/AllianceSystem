@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card">
      <div class="card-header text-center">
      PARTNERS
      </div>
      <div class="card-body">

        @if(empty($partners))
          No Partner
        @endif

        @if(!empty($partners))
          <div name="search">
            <form class="form-inline" method="POST" action="{{ route('partners_find') }}">
              @csrf
                <div class="form-group mb-2">
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="find_partner" name="find_partner" placeholder="Department Name">
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
                <th> Company Name </th>
                <th> Category </th>
              </tr>
              
              @foreach($partners as $row)
              <tr>
                <td> 
                  <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>

                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/partners_details/{{$row['part_CompanyName']}}"> View </a>
                      <a class="dropdown-item" href="/partners_update/{{$row['part_CompanyName']}}"> Update </a>
                      <a class="dropdown-item" href="/partners_delete/{{$row['part_CompanyName']}}" onclick="return confirm('Do you want to delete the partner?')"> Delete </a>
                    </div>
                  </div>
                </td>

                <td>{{$row['part_CompanyName']}}</td>
                <td> {{$row['part_Category']}} </td>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        @endif
        </br>
          <a href="/partner" class="btn btn-outline-secondary btn-sm float-right">New Partner
          </a>
        </br>
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
    if (offset >= tableOffset && $fixedHeader.is(":hidden")) 
    {
      $fixedHeader.show();
    }
    else if (offset < tableOffset) 
    {
      $fixedHeader.hide();
    }
  });
</script>

@endsection
