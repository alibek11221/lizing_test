@extends('_layouts.main')
@section('header') Каталог @endsection
@section('content')
    <div class="d-flex justify-content-between">
        <aside class="w-25">
            @forelse($tags as $tag)
                <a href="{{route('tags.posts', $tag->id)}}" class="badge badge-pill badge-primary">{{$tag->name}}</a>
            @empty
                <p> нет ничего</p>
            @endforelse
        </aside>
        <div class="d-flex w-75 justify-content-around flex-column">
            @forelse($posts as $post)
                @include('widgets.post-card', $post)
            @empty
                <p>Нет ничего</p>
            @endforelse
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>

@endsection
