@extends('layouts.app')

@section('content')

<div class="container">  
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <a href="{{ url('/index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Show Users</a>
                </div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <a href="{{ url('/create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Create Users</a>
                </div>
                <div class="card-body">
                    Welcome!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
