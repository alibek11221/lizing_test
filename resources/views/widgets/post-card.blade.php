<div class="card mb-3">
    <img src="{{$post->image_url}}" class="card-img-top img-fluid" style="height: 50vh!important;" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$post->label}}</h5>
        @forelse($post->tags as $tag)
            <a href="{{route('tags.posts', $tag->id)}}" class="badge badge-pill badge-primary">{{$tag->name}}</a>
        @empty
            <p> нет ничего</p>
        @endforelse
        <p class="card-text">{{$post->content}}</p>
        <a href="{{ route('posts.show', $post->id)}}" class="btn btn-primary">Подробнее</a>
        <div class="d-flex m-3">
            <div class="text-center m-4 d-flex justify-content-center flex-column">
                <button  data-target="{{$post->id}}" class="btn like_button"><i class="fa fa-heart"></i></button>
                <p class="likes_counter"  data-target="{{$post->id}}">{{$post->likes_presenter}}</p>
            </div>
            <div class="text-center m-4 d-flex justify-content-center flex-column">
                <button data-target="{{$post->id}}" class="btn viewed_button"><i class="fa fa-eye"></i></button>
                <p class="views_counter"  data-target="{{$post->id}}">{{$post->views_presenter}}</p>
            </div>
        </div>
    </div>
</div>
