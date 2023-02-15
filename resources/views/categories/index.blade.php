@extends('layouts.dashboard')

@section('content')
    <h1 class="mb-3">{{ 'Page ' . $title }}
        <small><a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary">Create</a></small>
    </h1>
    <x-flash-message />
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent ID</th>
                    <th>Created AT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><a href="{{ route('categories.show', ['id' => $category->id]) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td><a href="{{ route('categories.edit', [$category->id]) }}" class="btn btn-sm btn-dark">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
@endsection
