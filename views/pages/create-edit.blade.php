@extends('layouts.app')

@section('content')

    <h1>{{ $title . ($page->name ?? null) }}</h1>

{{-- <div class="mt"><a href="{{ route("$route.index") }}" >Return to List</a></div> --}}


@if ($formType === 'store')
    <form id="page-form" method="POST" action=" {{ route('pages.store') }}" enctype="multipart/form-data">
        @csrf

@else
    <form id="page-form" method="POST" action=" {{ route('pages.update', $page) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

@endif

        <div class="row">

            <div class="col-md-70">

                <div class="frm-row flex">
                    <div class="col-md-10">
                        <x-formit-input for="id" label="ID" value="{{ $page->id ?? null }}" adv=true  disabled/>
                    </div>
                    <div class="col-md-90">
                        <x-formit-input for="title" label="Page Title" value="{{ $page->title ?? null }}" adv=true />
                    </div>
                </div>

                @if (isset($page))
                    <x-formit-ckeditor for="body" value="{!! $page->body ?? null !!}" />
                @else
                    <x-formit-ckeditor for="body" />
                @endif

                <x-formit-submit label="Save" />

            </div>

            <div class="col-md-30 bdr-l">
                <x-formit-checkbox for="published_at" label="Published"
                    apple="{{ isset($page->published_at) ? ($page->published_at ? true : false) : null }}" />
                <x-formit-input for="order" label="Order" value="{{ $page->order ?? null }}"
                    help-text="Leave the order blank to auto assign to the end"/>
                <x-formit-textarea for="headline" label="Headline" value="{{ $page->headline ?? null }}"
                    help-text="Headline is a stand out section at the top of the page"/>
                <x-formit-textarea for="description" label="Description" value="{{ $page->description ?? null }}"
                    help-text="Description is a highlighted area displayed before the main content (accepts HTML)"/>
            </div>
        </div>


    </form>
@endsection


