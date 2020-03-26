@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Partner') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('partner') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="part_CompanyName" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>
                            <div class="col-md-6">
                                <input id="part_CompanyName" type="text" class="form-control @error('part_CompanyName') is-invalid @enderror" name="part_CompanyName" value="{{ old('part_CompanyName') }}" required autocomplete="part_CompanyName" autofocus>
                                @error('part_CompanyName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="part_Description" class="col-md-4 col-form-label text-md-right">{{ __('Company Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="part_Description" rows="3" class="form-control @error('part_Description') is-invalid @enderror" name="part_Description" value="{{ old('part_Description') }}" required autocomplete="part_Description" autofocus>
                                </textarea>
                                @error('part_Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="part_ParentCompany" class="col-md-4 col-form-label text-md-right">{{ __('Parent Company') }}</label>
                            <div class="col-md-6">
                                <input id="part_ParentCompany" type="text" class="form-control @error('part_ParentCompany') is-invalid @enderror" name="part_ParentCompany" value="{{ old('part_ParentCompany') }}" required autocomplete="part_ParentCompany" autofocus>
                                @error('part_ParentCompany')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="part_Category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                            <select name="part_Category" id="part_Category" class="dropdown-color form-control">
                                        <option value="OIL MAJOR"> OIL MAJOR </option>
                                        <option value="INDEPENDENTS"> INDEPENDENTS </option>
                                        <option value="INTERGRATEDS"> INTERGRATEDS </option>
                                        <option value="NOC"> NOC </option>
                                        <option value="SOGO SHOSHA"> SOGO SHOSHA </option>
                                        <option value="TECHNOLOGY PROVIDERS"> TECHNOLOGY PROVIDERS </option>
                                        <option value="CUSTOMERS"> CUSTOMERS </option>
                                        <option value="CHEMICALS"> CHEMICALS </option>
                                </select>
                                @error('part_ParentCompany')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Partner') }}
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
