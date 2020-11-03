@extends('index')

@section('content')
    @push('style')
        <link rel="stylesheet" href="/assets/css/modal.css">
        <link rel="stylesheet" href="/assets/css/question.css">
    @endpush
<div class="question">
    <div class="timeline">
        <div class="timeline-top">
            <h3 class="timeline-title">{{$question->title}}</h3>
            <small class="question-status  question-unsolved">{{$question->status->category}}</small>
            <small class="timeline-name">{{$question->user->nama}}</small> <small class="timeline-date">{{$question->created_at->diffForHumans()}}</small>
        </div>
        <div class="timeline-bottom">
            <p class="timeline-question">
              {{$question->question}}
            </p>
        </div>
    </div>
</div>

<h3 class="comment-text">Comments</h3>

@foreach ($comment as $comment)
    <div class="comment">
        <div class="timeline-top">
            <h5 class="timeline-name">{{$comment->user->nama}}</h5> <small class="timeline-date">{{$comment->created_at->diffForHumans()}}</small>
        </div>
        <div class="timeline-bottom">
            <p class="timeline-question">{{$comment->comment}}</p>
        </div>
    </div>
@endforeach

<div class="comment-post">
    <form action="{{route('comment.post',$question)}}" method="post">
        @csrf
        <label class="comment-label">Comment</label>
        <textarea name="comment" cols="30" rows="10"></textarea>
        <button type="submit" class="btn-comment btn-primary" >Post</button>
    </form>
</div>
@endsection
