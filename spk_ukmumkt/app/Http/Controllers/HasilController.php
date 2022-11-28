<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil;

class HasilController extends Controller
{
    public function buat()
    {
        return view("hasil.form-input");
    }

    public function simpan(Request $request)
    {
        $hasil = new Hasil();
        $hasil->nama = $request->get("nama");
        $hasil->keterangan = $request->get("keterangan");
        $hasil->save();

        return redirect(route("tampil_hasil", ['id' => $hasil->id]));
    }

    public function tampil($id)
    {
        $hasil = hasil::find($id);

        return view("hasil.tampil")->with("hasil", $hasil);
    }

    public function semua()
    {
        $data = Hasil::all();
        return view("hasil.semua")->with("data", $data);
    }

    public function ubah($id)
    {
        return view("hasil.form-edit")->with("id", $id);
    }

    public function update(Request $request, $id)
    {
        $hasil = Hasil::find($id);
        $hasil->nama = $request->get("nama");
        $hasil->keterangan = $request->get("keterangan");
        $hasil->save();

        return redirect(route("tampil_hasil", ['id' => $hasil->id]));
    }

    public function hapus($id)
    {
        Hasil::destroy($id);
        return redirect(route('semua_hasil'));
    }
}
