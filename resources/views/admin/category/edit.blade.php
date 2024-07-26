@extends('layouts.index')
@section('title', 'Edit Category')
@section('content')

<div class="container-fluid">
    <h5 class="py-2">Edit Kategori</h5>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.update', ['category' => $category->slug]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <input type="text"
                        class="form-control input-default form-control @error('name') is-invalid @enderror"
                        value="{{ $category->name }}" name="name">
                </div>
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
                <div class="form-group mb-3">
                    <label for="slug">Slug</label>
                    <input id="slug" type="text" class="form-control" value="{{ ($category->slug) }}" disabled>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
