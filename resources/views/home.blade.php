@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Halo, {{ auth()->user()->name }}
                    </div>
                    <h2 class="page-title">
                        Selamat Datang di Aplikasi Inventaris
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
