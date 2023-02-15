@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h1>Create Category</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                <li> {{ $message }} </li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('categories.store') }}" method="post">
           @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name"
                class="form-control @error('name') is-invalid @enderror" >
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description"
                class="form-control @error('description') is-invalid @enderror" ></textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="parent_id">Parent</label>
                <select type="text" id="parent_id" name="parent_id" class="form-control">
                    <option value="">No Parent</option>
                    @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="art_file">Art File</label>
                <input type="text" id="art_file" name="art_file" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
