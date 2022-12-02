@extends('components.main')
@section('title', 'Edit Peserta')
@section('container')
<head> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
</head>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card"> 
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body"> 
                        <form action="{{ route('peserta.update', $peserta->id) }}" class="forms-sample" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror"
                                    name="nim" value="{{ $peserta->nim }}" required>

                                <!-- error message untuk title -->
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_peserta">Nama Peserta</label>
                                <input type="text" class="form-control @error('nama_peserta') is-invalid @enderror"
                                    name="nama_peserta" value="{{ $peserta->nama_peserta }}" required>

                                <!-- error message untuk title -->
                                @error('nama_peserta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Jurusan</label>
                                <input type="text" class="form-control @error('jurusan') is-invalid @enderror"
                                    name="jurusan" value="{{ $peserta->jurusan }}" required>

                                <!-- error message untuk title -->
                                @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Materi Pelatihan</label>
                                <input type="text" class="form-control @error('materi_pelatihan') is-invalid @enderror"
                                    name="materi_pelatihan" value="{{ $peserta->materi_pelatihan }}" required>

                                <!-- error message untuk title -->
                                @error('materi_pelatihan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('peserta.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection