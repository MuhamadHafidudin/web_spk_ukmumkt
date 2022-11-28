@extends("blank")

@section("konten")

    <h1>Semua Data</h1>

    @foreach($data as $mahasiswa)
        Nama : {{ $mahasiswa->nama }} <br>
        Keterangan: {{ $mahasiswa->keterangan }} <br>
        <a href="{{ route('ubah_mahasiswa', ['id' => $mahasiswa->id]) }}">Ubah</a>
        <a href="{{ route('tampil_mahasiswa', ['id' => $mahasiswa->id]) }}">Tampil</a>

        <form action="{{ route('hapus_mahasiswa', ['id' => $mahasiswa->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Hapus</button>
        </form>
        <hr>
    @endforeach
@endsection
