@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <ol class="breadcrumb breadcrumb-arrows">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('categories.index') }}">Kategori</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('categories.show', $category->id) }}">Detail Kategori: {{ $category->name }}</a>
                        </li>
                    </ol>
                    <h2 class="page-title">
                        {{ $category->name }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="{{ route('categories.index') }}" class="btn btn-white">Kembali</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Kategori</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <table class="mb-3">
                                <tr>
                                    <th>Nama</th>
                                    <th>:</th>
                                    <td>{{ $category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Kode Kategori</th>
                                    <th>:</th>
                                    <td>{{ $category->code }}</td>
                                </tr>
                            </table>

                            <h3>Informasi Inventory</h3>
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inventories as $inventory)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $inventory->name }}</td>
                                                <td class="text-end">
                                                    <a href="{{ route('inventories.show', $inventory->id) }}" class="btn align-text-top">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex align-items-center">
                                    {!! $inventories->links('tablar::pagination') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
