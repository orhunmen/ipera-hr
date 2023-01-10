@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Choose a Company') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company.edit') }}">
                        @csrf

                        <label for="name">Companies:</label>
                            <select name="name" id="name">
                                <option value="">--- Choose a Company ---</option>
                                @foreach ($users as $key=>$user)
                                    <option value="{{ $user->name }}">{{$user->name}}</option>
                                @endforeach
                            </select>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Choose') }}
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
