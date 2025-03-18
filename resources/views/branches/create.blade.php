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
                            <a href="{{ route('branches.create') }}">Buat</a>
                        </li>
                    </ol>
                    <h2 class="page-title"> Cabang </h2>
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
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buat Cabang Baru</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <form action="{{ route('branches.store') }}" method="post">
                                @csrf
                                <section class="form-group">
                                    <h5 class="status status-blue mb-3">Informasi Akun Pengelola</h3>
                                    <div class="mb-3">
                                        <label for="manager_nik" class="form-label">NIK</label>
                                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('manager_nik')]) name="manager_nik" id="manager_nik">
                                        @error('manager_nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="manager_name" class="form-label">Nama Lengkap</label>
                                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('manager_name')]) name="manager_name" id="manager_name">
                                        @error('manager_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="manager_email" class="form-label">Email</label>
                                        <input type="email" @class(['form-control', 'is-invalid' => $errors->has('manager_email')]) name="manager_email" id="manager_email">
                                        @error('manager_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="manager_password" class="form-label">Password</label>
                                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('manager_password')]) name="manager_password" id="manager_password" autocomplete="off">
                                        @error('manager_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="manager_address" class="form-label">Alamat</label>
                                        <textarea name="manager_address" id="manager_address" cols="30" rows="10" @class(['form-control', 'is-invalid' => $errors->has('manager_address')])></textarea>
                                        @error('manager_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </section>
                                <section class="form-group">
                                    <h5 class="status status-blue mb-3">Informasi Cabang</h3>
                                    <div class="mb-3">
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
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Alamat</label>
                                            <textarea name="address" id="address" cols="30" rows="10" @class(['form-control', 'is-invalid' => $errors->has('address')])></textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="province_id" class="form-label">Provinsi</label>
                                            <select @class(['form-control', 'is-invalid' => $errors->has('province_id')]) name="province_id" id="province_id" @change="onChangeProvince($event)">
                                                    <option disabled selected>Pilih Provinsi</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('province_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="regency_id" class="form-label">Kota / Kabupaten</label>
                                            <select @class(['form-control', 'is-invalid' => $errors->has('regency_id')]) name="regency_id" id="regency_id" :disabled="regencies.length === 0" @change="onChangeRegency($event)">
                                                <option v-for="(regency, key) in regencies" :value="regency.id">
                                                    @{{ regency.name }}
                                                </option>
                                            </select>
                                            @error('regency_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="district_id" class="form-label">Kecamatan</label>
                                            <select @class(['form-control', 'is-invalid' => $errors->has('district_id')]) name="district_id" id="district_id" :disabled="districts.length === 0" @change="onChangeDistrict($event)">
                                                <option v-for="(district, key) in districts" :value="district.id">
                                                    @{{ district.name }}
                                                </option>
                                            </select>
                                            @error('district_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="sub_district_id" class="form-label">Kelurahan</label>
                                            <select @class(['form-control', 'is-invalid' => $errors->has('sub_district_id')]) name="sub_district_id" id="sub_district_id" :disabled="sub_districts.length === 0">
                                                <option v-for="(sub_district, key) in sub_districts" :value="sub_district.id">
                                                    @{{ sub_district.name }}
                                                </option>
                                            </select>
                                            @error('sub_district_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Telepon</label>
                                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('phone')]) name="phone" id="phone">
                                            @error('sub_district_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) name="email" id="email">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                    this.regencies = [];
                    this.districts = [];
                    this.sub_districts = [];
                    this.getRegencies(event.target.value);
                },
                onChangeRegency(event) {
                    this.districts = [];
                    this.sub_districts = [];
                    this.getDistrict(event.target.value);
                },
                onChangeDistrict(event) {
                    this.sub_districts = [];
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
