@extends('includes.master')

@section('content')
    <div class="row">
        <div class="col-md-12"><br/><br/><br/></div>
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3" id="entry">
                @include('tracking')
            </div>
        </div>
        <div class="col-md-12">
            <br/><br/><br/><hr/>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Recent Activity</div>
                <div class="panel-body">
                    @include('activity.list')
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Your Projects</div>
                <div class="panel-body">
                    @include('projects.list')
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Your Tags</div>
                <div class="panel-body">
                    @include('tags.list')
                </div>
            </div>
        </div>

    </div>

@endsection