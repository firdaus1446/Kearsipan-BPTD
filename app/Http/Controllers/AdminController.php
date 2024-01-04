<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtuser = User::paginate(5);
        return view('Admin.datauser', compact('dtuser'));


        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('Admin.datauser', compact('dtuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required',
            'password' => 'required|min:6',
            'level' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png', // Sesuaikan dengan kebutuhan
        ]);

        // dd($request->all());
        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            // $foto_ekstensi = $foto_file->extension();
            // $foto_nama = date('ymdhis').".". $foto_ekstensi;
            $foto_nama_asli = $foto_file->getClientOriginalName();

            // Dapatkan timestamp saat ini
            $timestamp = date('is');

            // Gabungkan nama asli dengan timestamp
            $foto_nama = $timestamp . '_' . $foto_nama_asli;
            $foto_file->move(public_path('image'), $foto_nama);
        } else {
            $foto_nama = null;
        }


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $foto_nama,
            'level' => $request->level,
            'remember_token' => Str::random(10),

        ]);


        return redirect('datauser')->with('success', 'Data Berhasil Di Buat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $us = User::findorfail($id);
        return view('Admin.edituser', compact('us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'level' => $request->input('level'),
        ];

        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            // $foto_ekstensi = $foto_file->extension();
            // $foto_nama = date('ymdhis').".". $foto_ekstensi;
            $foto_nama_asli = $foto_file->getClientOriginalName();

            // Dapatkan timestamp saat ini
            $timestamp = date('is');

            // Gabungkan nama asli dengan timestamp
            $foto_nama = $timestamp . '_' . $foto_nama_asli;
            $foto_file->move(public_path('image'), $foto_nama);

            $us = User::findorfail($id);
            File::delete(public_path('image') . '/' .
                $us->foto);

            $data['foto'] = $foto_nama;
        }

        $us = User::findorfail($id);
        $us->update($data);
        return redirect('datauser')->with('success', 'Data Berhasil Di Update ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $us = User::findorfail($id);
        File::delete(public_path('image') . '/' . $us->foto);
        $us->delete();
        return back()->with('info', 'Data Berhasil Di Hapus');

        // $dtuser = User::findorfail($id);

        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        // return view('Admin.datauser', compact('dtuser'));
    }

    public function searchUser(Request $request)
    {
        $keyword = $request->input('keyword');

        $dtuser = User::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('level', 'like', '%' . $keyword . '%')
            ->paginate(5);

        return view('Admin.datauser', compact('dtuser'));
    }

    public function profil()
    {
        $dtuser = User::paginate(5);
        return view('Admin.profil', compact('dtuser'));
    }

    public function editprofil($id)
    {
        $us = User::findorfail($id);
        return view('Admin.editprofil', compact('us'));
    }

    public function updateprofil(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            // $foto_ekstensi = $foto_file->extension();
            // $foto_nama = date('ymdhis').".". $foto_ekstensi;
            $foto_nama_asli = $foto_file->getClientOriginalName();

            // Dapatkan timestamp saat ini
            $timestamp = date('is');

            // Gabungkan nama asli dengan timestamp
            $foto_nama = $timestamp . '_' . $foto_nama_asli;
            $foto_file->move(public_path('image'), $foto_nama);

            $us = User::findorfail($id);
            File::delete(public_path('image') . '/' .
                $us->foto);

            $data['foto'] = $foto_nama;
        }

        $us = User::findorfail($id);
        $us->update($data);
        return redirect('profil')->with('success', 'Data Berhasil Di Update ');
    }
}
