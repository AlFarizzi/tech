@extends('index')


@section('content')
    @push('style')
        <link rel="stylesheet" href="/assets/css/detail.css">
        <link rel="stylesheet" href="/assets/css/form.css">
    @endpush
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="article-header">
                    <h1>{{$data->title}}</h1>
                </div>
                <div class="author-section">
                    <p class="author-name">
                        {{$data->user->nama}}
                    </p>
                    <small class="post-time">{{$data->created_at->diffForHumans()}}</small>
                </div>
                <div class="content-section">
                    <p>
                        {{$data->question}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="discus-header">
                    <h3>Diskusi</h3>
                </div>
                @foreach ($comments as $comment)
                    <x-comments :comment="$comment" />
                @endforeach
                @auth
                    <form action="{{route('postComment')}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="question_id" value="{{$data->id}}" >
                            <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
                            <button type="submit" class="btn-comment">Continue</button>
                        </div>
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection
