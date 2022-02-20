<div class="col-4">
    <div class="card mb-3">
        <img src="{{$post->image_url}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->label}}</h5>
            @include('widgets.post-cards-tags', $post->tags)
            <p class="card-text">{{$post->short_text}}</p>
            <a href="{{ route('posts.show', $post->id)}}" class="btn btn-primary">Подробнее</a>
            @include('widgets.post-counters', $post)
        </div>
    </div>
</div>
