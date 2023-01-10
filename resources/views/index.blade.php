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
                        <h4><b>Employee {{$key+1}}</b></h4>
                        <h6><a><b>Full Name:</b> {{ $user->first_name }} </a>
                        <a>{{ $user->last_name }}</a></h6>
                        <h6><b>E-mail:</b> {{ $user->email }}</h6>
                        <h6><b>Phone:</b> {{ $user->phone }}</h6>
                        <h6><b>Company:</b> {{ $user->company }}</h6>
                        <h6>------------------------</h6>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
