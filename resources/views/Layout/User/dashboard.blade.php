@extends('index')

@section('content')
@push('style')
    <link rel="stylesheet" href="/assets/css/modal.css">
@endpush
<div class="questions">
    @foreach ($questions as $question)
    <div class="timeline">
        <div class="timeline-top">
            <h3 class="timeline-title">{{$question->title}}</h3>
            <small class="question-status {{$question->status->id === 2 ? 'question-unsolved' : 'question-solved'}} ">{{$question->status->category}}</small>
            <small class="timeline-name">{{$question->user->username}}</small> <small class="timeline-date">{{$question->created_at->diffForHumans()}}</small>
        </div>
        <div class="timeline-bottom">
            <p class="timeline-question">
                {{$question->question}}
            </p>
        </div>
        <a href="{{route('singlePublic.get',$question)}}" class="timeline-read">Lihat</a>
    </div>
@endforeach
</div>
@endsection
