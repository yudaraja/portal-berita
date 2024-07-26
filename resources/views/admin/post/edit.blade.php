@extends('layouts.index')
@section('title', 'Edit Post')
@section('content')

@push('css')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css" />
@endpush

<div class="container-fluid">
    <a href="{{ route('post.index') }}" class="btn btn-outline-secondary my-3">Back</a>
    {{-- <h5 class="py-2">Edit Post</h5> --}}
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title', $post->title) }}">
                    @error('title')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="slug">Slug</label>
                    <input id="slug" type="text" class="form-control" value="{{ ($post->slug) }}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="category_id">Category</label>
                    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror"
                        name="category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ?
                            'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="thumbnail">Thumbnail</label>
                    <input id="thumbnail" type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                        name="thumbnail">
                    @if($post->thumbnail)
                    <div class="mt-2">
                        <label>Current Thumbnail:</label>
                        <img src="{{ URL::asset('storage/' . $post->thumbnail) }}" alt="Thumbnail Preview"
                            class="img-thumbnail mt-2" style="max-width: 150px;">
                    </div>
                    @endif
                    @error('thumbnail')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="body">Body</label>
                    <textarea id="editor" class="form-control @error('body') is-invalid @enderror"
                        name="body">{{ old('body', $post->body) }}</textarea>
                    @error('body')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('js')
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>

@endpush


@endsection
