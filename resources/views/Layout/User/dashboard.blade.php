@extends('index')

@section('content')
    @if (session('error'))
        <p>{{session('error')}}</p>
    @endif
    <x-content :data="$data" />
@endsection
