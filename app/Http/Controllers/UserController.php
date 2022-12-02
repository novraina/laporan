<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class UserController extends Controller
{
    public function index()
    { 
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            $user = User::latest()->get();
            return view('user.index', compact('user'));
        }
    }  

    public function edit($id)
    {
        if(auth()->user()==null){
            return redirect('/login')->with('message', 'Please sign in to continue.');
        }
        else{
            $user = User::findOrFail($id);
            return view('user.edit', compact('user'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' =>  'required|min:5|unique:table_user,username,'.$id,
            'fullname' => 'required',
            'email' => 'required|email|unique:table_user,email,'.$id,
            'password' => 'required|min:5'
        ]); 

        $p = User::findOrFail($id);

        $p->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]); 

        if ($p) {
            return redirect()
                ->route('user.index')
                ->with([
                    'success' => 'Data user berhasil di-update'
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
        $user = User::findOrFail($id);
        $user->delete();

        if ($user) {
            return redirect()
                ->route('user.index')
                ->with([
                    'success' => 'Data user berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('user.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
