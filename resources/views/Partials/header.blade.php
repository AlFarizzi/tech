<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/navbar.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/font/css/all.min.css">
    @stack('style')
    <title>
        @isset($comments)
            {{$data->title}}
        @else
            Tech &#x1F468;&#x200D;&#x1F4BB;
        @endisset
    </title>
</head>
<body>
