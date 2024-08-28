<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    public function index()
    {
        $customers = User::where('id_role', 3)->get();
        

        $data = [
            'customers' => $customers,
        ];

        // mengirim data pegawai ke view index
        return view("/backend/approval", $data);
    }
}
