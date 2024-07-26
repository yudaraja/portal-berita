@extends('layouts.index')
@section('title', 'Admin')
@section('content')

@push('css')
<link href="/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-12 text-right">
            <div class="bootstrap-modal">
                <a href="{{ route('admin.create') }}" type="button" class="btn btn-primary">Tambah
                    Admin</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admin</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th width="15px">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->created_at->isoFormat('DD MMMM YYYY') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-sm-around">
                                            <a href="{{ route('admin.edit',  $data->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('admin.delete', $data->id) }}" method="POST">
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
