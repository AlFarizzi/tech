<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/myQuestions.css">
    <link rel="stylesheet" href="/assets/font/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">

    @if (request()->url() !== 'http://127.0.0.1:8000/register' && request()->url() !== 'http://127.0.0.1:8000/login')
        <style>
            body {
                    background-color: #eef0f1;
                }
        </style>
    @endif

    @stack('style')
    <title>Tech</title>
</head>
<body>
