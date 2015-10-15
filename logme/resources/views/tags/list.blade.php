<div class="tagcloud" data-src="{{ route('api::tags') }}">
    <ul>
        @foreach($tags as $tag)
        <li>
            {{ $tag->title }}
        </li>
            @endforeach
    </ul>
</div>