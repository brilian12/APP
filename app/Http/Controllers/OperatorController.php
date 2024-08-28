<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function index()
    {
        $customers = User::where('id_role', 2)->get();
        // $webport = Portofolio::where("category_id", 2)->count();
        // $services = Services::latest()->get();
        // $contact = Contact::latest()->get();

        $data = [
            'customers' => $customers,
        ];

        // mengirim data pegawai ke view index
        return view("/backend/operator", $data);
    }
}
