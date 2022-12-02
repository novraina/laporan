@extends('components.main')
@section('title', 'User')
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
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>E-mail</th> 
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $p)
                                    <tr>
                                        <td>{{ $p->username }}</td>
                                        <td>{{ $p->fullname }}</td>
                                        <td>{{ $p->email }}</td> 
                                        {{-- <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('user.destroy', $p->id) }}" method="POST">
                                                <a href="{{ route('user.edit', $p->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="3">Data user tidak tersedia</td>
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