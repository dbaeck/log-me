@extends('includes.master')

@section('content')
    <h1>LogMe</h1>
    <p>Track anything. Easily.</p>
    <div class="col-md-6 col-md-offset-3">

        <form action="{{ route('api::log') }}" class="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="activity">What did you do?</label>
                <input type="text" class="form-control" id="activity" placeholder="Working on @logme for 30 minutes #coding">
            </div>
        </form>
    </div>
@endsection