<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Packet;
use App\Models\Trans;
use Illuminate\Http\Request;

class TransController extends Controller
{
    public function index()
    {
        $trans = Trans::latest()->get();
        // $webport = Portofolio::where("category_id", 2)->count();
        // $services = Services::latest()->get();
        // $contact = Contact::latest()->get();

        $data = [
            'trans' => $trans,
            // 'services' => $services,
            // 'contact' => $contact,
        ];

        // mengirim data pegawai ke view index
        return view("/backend/trans", $data);
    }

    public function insert()
    {

        $cust = Customers::latest()->get();
        $pack = Packet::latest()->get();

        $data = [
            'cust' => $cust,
            'pack' => $pack,
        ];


        return view("/backend/transaction/insert", $data);
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'id_cust'     => 'required',
            'id_pack'     => 'required',
            'qty'     => 'required',
            'total'     => 'required',
        ]);

        $customers = Trans::create([
            'id_cust'     => $request->id_cust,
            'id_pack'   => $request->id_pack,
            'qty'   => $request->qty,
            'total'   => $request->qty,
        ]);



        if ($customers) {
            //redirect dengan pesan sukses
            return redirect('/backend/transaction')->with('message', 'Data Berhasil Ditambahkan');
        } else {
            //redirect dengan pesan error
            return redirect()->route('/backend/insertcustomer')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
