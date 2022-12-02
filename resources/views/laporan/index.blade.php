@extends('components.main')
@section('title', 'Laporan')
@section('container')
    <div class="content-wrapper">

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
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('laporan.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah Laporan</a>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>NIM</th>
                                        <th>Nama Peserta</th>
                                        <th>Jurusan</th>
                                        <th>NIP</th>
                                        <th>Nama Instruktur</th>
                                        <th>Materi Pelatihan</th>
                                        <th>Harga</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laporan as $p)
                                    <tr>
                                        <td>{{ $p->tanggal }}</td>
                                        <td>{{ $p->nim }}</td>
                                        <td>{{ $p->nama_peserta }}</td>
                                        <td>{{ $p->jurusan }}</td>
                                        <td>{{ $p->nip }}</td>
                                        <td>{{ $p->nama_instruktur }}</td>
                                        <td>{{ $p->materi_pelatihan }}</td>
                                        <td>{{ $p->harga }}</td> 
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('laporan.destroy', $p->id) }}" method="POST">
                                                <a href="{{ route('laporan.edit', $p->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="9">Data laporan tidak tersedia</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection