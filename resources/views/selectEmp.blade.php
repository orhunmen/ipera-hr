@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Choose an Employee') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.edit') }}">
                        @csrf

                        <label for="employee">Employees:</label>
                            <select name="employee" id="employee">
                                <option value="">--- Choose an Employee ---</option>
                                @foreach ($users as $key=>$user)
                                    <option value="{{ $user->first_name }} {{ $user->last_name }}">{{$user->first_name}} {{$user->last_name}}</option>
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
