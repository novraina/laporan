@extends('components.main')
@section('title', 'Edit Kelas')
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
                        <form action="{{ route('kelas.update', $kelas->id) }}" class="forms-sample" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nim">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    name="tanggal" value="{{ $kelas->tanggal }}" required>

                                <!-- error message untuk title -->
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> 

                            <div class="form-group">
                                <label for="content">Materi Pelatihan</label>
                                <input type="text" class="form-control @error('materi_pelatihan') is-invalid @enderror"
                                    name="materi_pelatihan" value="{{ $kelas->materi_pelatihan }}" required>

                                <!-- error message untuk title -->
                                @error('materi_pelatihan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Ruangan</label>
                                <input type="text" class="form-control @error('ruangan') is-invalid @enderror"
                                    name="ruangan" value="{{ $kelas->ruangan }}" required>

                                <!-- error message untuk title -->
                                @error('ruangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Durasi (Jam)</label>
                                <input type="number" class="form-control @error('durasi') is-invalid @enderror"
                                    name="durasi" value="{{ $kelas->durasi }}" required>

                                <!-- error message untuk title -->
                                @error('durasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                    name="harga" value="{{ $kelas->harga }}" required>

                                <!-- error message untuk title -->
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('kelas.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection