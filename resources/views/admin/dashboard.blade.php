@extends('layouts.index')
@section('title', 'Dashboard')
@section('content')
<div class="row d-flex justify-content-around">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Post diupload</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{ $posts }}</h2>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-file"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Category</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{ $category }}</h2>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-cubes"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Admin</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{ $countUser }}</h2>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Daftar Admin</strong>
            </div>
            <div class="card-body">
                <div class="active-member">
                    <div class="table-responsive">
                        <table class="table table-xs mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Bergabung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->isoFormat('DD MMMM YYYY') }}</td>
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
<!-- Chartjs -->
<script src="/assets/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="/assets/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="/assets/plugins/d3v3/index.js"></script>
<script src="/assets/plugins/topojson/topojson.min.js"></script>
<script src="/assets/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="/assets/plugins/raphael/raphael.min.js"></script>
<script src="/assets/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="/assets/plugins/chartist/js/chartist.min.js"></script>
<script src="/assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

<script src="/assets/dashboard/dashboard-1.js"></script>
@endpush
@endsection
