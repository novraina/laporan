@extends('components.main')
@section('title', 'Peserta')
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
                        <a href="{{ route('peserta.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah Peserta</a>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama Peserta</th>
                                        <th>Jurusan</th>
                                        <th>Materi Pelatihan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($peserta as $p)
                                    <tr>
                                        <td>{{ $p->nim }}</td>
                                        <td>{{ $p->nama_peserta }}</td>
                                        <td>{{ $p->jurusan }}</td>
                                        <td>{{ $p->materi_pelatihan }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('peserta.destroy', $p->id) }}" method="POST">
                                                <a href="{{ route('peserta.edit', $p->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="5">Data peserta tidak tersedia</td>
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