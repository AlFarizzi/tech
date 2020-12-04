@auth
    <form action="{{route('save')}}" method="post">
        @csrf
        <input type="hidden" name="question_id" value="{{$id->id}}">
        <input type="hidden" name="user_id" value="{{$id->user_id}}">
        <button class="save" {{$id->savedPost()->where('user_id',Auth::user()->id)->count() > 0 ? 'disabled' : ''}} ><i class="fa fa-save"></i> Save</button>
    </form>
@endauth
