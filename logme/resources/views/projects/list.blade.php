@foreach($projects as $project)
    <div class="btn-group">
        <button class="btn btn-info btn-sm">
            {{ $project->title }}
        </button>
        <button class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i>&nbsp;
        </button>
    </div>
@endforeach
