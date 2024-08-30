<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $customers = User::where('id_role', 4)->get();

        $data = [
            'customers' => $customers,
        ];

        // mengirim data pegawai ke view index
        return view("/backend/users", $data);
    }

    public function edit(Request $request)
    {

        $data = [
            "customers" => User::where("id", $request->id)->first()
        ];

        return view('/backend/user/update', $data);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'name'     => 'required',
            'email'   => 'required',
            'birthday'   => 'required'
        ]);

        User::where("id", $request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "birthday" => $request->birthday,
        ]);

        return redirect('/backend/users')->with('message', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        User::where("id", $id)->delete();


        return redirect('/backend/users')->with('message', 'Data Berhasil Dihapus');
    }
}
