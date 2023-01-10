@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <button type='button' onclick="window.location='{{ url('/home') }}'" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($users as $key=>$user)
                        <li><b>Company {{$key+1}}</b></li>
                        <img src="<?php echo $user->logo; ?>" class="image" alt="" title="" width="70" height="50">
                        <h6><b>Name:</b> {{ $user->name }} </h6>
                        <h6><b>Address:</b> {{ $user->address }}</h6>
                        <h6><b>Phone:</b> {{ $user->phone }}</h6>
                        <h6><b>Email:</b> {{ $user->email }}</h6>
                        <h6><b>Website:</b> {{ $user->website }}</h6>
                        <h6>------------------------</h6>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
