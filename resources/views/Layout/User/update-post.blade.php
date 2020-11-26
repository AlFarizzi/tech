@extends('index') @section('content')

<div class="row">
    <div class="col center-panel">
        <div class="card">
            <div class="form-panel">
                <form action="{{route('editMyPost', $id)}}" method="post">
                    @csrf
                    @method('put')
                    <x-form :id="$id" />
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
