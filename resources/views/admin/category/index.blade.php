@extends('layouts.index')
@section('title', 'Category')
@section('content')

@push('css')
<link href="/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-12 text-right">
            <div class="bootstrap-modal">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGrid">Tambah
                    Kategori</button>
                <!-- Modal -->
                <div class="modal fade" id="modalGrid">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Kategori</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="basic-form">
                                        <form method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <div class="form-grou">
                                                    <label for="name">Kategori</label>
                                                    <input value="{{ old('name') }}" type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" required>
                                                </div>
                                                @error('name')
                                                <div class="error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th width="15px">No</th>
                                    <th>Kategori</th>
                                    <th>Slug</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->slug }}</td>
                                    <td>
                                        <div class="d-flex justify-content-sm-around">

                                            <a href="{{ route('category.edit', ['category' => $data->slug]) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('category.delete', $data->id) }}" method="POST">
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
