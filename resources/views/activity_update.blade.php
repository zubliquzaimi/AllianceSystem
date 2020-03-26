@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Activity') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('activity_update')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="all_PartnershipName" class="col-md-4 col-form-label text-md-right">{{ __('Partnership Name') }}</label>

                            <div class="col-md-6">
                                <select name="all_PartnershipName" id="all_PartnershipName" class="dropdown-color form-control">
                                    @foreach($alliance as $row)
                                        <option value="{{$row['all_PartnershipName']}}"> {{$row['all_PartnershipName']}} </option>
                                    @endforeach
                                </select>

                                @error('all_PartnershipName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="act_Business" class="col-md-4 col-form-label text-md-right">{{ __('Business') }}</label>

                                <div class="col-md-6">
                                    <select name="act_Business" id="act_Business" class="dropdown-color form-control">
                                        <option value="PCSB"> PCSB </option>
                                        <option value="PETCO"> PETCO </option>
                                        <option value="PCG"> PCG </option>
                                        <option value="PGB"> PGB </option>
                                    </select>

                                @error('act_Business')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="act_ActivityName" class="col-md-4 col-form-label text-md-right">{{ __('Activity Name') }}</label>

                            <div class="col-md-6">
                                <input id="act_ActivityName" type="text" class="form-control @error('act_ActivityName') is-invalid @enderror" name="act_ActivityName" value="{{$update->act_ActivityName}}" placeholder="{{$update->act_ActivityName}}" required autocomplete="act_ActivityName" autofocus readonly>

                                @error('act_ActivityName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-secondary">
                                    {{ __('Add Activity') }}
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
