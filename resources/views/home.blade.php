@extends('layouts.app')

@section('content')
  <div class="container my-2">
    <div class=" row justify-content-center">
      <div class="col-md-6 mb-3">
        <div class="card text-center ">
          <div class="card-header bg-dark">
              <h5><b>ALLIANCE COUNT</b></h5>
          </div>
          <div class="card-body">
              {!! $chart->container() !!}
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="card text-center ">
          <div class="card-header bg-dark">
              <h5><b>ALLIANCE PHASE</b></h5>
          </div>
          <div class="card-body">
              {!! $chart_b->container() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container my-2">
    <div class="row justify-content-center">
      <div class="col-md-4 mb-3">
        <div class="card text-center recolor">
          <div class="card-header bg-dark">
            <h5><b>PARTNER</b></h5>
          </div>
          <div class="card-body recolor">
            <p class="card-text"><h1>{{$total_part}}</h1> <h5> partners</h5></p>
            <a href="/partners_list" class="btn btn-outline-secondary">View More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3"> 
        <div class="card text-center recolor">
          <div class="card-header bg-dark">
            <h5><b>ALLIANCE</b></h5>
          </div>
          <div class="card-body">
            <p class="card-text"><h1>{{$total_alliance}}</h1> <h5> alliances</h5></p>
            <a href="/alliance_list" class="btn btn-outline-secondary">View More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card text-center recolor">
          <div class="card-header bg-dark">
            <h5><b>ACTIVITY</b></h5>
          </div>
          <div class="card-body">
            <p class="card-text"><h1>{{$total_activity}} </h1> <h5>activities</h5></p>
            <a href="/activity_list" class="btn btn-outline-secondary">View More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  {!! $chart->script() !!}
  {!! $chart_b->script() !!}

@endsection
