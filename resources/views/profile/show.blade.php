@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>
                    <div class="card-body">

                        <div class="row mb-3">
                            <p class="col-md-2">{{ __('Name:') }}</p>
                            <p class="col-md-4">{{ $user->name }}</p>

                        </div>
                        <div class="row mb-3">
                            <p class="col-md-2">{{ __('Email Address:') }}</p>
                            <p class="col-md-4">{{ $user->email }}</p>

                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-8" style="padding-top: 1.5rem; padding-bottom: 1.5rem">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>
                    <div class="card-body">

                        <div class="row mb-3">
                            <p class="col-md-2">{{ __('Name:') }}</p>
                            <p class="col-md-4">{{ $user->name }}</p>

                        </div>
                        <div class="row mb-3">
                            <p class="col-md-2">{{ __('Email Address:') }}</p>
                            <p class="col-md-4">{{ $user->email }}</p>

                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
