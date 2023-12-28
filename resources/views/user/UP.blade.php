@extends('user.main')
@section('UP','active')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
            <h2 class="pageheader-title">Data UP</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Data UP</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fa fa-check me-2" aria-hidden="true"></i>
                    {{ @session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fa fa-exclamation-triangle me-2" aria-hidden="true"></i>
                    &nbsp{{ session()->get('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title"> Tabel Unit Pengatur </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered text-dark table-sm" style="" border="1">
                    <div class="mb-3">
                        <div class="col-sm-2 float-end mb-3">
                            <form action="/up" method="get" class="form-inline">
                                <input class="form-control form-control-sm" type="text" name="search" placeholder="Search.." value="{{ request('search') }}">
                            </form>
                        <div>       
                    </div>
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Nama UP</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if ($UPs->isEmpty())
                            <p>Tidak ada data yang ditemukan.</p>
                    @else  
                        @foreach ($UPs as $up)           
                        <tr>

                            <td>{{ $up->id }}</td>
                            <td>{{ $up->up_nama }}</td>
                            <td>{{ $up->up_alamat }}</td>
                            <td>{{ $up->latitude}}</td>
                            <td>{{ $up->longitude}}</td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{ $UPs->onEachSide(0.5)->links('pagination::bootstrap-4') }}
            </div>
    </div>
</div>

@endsection