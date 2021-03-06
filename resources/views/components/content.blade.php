<div class="row">
    <div class="col center-panel">
        @forelse ($data as $e)
            <div class="card">
                <div class="author">
                    <p class="author-name">{{$e->user->nama}}</p>
                    <small class="post-time">{{$e->created_at->diffForHumans()}}</small>
                </div>
                <div class="question">
                    <div class="question-title">
                        <a href="{{route('read', ['author' => $e->user->nama ? : $e->question->nama, 'slug' => $e->slug ? : $e->question->slug])}}" class="question-link"><h2>{{$e->title ?  : $e->question->title}}</h2></a>
                    </div>
                </div>
                @if (request()->is('dashboard') || request()->is('search'))
                    <x-save-button :id="$e" />
                @else
                    <x-delete-button :id="$e" />
                @endif
            </div>
        @empty
            <h3 style="color:white;font-family:sans-serif;text-shadow:0px 0px 5px rgba(0, 0, 0, 0.596);" >Tidak Ada Postingan</h3>
        @endforelse
    </div>
    <div class="col right-sidebar">
            <div class="card">
                <h1 class="hashtag-header">#Hashtags</h1>
                @isset($hashtags)
                    @foreach ($hashtags as $hashtag)
                        <p class="hashtag-item"><a href="{{route('dependPost',$hashtag)}}" class="hashtag-link">{{"#".$hashtag->hashtag}}</a></p>
                    @endforeach
                @endisset
            </div>
    </div>
</div>
