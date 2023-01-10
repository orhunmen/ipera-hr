@extends('layouts.app')

@section('content')

<div class="container">  
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company Menu') }}</div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <button type='button' onclick="window.location='{{ url('/createCompany') }}'" class="text-sm text-gray-700 dark:text-gray-500 underline">Add a Company</a>
                </div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <button type='button' onclick="window.location='{{ url('/cindex') }}'" class="text-sm text-gray-700 dark:text-gray-500 underline">Show Companies</a>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
