<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class KelasController extends Controller
{
    public function index()
    {
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            $kelas = Kelas::latest()->get();
            return view('kelas.index', compact('kelas'));
        }
    }
    
    public function create()
    {
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            return view('kelas.create');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'materi_pelatihan' => 'required|unique:table_kelas',
            'ruangan' => 'required', 
            'durasi' => 'required|numeric', 
            'harga' => 'required|numeric'
        ]);

        $p = Kelas::create([
            'tanggal' => $request->tanggal,
            'materi_pelatihan' => $request->materi_pelatihan,
            'ruangan' => $request->ruangan,
            'durasi' => $request->durasi,
            'harga' => $request->harga
        ]);

        if ($p) {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'success' => 'Kelas baru berhasil ditambahkan'
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
            $kelas = Kelas::findOrFail($id);
            return view('kelas.edit', compact('kelas'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'tanggal' => 'required',
            'materi_pelatihan' => 'required|unique:table_kelas,materi_pelatihan,'.$id,
            'ruangan' => 'required', 
            'durasi' => 'required|numeric', 
            'harga' => 'required|numeric'
        ]);

        $p = Kelas::findOrFail($id);

        $p->update([ 
            'tanggal' => $request->tanggal,
            'materi_pelatihan' => $request->materi_pelatihan,
            'ruangan' => $request->ruangan,
            'durasi' => $request->durasi,
            'harga' => $request->harga
        ]);

        if ($p) {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'success' => 'Data kelas berhasil di-update'
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
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        if ($kelas) {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'success' => 'Data kelas berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
