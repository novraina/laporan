@extends('components.main')
@section('title', 'Kelas')
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
                        <a href="{{ route('kelas.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah Kelas</a>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Materi Pelatihan</th>
                                        <th>Ruangan</th>
                                        <th>Durasi</th>
                                        <th>Harga</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kelas as $p)
                                    <tr>
                                        <td>{{ $p->tanggal }}</td>
                                        <td>{{ $p->materi_pelatihan }}</td>
                                        <td>{{ $p->ruangan }}</td>
                                        <td>{{ $p->durasi }}</td>
                                        <td>{{ $p->harga }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('kelas.destroy', $p->id) }}" method="POST">
                                                <a href="{{ route('kelas.edit', $p->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="6">Data kelas tidak tersedia</td>
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