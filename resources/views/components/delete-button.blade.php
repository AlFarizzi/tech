@auth
@if (request()->is('saved-posts'))
    <a href="{{route('remove-saved-post',$id)}}" class="save"><i class="fa fa-save"></i> Delete</a>
    @else
        <x-update-button :id="$id" />
        <a href="{{route('deleteMyPost',$id)}}" class="save"><i class="fa fa-save"></i> Delete</a>
    @endif
@endauth
