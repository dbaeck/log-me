@extends('includes.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>My recorded Times</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Total time</div>
                <div class="panel-body">
                    @include('time.total')
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Monthly time</div>
                <div class="panel-body">
                    @include('time.period')
                </div>
            </div>
        </div>
    </div>
@endsection