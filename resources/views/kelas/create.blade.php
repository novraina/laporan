@extends('components.main')
@section('title', 'Tambah Kelas')
@section('container')
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

                        <form action="{{ route('kelas.store') }}" class="forms-sample" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nim">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    name="tanggal" value="{{ old('tanggal') }}" required>

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
                                    name="materi_pelatihan" value="{{ old('materi_pelatihan') }}" required>

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
                                    name="ruangan" value="{{ old('ruangan') }}" required>

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
                                    name="durasi" value="{{ old('durasi') }}" required>

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
                                    name="harga" value="{{ old('harga') }}" required>

                                <!-- error message untuk title -->
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('kelas.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection