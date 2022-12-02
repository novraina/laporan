@extends('components.main')
@section('title', 'Edit Instruktur')
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
                        <form action="{{ route('instruktur.update', $instruktur->id) }}" class="forms-sample" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                    name="nip" value="{{ $instruktur->nip }}" disabled>

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
                                    name="nama_instruktur" value="{{ $instruktur->nama_instruktur }}" required>

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
                                    name="materi_pelatihan" value="{{ $instruktur->materi_pelatihan }}" required>

                                <!-- error message untuk title -->
                                @error('materi_pelatihan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('instruktur.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection