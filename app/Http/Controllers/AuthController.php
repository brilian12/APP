<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    function _login(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with(['failed' => 'Sorry Your Email or Password Is Wrong ']);
        } else {
            Auth::guard('web')->login($user, $remember = true);

            if ($user->id_role == 1) {
                return redirect('/backend/dashboard');
            } elseif ($user->id_role == 2) {
                return redirect('/backend/user');
            }

         //   return redirect('/backend/dashboard');
        }
    }

    public function logout(Request $request)
    {
        // Logout user dari guard web
        Auth::guard('web')->logout();

        // Hapus session untuk menjaga keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman lain yang diinginkan
        return redirect('/backend')->with('success', 'You have been logged out successfully');
    }

    public function insert()
    {

        $user = Role::latest()->get();
        $gender = Gender::latest()->get();

        $data = [
            'user' => $user,
            'gender' => $gender,
        ];


        return view("/register", $data);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:20',
            'email' => 'string|required|email|unique:users|max:255',
            'birthday' => [
                'required',
                'date',
                'before:today',
                'after_or_equal:' . now()->subYears(100)->format('Y-m-d'),
            ],
            'id_gender' => 'required',
            'id_role' => 'required',
            'password' => [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/',
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customers = User::create([
            'name'     => $request->name,
            'email'   => $request->email,
            'birthday'   => $request->birthday,
            'id_role'   => $request->id_role,
            'id_gender'   => $request->id_gender,
            'password'   => Hash::make($request->password),
        ]);


        if ($customers) {
            //redirect dengan pesan sukses
            Mail::to($customers->email)->send(new RegistrationSuccess($customers));
            return redirect('/backend')->with('message', 'Data Berhasil Ditambahkan');
            session()->flash('success', 'Registrasi berhasil! Cek Email Anda');
        } else {
            //redirect dengan pesan error
            return redirect()->route('/register')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
