
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
                        <li class="breadcrumb-item active">
                            <a href="{{ route('categories.create') }}">Buat</a>
                        </li>
                    </ol>
                    <h2 class="page-title"> Kategori </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus"></i>
                            {{ __('Create') }}
                        </a>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary d-sm-none btn-icon">
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">Kode.
                                            <i class="ti ti-caret-up"></i>
                                        </th>
                                        <th>Nama</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                <span class="text-muted">{{ $category->code }}</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-reset" tabindex="-1">
                                                    {{ $category->name }}
                                                </a>
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('categories.show', $category->id) }}" class="btn align-text-top">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {!! $categories->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
