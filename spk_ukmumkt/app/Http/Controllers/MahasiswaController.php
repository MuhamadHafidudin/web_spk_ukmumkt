<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function buat()
    {
        return view("mahasiswa.form-input");
    }

    public function simpan(Request $request)
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->get("nama");
        $mahasiswa->keterangan = $request->get("keterangan");
        $mahasiswa->save();

        return redirect(route("tampil_mahasiswa", ['id' => $mahasiswa->id]));
    }

    public function tampil($id)
    {
        $mahasiswa = mahasiswa::find($id);

        return view("mahasiswa.tampil")->with("mahasiswa", $mahasiswa);
    }

    public function semua()
    {
        $data = Mahasiswa::all();
        return view("mahasiswa.semua")->with("data", $data);
    }

    public function ubah($id)
    {
        return view("mahasiswa.form-edit")->with("id", $id);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $request->get("nama");
        $mahasiswa->keterangan = $request->get("keterangan");
        $mahasiswa->save();

        return redirect(route("tampil_mahasiswa", ['id' => $mahasiswa->id]));
    }

    public function hapus($id)
    {
        Mahasiswa::destroy($id);
        return redirect(route('semua_mahasiswa'));
    }
}
