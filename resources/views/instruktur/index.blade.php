@extends('components.main')
@section('title', 'Instruktur')
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
                        <a href="{{ route('instruktur.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah Instruktur</a>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama Instruktur</th>
                                        <th>Materi Pelatihan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($instruktur as $p)
                                    <tr>
                                        <td>{{ $p->nip }}</td>
                                        <td>{{ $p->nama_instruktur }}</td>
                                        <td>{{ $p->materi_pelatihan }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('instruktur.destroy', $p->id) }}" method="POST">
                                                <a href="{{ route('instruktur.edit', $p->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data instruktur tidak tersedia</td>
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