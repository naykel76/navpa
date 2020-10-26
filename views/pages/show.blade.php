@extends('layouts.app')

@section('content')

    <h1>{{ $title }}</h1>

    <article>

        @if($page->show_title)
            <h1 class="title">{{ $page->title }}</h1>
        @endif

        <hr>

        @isset($page->image_path)
            <img style="float:right;" id="img_output" src="{{ asset('storage/' . $page->image_path)  }}" alt="{{ $page->title }}">
        @endisset

        {!! $page->body !!}

    </article>

@endsection
