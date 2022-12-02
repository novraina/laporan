<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class InstrukturController extends Controller
{
    public function index()
    { 
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            $instruktur = Instruktur::latest()->get();
            return view('instruktur.index', compact('instruktur'));
        }
    }
    
    public function create()
    {
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            return view('instruktur.create');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|unique:table_instruktur',
            'nama_instruktur' => 'required', 
            'materi_pelatihan' => 'required'
        ]);

        $p = Instruktur::create([
            'nip' => $request->nip,
            'nama_instruktur' => $request->nama_instruktur, 
            'materi_pelatihan' => $request->materi_pelatihan
        ]);

        if ($p) {
            return redirect()
                ->route('instruktur.index')
                ->with([
                    'success' => 'Instruktur baru berhasil ditambahkan'
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
            $instruktur = Instruktur::findOrFail($id);
            return view('instruktur.edit', compact('instruktur'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'nip' =>  'required|unique:table_peserta,nim,'.$id,
            'nama_instruktur' => 'required', 
            'materi_pelatihan' => 'required'
        ]);

        $p = Instruktur::findOrFail($id);

        $p->update([ 
            'nip' => $request->nip,
            'nama_instruktur' => $request->nama_instruktur, 
            'materi_pelatihan' => $request->materi_pelatihan
        ]);

        if ($p) {
            return redirect()
                ->route('instruktur.index')
                ->with([
                    'success' => 'Data instruktur berhasil di-update'
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
        $instruktur = Instruktur::findOrFail($id);
        $instruktur->delete();

        if ($instruktur) {
            return redirect()
                ->route('instruktur.index')
                ->with([
                    'success' => 'Data instruktur berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('instruktur.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
