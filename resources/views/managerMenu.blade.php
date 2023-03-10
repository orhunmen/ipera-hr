@extends('layouts.app')

@section('content')

<div class="container">  
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <button type='button' onclick="window.location='{{ url('/manager') }}'" class="text-sm text-gray-700 dark:text-gray-500 underline">Add Manager</button>
                </div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <button type='button' onclick="window.location='{{ url('/mindex') }}'" class="text-sm text-gray-700 dark:text-gray-500 underline">Show Managers</a>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
