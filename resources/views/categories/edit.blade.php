@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update' , $category->id ) }}" method="post">
            @csrf
            @method('put')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value=" {{ old('name', $category->name) }} "
             class="form-control @error('description') is-invalid @enderror">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" id="description" name="description"
             class="form-control @error('description') is-invalid @enderror">{{ old('description',$category->description) }}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="parent_id">Parent</label>
            <select type="text" id="parent_id" name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                <option value="">No Parent</option>
                @foreach ($parents as $parent)
                <option value="{{$parent->id}}" @if ($parent->id == old('parent_id',$category->parent_id) ) selected  @endif>{{ $parent->name }}</option>
                @endforeach
                @error('parent_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
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
