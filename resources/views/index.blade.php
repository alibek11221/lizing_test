@extends('_layouts.main')
@section('header')
    Главная
@endsection
@section('content')
    @if($posts)
        <div class="d-flex justify-content-around flex-wrap">
            @foreach($posts as $post)
                @include('widgets.post-card-mini', $post)
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>
    @else
        <p>Нет ничего</p>
    @endif
@endsection
@section('scripts')
