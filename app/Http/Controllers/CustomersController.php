<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = User::where('id_role', 1)->get();
        // $webport = Portofolio::where("category_id", 2)->count();
        // $services = Services::latest()->get();
        // $contact = Contact::latest()->get();

        $data = [
            'customers' => $customers,
            // 'services' => $services,
            // 'contact' => $contact,
        ];

        // mengirim data pegawai ke view index
        return view("/backend/widget", $data);
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $customers = Customers::where('name', 'like', '%' . request('search') . '%')->paginate(5);
        } else {
            $customers = Customers::paginate(5);
        }

        // mengirim data pegawai ke view index
        return view("/backend/widget", ['customers' => $customers]);
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'name'     => 'required',
            'email'     => 'required',
        ]);

        $customers = Customers::create([
            'name'     => $request->name,
            'email'   => $request->email,
        ]);


        if ($customers) {
            //redirect dengan pesan sukses
            return redirect('/backend/widget')->with('message', 'Data Berhasil Ditambahkan');
        } else {
            //redirect dengan pesan error
            return redirect()->route('/backend/insertcustomer')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Request $request)
    {

        $data = [
            "customers" => Customers::where("id", $request->id)->first()
        ];

        return view('/backend/customers/update', $data);
    }

    public function detail(Request $request)
    {

        $data = [
            "customers" => Customers::where("id", $request->id)->first()
        ];

        return view('/backend/customers/detail', $data);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'name'     => 'required',
            'email'   => 'required'
        ]);

        Customers::where("id", $request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
        ]);

        return redirect('/backend/widget')->with('message', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        Customers::where("id", $id)->delete();


        return redirect('/backend/widget')->with('message', 'Data Berhasil Dihapus');
    }
}