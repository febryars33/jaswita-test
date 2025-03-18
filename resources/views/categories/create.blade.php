
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
                            <a href="{{ route('categories.create') }}">Buat</a>
                        </li>
                    </ol>
                    <h2 class="page-title"> Kategori </h2>
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
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buat Kategori Baru</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            @if (session('success'))
                                <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                    <i class="ti ti-progress-check"></i> {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <section class="form-group">
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Kode</label>
                                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('code')]) name="code" id="code">
                                        @error('code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) name="name" id="name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </section>
                                <button type="submit" class="btn btn-success">Buat Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
