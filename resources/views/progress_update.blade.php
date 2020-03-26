@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Progress') }}</div>
                <div class="card-body">
                <form method="POST" action="{{ route('progress_update')}}">
                        @csrf
                            <input type="hidden" id="prog_ID" name="prog_ID" value="{{$update->prog_ID}}">
                            <div class="form-group row">
                                <label for="act_ActivityName" class="col-md-4 col-form-label text-md-right">{{ __('Activity Name') }}</label>
                                <div class="col-md-6">
                                    <select name="act_ActivityName" id="act_ActivityName" class="dropdown-color form-control">
                                    @if(!empty($name_act))
                                        <option value="{{$name_act}}" selected> {{$name_act}} </option>
                                    @elseif(empty($activities))
                                        @foreach($activity as $row)
                                            <option value="{{$row['act_ActivityName']}}"> {{$row['act_ActivityName']}} </option>
                                        @endforeach
                                    @endif
                                    </select>
                                    @error('act_ActivityName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prog_Details" class="col-md-4 col-form-label text-md-right">{{ __('Details') }}</label>
                                <div class="col-md-6">
                                    <textarea id="prog_Details" rows="3" class="form-control @error('prog_Details') is-invalid @enderror" name="prog_Details" value="{{$update->prog_Details}}" required autocomplete="prog_Details" autofocus>{{$update->prog_Details}}</textarea>
                                    @error('prog_Details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prog_Status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                                <div class="col-md-6">
                                    <select name="prog_Status" id="prog_Status" class="dropdown-color form-control">
                                        <option value="Pending"> Pending </option>
                                        <option value="On-going"> On-going </option>
                                        <option value="Almost Done"> Almost Done </option>
                                    </select>
                                    @error('prog_Status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prog_Date" class="col-md-4 col-form-label text-md-right">{{ __('date') }}</label>
                                <div class="col-md-6">
                                    <input id="prog_Date" type="date" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control @error('prog_Date') is-invalid @enderror" name="prog_Date" placeholder="{{$update->prog_Date}}" onfocus="{{$update->prog_Date}}" value="{{$update->prog_Date}}" required autocomplete="prog_Date" autofocus>
                                    @error('prog_Date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        {{ __('Update Progress') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
