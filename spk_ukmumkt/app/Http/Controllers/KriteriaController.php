<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function buat()
    {
        return view("kriteria.form-input");
    }

    public function simpan(Request $request)
    {
        $kriteria = new Kriteria();
        $kriteria->nama = $request->get("nama");
        $kriteria->keterangan = $request->get("keterangan");
        $kriteria->save();

        return redirect(route("tampil_kriteria", ['id' => $kriteria->id]));
    }

    public function tampil($id)
    {
        $kriteria = Kriteria::find($id);

        return view("kriteria.tampil")->with("kriteria", $kriteria);
    }

    public function semua()
    {
        $data = Kriteria::all();
        return view("kriteria.semua")->with("data", $data);
    }

    public function ubah($id)
    {
        return view("kriteria.form-edit")->with("id", $id);
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->nama = $request->get("nama");
        $kriteria->keterangan = $request->get("keterangan");
        $kriteria->save();

        return redirect(route("tampil_kriteria", ['id' => $kriteria->id]));
    }

    public function hapus($id)
    {
        Kriteria::destroy($id);
        return redirect(route('semua_kriteria'));
    }
}
