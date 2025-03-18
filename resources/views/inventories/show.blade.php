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
                            <a href="{{ route('inventories.show', $inventory->id) }}">Detail Inventori: {{ $inventory->name }}</a>
                        </li>
                    </ol>
                    <h2 class="page-title">
                        {{ $inventory->name }}
                    </h2>
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
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Inventori</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <h3 class="m-0">Nama</h3>
                            <p>{{ $inventory->name }}</p>
                            <h3 class="m-0">Deskripsi</h3>
                            <p>{{ $inventory->description }}</p>
                            <div class="col-lg-2 mb-3">
                                <a href="{{ asset('storage/' . $inventory->image) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $inventory->image) }}" alt="{{ $inventory->name }}" class="img-fluid rounded-4">
                                </a>
                            </div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#mutationModal">
                                Mutasikan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Mutasi</h3>
                        </div>
                        <div class="card-body">
                            <ul class="timeline">
                                @forelse ($inventory->mutations as $mutation)
                                    <li class="timeline-event">
                                        <div class="timeline-event-icon bg-facebook-lt">
                                            <i class="ti ti-circle-dashed-check"></i>
                                        </div>
                                        <div class="card timeline-event-card">
                                            <div class="card-body">
                                                <h4>Mutasi Barang</h4>
                                                <p>Dari: {{ $mutation->first->name }}</p>
                                                <p>Ke: {{ $mutation->last->name }}</p>
                                                <p class="text-secondary">{{ $mutation->created_at }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @empty
                                    <p class="text-danger">Belum pernah mutasi</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="mutationModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('inventories.mutation', $inventory->id) }}" method="post" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Mutasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="branch_id" class="form-label">Cabang</label>
                        <select name="branch_id" id="branch_id" @class(['form-control', 'is-invalid' => $errors->has('branch_id')])>
                            <option disabled selected>Pilih Cabang</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        @error('branch_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Alasan</label>
                        <textarea name="reason" id="reason" @class(['form-control', 'is-invalid' => $errors->has('reason')]) cols="30" rows="10"></textarea>
                        @error('reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-success ms-auto">
                        Mutasikan
                    </button>
                </div>
            </form>
        </div>
</div>

@endsection
