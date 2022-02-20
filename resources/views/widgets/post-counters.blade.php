<div class="row mt-3 justify-content-start">
    <div class="col-md-auto d-flex flex-column justify-content-center text-center">
        <button  data-target="{{$post->id}}" class="btn like_button"><i class="fa fa-heart"></i></button>
        <p class="likes_counter"  data-target="{{$post->id}}">{{$post->likes_presenter}}</p>
    </div>
    <div class="col-md-auto d-flex flex-column justify-content-center text-center">
        <button data-target="{{$post->id}}" class="btn viewed_button"><i class="fa fa-eye"></i></button>
        <p class="views_counter"  data-target="{{$post->id}}">{{$post->views_presenter}}</p>
    </div>
</div>
