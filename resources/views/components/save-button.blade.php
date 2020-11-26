@auth
    <form action="{{route('save')}}" method="post">
        @csrf
        <input type="hidden" name="question_id" value="{{$id->id}}">
        <button class="save"><i class="fa fa-save"></i> Save</button>
    </form>
@endauth
