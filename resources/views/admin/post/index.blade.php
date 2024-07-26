@extends('layouts.index')
@section('title', 'Post')
@section('content')

@push('css')
<link href="/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-12 text-right">
            <div class="bootstrap-modal">
                <!-- Button trigger modal -->
                <a href="{{ route('post.create') }}" type="button" class="btn btn-primary">Tambah
                    Post</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Post</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th width="15px">No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Dibuat</th>
                                    <th>Author</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->category->name }}</td>
                                    <td>{{ $data->created_at->isoFormat('DD MMMM YYYY') }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-sm-around">
                                            <a href="{{ route('post.edit', ['post' => $data->slug]) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('post.delete', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
@endpush
@endsection
