<form action="{{ route('api::log') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="activity">What can I track for you?</label>
        <div class="input-group">
            <input type="text" class="form-control" name="activity" v-model="activity" id="activity" placeholder="Working on @log-me for 30 minutes #coding">
                    <span class="input-group-btn">
                        <button type="submit" id="submit" class="btn btn-submit btn-@{{ class }}">Submit</button>
                    </span>
        </div>

    </div>
</form>


<div class="form-group">
    <label>Ok, I'm going to</label>
    <ul>
        <li>Log some time</li>
        <li>on the project(s) @{{ projects }}</li>
        <li>with the tag(s) @{{ tags }}</li>
    </ul>

</div>