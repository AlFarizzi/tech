@extends('index')

@section('content')
    <x-content :data="$data" :hashtags="$hashtags" />
@endsection
