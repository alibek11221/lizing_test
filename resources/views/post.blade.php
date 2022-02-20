@extends('_layouts.main')
@section('header', $post->title)

@section('content')
    <div class="container pb50">
        <div class="row">
            <div class="col-md-9 mb40">
                <article>
                    <img src="{{$post->image_url}}" class="img-fluid mb30">
                    <div class="post-content">
                        <h3>{{$post->title}}</h3>
                        @include('widgets.post-counters', $post)
                        <p> {{$post->content}} </p>
                        <hr class="mb40">
                        <h4 class="mb40 text-uppercase font500">Post a comment</h4>
                        <form>
                            <input type="hidden" class="id_holder" id="{{$post->id}}">
                            <div class="form-group">
                                <label>Тема</label>
                                <input id="subject" type="text" class="form-control" name="subject">
                            </div>
                            <div class="form-group">
                                <label>Комментарий</label>
                                <textarea id="body" class="form-control" rows="5" placeholder="Comment"></textarea>
                            </div>
                            <div class="clearfix float-right mt-2">
                                <button id="comment_sub_btn" type="button" class="spinner-button btn btn-primary mb-2">Отправить</button>
                                <p id="error" class="text-danger"></p>
                            </div>
                        </form>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ mix('js/post.js') }}" defer></script>
@endsection
