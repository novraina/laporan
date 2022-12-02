<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class PesertaController extends Controller
{
    public function index()
    { 
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            $peserta = Peserta::latest()->get();
            return view('peserta.index', compact('peserta'));
        }
    }
    
    public function create()
    {
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            return view('peserta.create');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required|unique:table_peserta',
            'nama_peserta' => 'required',
            'jurusan' => 'required',
            'materi_pelatihan' => 'required'
        ]);

        $p = Peserta::create([
            'nim' => $request->nim,
            'nama_peserta' => $request->nama_peserta,
            'jurusan' => $request->jurusan,
            'materi_pelatihan' => $request->materi_pelatihan
        ]);

        if ($p) {
            return redirect()
                ->route('peserta.index')
                ->with([
                    'success' => 'Peserta baru berhasil ditambahkan'
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
            $peserta = Peserta::findOrFail($id);
            return view('peserta.edit', compact('peserta'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nim' =>  'required|unique:table_peserta,nim,'.$id,
            'nama_peserta' => 'required',
            'jurusan' => 'required',
            'materi_pelatihan' => 'required'
        ]);

        $p = Peserta::findOrFail($id);

        $p->update([
            'nim' => $request->nim,
            'nama_peserta' => $request->nama_peserta,
            'jurusan' => $request->jurusan,
            'materi_pelatihan' => $request->materi_pelatihan
        ]);

        if ($p) {
            return redirect()
                ->route('peserta.index')
                ->with([
                    'success' => 'Data peserta berhasil di-update'
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
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        if ($peserta) {
            return redirect()
                ->route('peserta.index')
                ->with([
                    'success' => 'Data peserta berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('peserta.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
