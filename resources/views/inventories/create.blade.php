
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
                            <a href="{{ route('inventories.index') }}">Inventori</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('inventories.create') }}">Buat</a>
                        </li>
                    </ol>
                    <h2 class="page-title"> Inventori </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="{{ route('inventories.index') }}" class="btn btn-white">Kembali</a>
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
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buat Inventori Baru</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            @if (session('success'))
                                <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                    <i class="ti ti-progress-check"></i> {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('inventories.store') }}" method="post">
                            <div class="row">
                                <div class="col-lg-4">
                                    <x-filepond name="image"/>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-8">
                                    @csrf
                                    <section class="form-group">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Kategori</label>
                                            <select @class(['form-control', 'is-invalid' => $errors->has('category_id')]) name="category_id" id="category_id">
                                                <option disabled selected>Pilih Kategori</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) name="name" id="name">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" @class(['form-control', 'is-invalid' => $errors->has('description')])></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </section>
                                    <button type="submit" class="btn btn-success">Buat Data</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
