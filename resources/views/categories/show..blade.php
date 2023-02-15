@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h1 class="mb-3">{{ $title ?? 'show' }}</h1>
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

                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->created_at }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
