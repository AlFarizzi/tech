<div class="discus-section">
    <div class="author-section">
        <p class="author-name">{{$comment->user->nama}}</p>
        <small class="post-time">{{$comment->created_at->diffForHumans()}}</small>
        <p class="discus-content">
            {{$comment->comment}}
        </p>
    </div>
</div>
