@extends('_layouts.main')
@section('header')
    Главная
@endsection
@section('content')
    @if($posts)
        <div class="row">
            @foreach($posts as $post)
                @include('widgets.post-card-mini', $post)
            @endforeach
        </div>

        <div class="row">
            {!! $posts->links() !!}
        </div>
    @else
        <p>Нет ничего</p>
    @endif
@endsection
@section('scripts')
