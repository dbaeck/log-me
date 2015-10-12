@extends('includes.master')

@section('content')
    <h1>LogMe</h1>
    <p>Track anything. Easily.</p>
    <div class="col-md-6 col-md-offset-3" id="entry">

        <form action="{{ route('api::log') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="activity">What did you do?</label>
                <input type="text" class="form-control" name="activity" v-model="activity" id="activity" placeholder="Working on @logme for 30 minutes #coding">
            </div>
            <div class="form-group">
                <button type="submit" id="submit">Submit</button>
            </div>

            <div class="form-group">
                <label>What I understand:</label>
                <div v-text="interval"></div>
                <div v-text="projects"></div>
                <div v-text="tags"></div>

            </div>

        </form>
    </div>
@endsection