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
                            <a href="{{ route('branches.create') }}">Buat</a>
                        </li>
                    </ol>
                    <h2 class="page-title"> Cabang </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('branches.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus"></i>
                            {{ __('Create') }}
                        </a>
                        <a href="{{ route('branches.create') }}" class="btn btn-primary d-sm-none btn-icon">
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
                                        <th>Provinsi</th>
                                        <th>Kota / Kabupaten</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Nama Cabang</th>
                                        <th>Pengelola</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($branches as $branch)
                                        <tr>
                                            <td>
                                                <span class="text-muted">{{ $branch->code }}</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-reset" tabindex="-1">
                                                    {{ optional($branch->province)->name ?? 'N/A'; }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-reset" tabindex="-1">
                                                    {{ optional($branch->regency)->name ?? 'N/A'; }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-reset" tabindex="-1">
                                                    {{ optional($branch->district)->name ?? 'N/A'; }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-reset" tabindex="-1">
                                                    {{ optional($branch->sub_district)->name ?? 'N/A'; }}
                                                </a>
                                            </td>
                                            <td>
                                                <span class="badge bg-success me-1"></span> {{ $branch->name }}
                                            </td>
                                            <td>
                                                <a href="#" class="text-reset" tabindex="-1">
                                                    {{ optional($branch->manager)->name ?? 'N/A'; }}
                                                </a>
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('branches.show', $branch->id) }}" class="btn align-text-top">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {!! $branches->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
