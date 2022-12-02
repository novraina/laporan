@extends('components.main')
@section('title', 'Tambah Instruktur')
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

                        <form action="{{ route('instruktur.store') }}" class="forms-sample" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                    name="nip" value="{{ old('nip') }}" required>

                                <!-- error message untuk title -->
                                @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_instruktur">Nama Instruktur</label>
                                <input type="text" class="form-control @error('nama_instruktur') is-invalid @enderror"
                                    name="nama_instruktur" value="{{ old('nama_instruktur') }}" required>

                                <!-- error message untuk title -->
                                @error('nama_instruktur')
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

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('instruktur.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
