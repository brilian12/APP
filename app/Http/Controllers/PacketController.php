<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    public function index()
    {
        $packet = Packet::latest()->get();
        // $webport = Portofolio::where("category_id", 2)->count();
        // $services = Services::latest()->get();
        // $contact = Contact::latest()->get();

        $data = [
            'packet' => $packet,
            // 'services' => $services,
            // 'contact' => $contact,
        ];

        // mengirim data pegawai ke view index
        return view("/backend/packet", $data);
    }
}
