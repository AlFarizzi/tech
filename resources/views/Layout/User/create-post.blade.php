@extends('index') @section('content')

<div class="row">
    <div class="col center-panel">
        <div class="card">
            <div class="form-panel">
                <form action="{{route('newPost')}}" method="post">
                    @csrf
                    <x-form id="{{false}}"/>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
