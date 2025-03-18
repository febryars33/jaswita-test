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
                            <a href="{{ route('branches.index') }}">Cabang</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('branches.show', $branch->id) }}">Detail Cabang: {{ $branch->name }}</a>
                        </li>
                    </ol>
                    <h2 class="page-title">
                        {{ $branch->name }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="{{ route('branches.index') }}" class="btn btn-white">Kembali</a>
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pengelola</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <table>
                                <tr>
                                    <th>NIK</th>
                                    <th>:</th>
                                    <td>{{ $branch->manager->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <th>:</th>
                                    <td>{{ $branch->manager->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <th>:</th>
                                    <td>{{ $branch->manager->address }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>:</th>
                                    <td>{{ $branch->manager->user->email }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Cabang</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <table>
                                <tr>
                                    <th>Nama</th>
                                    <th>:</th>
                                    <td>{{ $branch->name }}</td>
                                </tr>
                                <tr>
                                    <th>Kode Cabang</th>
                                    <th>:</th>
                                    <td>{{ $branch->code }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <th>:</th>
                                    <td>{{ $branch->address }}</td>
                                </tr>
                                <tr>
                                    <th>Provinsi</th>
                                    <th>:</th>
                                    <td>{{ $branch->province->name }}</td>
                                </tr>
                                <tr>
                                    <th>Kota / Kabupaten</th>
                                    <th>:</th>
                                    <td>{{ $branch->regency->name }}</td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <th>:</th>
                                    <td>{{ $branch->district->name }}</td>
                                </tr>
                                <tr>
                                    <th>Kelurahan</th>
                                    <th>:</th>
                                    <td>{{ $branch->sub_district->name }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="module">
        new Vue({
            el: "#app",
            data() {
                return {
                    regencies: [],
                    districts: [],
                    sub_districts: [],
                }
            },
            methods: {
                onChangeProvince(event) {
                    this.getRegencies(event.target.value);
                },
                onChangeRegency(event) {
                    this.getDistrict(event.target.value);
                },
                onChangeDistrict(event) {
                    this.getSubDistrict(event.target.value);
                },
                getRegencies(province_id) {
                    axios.get('{{ route('api.regencies') }}', {
                        params: {
                            province_id: province_id
                        }
                    })
                        .then((response) => {
                            this.regencies = response.data;
                        }).catch((error) => {
                            console.log(error);
                        });
                },
                getDistrict(regency_id) {
                    axios.get('{{ route('api.districts') }}', {
                        params: {
                            regency_id: regency_id
                        }
                    })
                        .then((response) => {
                            this.districts = response.data;
                        }).catch((error) => {
                            console.log(error);
                        });
                },
                getSubDistrict(district_id) {
                    axios.get('{{ route('api.sub_districts') }}', {
                        params: {
                            district_id: district_id
                        }
                    })
                        .then((response) => {
                            this.sub_districts = response.data;
                        }).catch((error) => {
                            console.log(error);
                        });
                }
            }
        });
    </script>
@endpush
