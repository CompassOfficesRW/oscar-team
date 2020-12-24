@extends('layouts.app')
@section('content')
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet">
    <style media="screen">
    .highlightText {
        background: yellow;
    }
    </style>
    <div class="container">
        <div class="row">
            <h1>Detail</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <a href="/touchpoint/{{ $touchpoint->id }}/edit" class="btn btn-success">Edit <i class="fas fa-edit"></i></a>
                </div>
                <label for="subject">Subject</label>
                <pre class="" id="subject" name="subject">{{ $subject }}</pre>
                <label for="content">Content</label>
                <pre class="" id="content" name="content">{{ $content }}</pre>
            </div>
        </div>
    </div>
@endsection
