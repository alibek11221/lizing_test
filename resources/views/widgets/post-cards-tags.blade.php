@forelse($post->tags as $tag)
    <a href="{{route('tags.posts', $tag->name)}}" class="badge badge-pill badge-primary ">{{$tag->name}}</a>
@empty
    <p>Без тегов</p>
@endforelse
