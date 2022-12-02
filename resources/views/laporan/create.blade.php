@extends('components.main')
@section('title', 'Tambah Laporan')
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

                        <form action="{{ route('laporan.store') }}" class="forms-sample" method="POST">
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
                                <label for="nim">NIM</label>
                                <select id="ddnim" name="nim" class="form-control" required>
                                    <option value="" selected disabled>Silahkan pilih NIM</option> 
                                    @forelse ($peserta as $p)
                                    <option  data-nama-peserta="{{ $p->nama_peserta }}" data-jurusan="{{ $p->jurusan }}"value="{{ $p->nim }}">{{ $p->nim }}</option> 
                                    @empty
                                    <option value="" selected disabled>Data NIM tidak tersedia</option> 
                                    @endforelse
                                </select>

                                <!-- error message untuk title -->
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_laporan">Nama Peserta</label>
                                <input type="text" id="nama_peserta" class="form-control" name="nama_peserta" readonly>

                                <!-- error message untuk title -->
                                @error('nama_peserta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> 

                            <div class="form-group">
                                <label for="content">Jurusan</label>
                                <input type="text" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror"
                                    name="jurusan" value="{{ old('jurusan') }}" readonly>

                                <!-- error message untuk title -->
                                @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <select id="ddnip" name="nip" class="form-control" required>
                                    <option value="" selected disabled>Silahkan pilih NIP</option> 
                                    @forelse ($instruktur as $p)
                                    <option data-nama-instruktur="{{ $p->nama_instruktur }}" value="{{ $p->nip }}">{{ $p->nip }}</option> 
                                    @empty
                                    <option value="" selected disabled>Data NIP tidak tersedia</option> 
                                    @endforelse
                                </select>

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
                                    name="nama_instruktur" id="nama_instruktur" value="{{ old('nama_instruktur') }}" readonly>

                                <!-- error message untuk title -->
                                @error('nama_instruktur')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="materi_pelatihan">Materi Pelatihan</label>
                                <select id="ddmp" name="materi_pelatihan" class="form-control" required>
                                    <option value="" selected disabled>Silahkan pilih Materi Pelatihan</option> 
                                    @forelse ($kelas as $p)
                                    <option data-harga="{{ $p->harga }}" value="{{ $p->materi_pelatihan }}">{{ $p->materi_pelatihan }}</option> 
                                    @empty
                                    <option value="" selected disabled>Data Materi Pelatihan tidak tersedia</option> 
                                    @endforelse
                                </select>

                                <!-- error message untuk title -->
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Harga</label>
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror"
                                    name="harga" value="{{ old('harga') }}" readonly>

                                <!-- error message untuk title -->
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('laporan.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script type="text/javascript"> 
        $("#ddnim").change(function () {  
            document.getElementById("nama_peserta").value = $(this).find(':selected').data('nama-peserta');
            document.getElementById("jurusan").value = $(this).find(':selected').data('jurusan');
        });
        $("#ddnip").change(function () {  
            document.getElementById("nama_instruktur").value = $(this).find(':selected').data('nama-instruktur'); 
        });
        $("#ddmp").change(function () {  
            document.getElementById("harga").value = $(this).find(':selected').data('harga'); 
        });
    </script>
@endsection