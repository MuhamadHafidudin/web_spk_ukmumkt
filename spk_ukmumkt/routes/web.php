<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\MahasiswaController;



Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get("/hello/{nama}/{gender}", function($nama, $gender) {
    echo "Hello ".$nama. " seorang ". $gender;
})->name("hello");


Route::get("/hii/panggilan/{nama}", [TestingController::class, "hii"])->name("panggilan");

Route::get("/tentang-saya", [TestingController::class, "about"])->name("about");

Route::get("/my-journey", [TestingController::class, "journey"])->name("journey");

Route::get("/my-work", function() {
    return view("my-work");
})->name("work");

Route::get("/my-publication", function() {
    return view("my-publication");
})->name("publication");

Route::get("/my-courses", function() {
    return view("my-courses");
})->name("courses");

Route::get("/tampil-semua-user", [UserController::class, "tampil"])->name("user_all"); // URL Tampil Semua User
Route::get("/input-user", [UserController::class, "formInput"])->name("user_input");   // URL Form Input
Route::post("/simpan-user", [UserController::class, "simpan"])->name("user_simpan");   // URL Simpan User

Route::get("/edit-user/{id}", [UserController::class, "formEdit"])->name("user_edit"); // URL Form Edit
Route::put("/update-user/{id}", [UserController::class, "update"])->name("user_update"); // URL Form Edit


Route::delete("/hapus-user/{id}", [UserController::class, "hapus"])->name("user_hapus"); // URL Form hapus
Route::get("/tampil-user/{id}", [UserController::class, "show"])->name("user_show"); // URL Form hapus

Route::get("/login", [SecurityController::class, "formLogin"])->name("login");
Route::post("/proses-login", [SecurityController::class, "prosesLogin"])->name("proses_login");
Route::get("/logout", [SecurityController::class, "logout"])->name("logout");

Route::middleware("auth")->group(function() {
    Route::get("mahasiswa/buat", [MahasiswaController::class, 'buat'])->name("buat_mahasiswa");
    Route::post("mahasiswa/simpan", [MahasiswaController::class, 'simpan'])->name("simpan_mahasiswa");
    Route::get("mahasiswa/tampil/{id}", [MahasiswaController::class, 'tampil'])->name("tampil_mahasiswa");
    Route::get("mahasiswa/semua", [MahasiswaController::class, 'semua'])->name("semua_mahasiswa");
    Route::get("mahasiswa/ubah/{id}", [MahasiswaController::class, 'ubah'])->name("ubah_mahasiswa");
    Route::put("mahasiswa/update/{id}", [mahasiswaController::class, 'update'])->name("update_mahasiswa");
    Route::delete("mahasiswa/hapus/{id}", [mahasiswaController::class, 'hapus'])->name("hapus_mahasiswa");

    Route::get("kriteria/buat", [KriteriaController::class, 'buat'])->name("buat_kriteria");
    Route::post("kriteria/simpan", [KriteriaController::class, 'simpan'])->name("simpan_kriteria");
    Route::get("kriteria/tampil/{id}", [KriteriaController::class, 'tampil'])->name("tampil_kriteria");
    Route::get("kriteria/semua", [KriteriaController::class, 'semua'])->name("semua_kriteria");
    Route::get("kriteria/ubah/{id}", [KriteriaController::class, 'ubah'])->name("ubah_kriteria");
    Route::put("kriteria/update/{id}", [KriteriaController::class, 'update'])->name("update_kriteria");
    Route::delete("kriteria/hapus/{id}", [KriteriaController::class, 'hapus'])->name("hapus_kriteria");

    Route::get("hasil/buat", [HasilController::class, 'buat'])->name("buat_hasil");
    Route::post("hasil/simpan", [HasilController::class, 'simpan'])->name("simpan_hasil");
    Route::get("hasil/tampil/{id}", [HasilController::class, 'tampil'])->name("tampil_hasil");
    Route::get("hasil/semua", [HasilController::class, 'semua'])->name("semua_hasil");
    Route::get("hasil/ubah/{id}", [HasilController::class, 'ubah'])->name("ubah_hasil");
    Route::put("hasil/update/{id}", [HasilController::class, 'update'])->name("update_hasil");
    Route::delete("hasil/hapus/{id}", [HasilController::class, 'hapus'])->name("hapus_hasil");

});


