<table class="table table-striped">
    <thead>
    <tr>
        <td>Finished</td>
        <td>Project</td>
        <td>Activity</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    @foreach($activities as $activity)
    <tr>
        <td>{{ $activity->endtime->toDateTimeString() }}</td>
        <td>{{ $activity->project->title }}</td>
        <td>
            {{ $activity->comment }} [
            @foreach($activity->tags as $tag)
                #{{ $tag->title }}
            @endforeach
           ]
        </td>
        <td>
            <div class="btn-group">
                <button class="btn btn-xs btn-info">Info</button>
                <button class="btn btn-xs btn-default">Edit</button>
                <button class="btn btn-xs btn-warning">Delete</button>
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>