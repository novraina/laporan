<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Peserta;
use App\Models\Instruktur;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class LaporanController extends Controller
{
    public function index()
    {
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            $laporan = Laporan::latest()->get();
            return view('laporan.index', compact('laporan'));
        }
    }
    
    public function create()
    {
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            $peserta = Peserta::latest()->get();
            $instruktur = Instruktur::latest()->get();
            $kelas = Kelas::latest()->get(); 
            return view('laporan.create', compact('peserta', 'instruktur', 'kelas'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'nim' =>  'required',
            'nama_peserta' => 'required',
            'jurusan' => 'required',
            'nip' => 'required',
            'nama_instruktur' => 'required',
            'materi_pelatihan' => 'required', 
            'harga' => 'required'
        ]);

        $p = Laporan::create([
            'tanggal' => $request->tanggal,
            'nim' => $request->nim,
            'nama_peserta' => $request->nama_peserta,
            'jurusan' => $request->jurusan,
            'nip' => $request->nip,
            'nama_instruktur' => $request->nama_instruktur, 
            'materi_pelatihan' => $request->materi_pelatihan, 
            'harga' => $request->harga
        ]);

        if ($p) {
            return redirect()
                ->route('laporan.index')
                ->with([
                    'success' => 'Laporan baru berhasil ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            $laporan = Laporan::findOrFail($id);
            $peserta = Peserta::latest()->get();
            $instruktur = Instruktur::latest()->get();
            $kelas = Kelas::latest()->get(); 
            return view('laporan.edit', compact('laporan', 'peserta', 'instruktur', 'kelas')); 
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'nim' =>  'required',
            'nama_peserta' => 'required',
            'jurusan' => 'required',
            'nip' => 'required',
            'nama_instruktur' => 'required',
            'materi_pelatihan' => 'required', 
            'harga' => 'required'
        ]);

        $p = Laporan::findOrFail($id);

        $p->update([ 
            'tanggal' => $request->tanggal,
            'nim' => $request->nim,
            'nama_peserta' => $request->nama_peserta,
            'jurusan' => $request->jurusan,
            'nip' => $request->nip,
            'nama_instruktur' => $request->nama_instruktur, 
            'materi_pelatihan' => $request->materi_pelatihan, 
            'harga' => $request->harga
        ]);

        if ($p) {
            return redirect()
                ->route('laporan.index')
                ->with([
                    'success' => 'Data laporan berhasil di-update'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        if ($laporan) {
            return redirect()
                ->route('laporan.index')
                ->with([
                    'success' => 'Data laporan berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('laporan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
