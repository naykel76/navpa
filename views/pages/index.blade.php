@extends('layouts.app')

@section('content')

    <h1>{{ $title }} - Index</h1>

    <div class="bx"><a href="{{ route('pages.create') }}" class="btn-primary">Add New</a></div>

    <table class="tbl striped fullwidth">

        <thead>
            <tr>
                <th>ID</th>
                <th>Page Title</th>
                <th>Slug</th>
                <th>Type</th>
                <th class="tac">Actions</th>
            </tr>
        </thead>

        @foreach ($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td><a href="{{ route('pages.show', $page) }}">{{ $page->title }}</a></td>
                <td>{{ $page->slug }}</td>
                <td>{{ $page->layout_type }}</td>

                <td class="tac">
                    <div class="flex ha-c">
                        <a href="{{ route('pages.edit', $page) }}" class="btn-success sm mr-xs">Edit</a>
                        <a href="{{ route('pages.show', $page) }}" class="btn-info sm mr-xs">View</a>
                        <form method="POST" action="{{ route('pages.destroy', $page->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger sm mr-xs" onclick="return confirm('Are you sure? This action can not be undone.')"> Delete </button>
                        </form>
                    </div>
                </td>

            </tr>
        @endforeach

    </table>

{{ $pages->links() }}

@endsection
