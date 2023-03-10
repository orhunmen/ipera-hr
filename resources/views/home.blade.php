@extends('layouts.app')

@section('content')

<div class="container">  
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <button type='button' onclick="window.location='{{ url('/managerMenu') }}'" class="text-sm text-gray-700 dark:text-gray-500 underline">Manager Menu</button>
                </div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <button type='button' onclick="window.location='{{ url('/company') }}'" class="text-sm text-gray-700 dark:text-gray-500 underline">Company Menu</a>
                </div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <button type='button' onclick="window.location='{{ url('/employee') }}'" class="text-sm text-gray-700 dark:text-gray-500 underline">Employee Menu</a>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
