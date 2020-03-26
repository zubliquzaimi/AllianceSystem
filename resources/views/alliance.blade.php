@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Alliance') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('alliance')}}">
                        @csrf       
                        <div class="form-group row">
                            <label for="all_PartnershipName" class="col-md-4 col-form-label text-md-right">{{ __('Partnership Name') }}</label>
                            <div class="col-md-6">
                                <textarea id="all_PartnershipName" rows="2" class="form-control @error('all_PartnershipName') is-invalid @enderror" name="all_PartnershipName" value="{{ old('all_PartnershipName') }}" required autocomplete="all_PartnershipName" autofocus>
                                </textarea>
                                @error('all_PartnershipName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="part_CompanyName" class="col-md-4 col-form-label text-md-right">{{ __('Partner') }}</label>
                            <div class="col-md-6">
                                <select name="part_CompanyName" id="part_CompanyName" class="dropdown-color form-control">
                                    @foreach($partners as $row)
                                        <option value="{{$row['part_CompanyName']}}"> {{$row['part_CompanyName']}} </option>
                                    @endforeach
                                </select>
                                @error('part_CompanyName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="all_Collaboration" class="col-md-4 col-form-label text-md-right">{{ __('Type of Collaboration') }}</label>
                            <div class="col-md-6">
                                <select name="all_Collaboration" id="all_Collaboration" class="dropdown-color form-control">
                                    <option value="JOINT VENTURE"> JOINT VENTURE </option>
                                    <option value="MOU"> MOU </option>
                                    <option value="SUPPLY AGREEMENT"> SUPPLY AGREEMENT </option>
                                    <option value="SERVICE PROVIDER"> SERVICE PROVIDER </option>
                                </select>
                                @error('all_Collaboration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="all_PetEquity" class="col-md-4 col-form-label text-md-right">{{ __('Petronas Equity (%)') }}</label>
                            <div class="col-md-6">
                                <input id="all_PetEquity" type="text" class="form-control @error('all_PetEquity') is-invalid @enderror" name="all_PetEquity" value="{{ old('all_PetEquity') }}" required autocomplete="all_PetEquity" autofocus>
                                @error('all_PetEquity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="all_PartnerEquity" class="col-md-4 col-form-label text-md-right">{{ __('Partner Equity (%)') }}</label>
                            <div class="col-md-6">
                                <input id="all_PartnerEquity" type="text" class="form-control @error('all_PartnerEquity') is-invalid @enderror" name="all_PartnerEquity" value="{{ old('all_PartnerEquity') }}" required autocomplete="all_PartnerEquity" autofocus>
                                @error('all_PartnerEquity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="all_InvValue" class="col-md-4 col-form-label text-md-right">{{ __('Investment Value (RM)') }}</label>
                            <div class="col-md-6">
                                <input id="all_InvValue" type="text" class="form-control @error('all_InvValue') is-invalid @enderror" name="all_InvValue" value="{{ old('all_InvValue') }}" required autocomplete="all_InvValue" autofocus>
                                @error('all_InvValue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="all_Phases" class="col-md-4 col-form-label text-md-right">{{ __('Phase') }}</label>
                            <div class="col-md-6">
                                <select name="all_Phases" id="all_Phases" class="dropdown-color form-control">
                                    <option value="INITIATION"> INITIATION </option>
                                    <option value="MANAGEMENT"> MANAGEMENT </option>
                                    <option value="TERMINATION"> TERMINATION </option>
                                </select>
                                @error('all_Phases')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="all_Attachment" class="col-md-4 col-form-label text-md-right">{{ __('Attachment') }}</label>
                            <div class="col-md-6">
                                <input id="all_Attachment" type="file" class="dropdown-color form-control @error('all_Attachment') is-invalid @enderror" name="all_Attachment" value="{{ old('all_Attachment') }}" required autocomplete="all_Attachment" autofocus>
                                @error('all_Attachment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-secondary">
                                    {{ __('Add Alliance') }}
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
