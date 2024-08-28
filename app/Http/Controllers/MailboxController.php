<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MailboxController extends Controller
{
    public function index()
    {
        $customers = User::where('id_role', 2)->get();
        

        $data = [
            'customers' => $customers,
        ];

        // mengirim data pegawai ke view index
        return view("/backend/mailbox", $data);
    }
}
