<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">User</div>
            <div class="panel-body">
                @foreach($users as $user)
                    {{ $user->email }} - {{ $user->name }}
                    <hr/>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Projects</div>
            <div class="panel-body">
                @foreach($projects as $project)
                    {{ $project->title }} - {{ $project->description }}
                    <hr/>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Tags</div>
            <div class="panel-body">
                @foreach($tags as $tag)
                    {{ $tag->title }}
                    <hr/>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Activity</div>
            <div class="panel-body">
                @foreach($activities as $activity)
                    {{ $activity->project_id }} - {{ $activity->start }} : {{ $activity->end }} - {{ $activity->comment }}
                    <hr/>
                @endforeach
            </div>
        </div>
    </div>
</div>