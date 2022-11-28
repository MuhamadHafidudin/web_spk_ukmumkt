@extends("blank")

@section("konten")

    <h1>Semua Data</h1>

    @foreach($data as $hasil)
        Nama : {{ $hasil->nama }} <br>
        Keterangan: {{ $hasil->keterangan }} <br>
        <a href="{{ route('ubah_hasil', ['id' => $hasil->id]) }}">Ubah</a>
        <a href="{{ route('tampil_hasil', ['id' => $hasil->id]) }}">Tampil</a>

        <form action="{{ route('hapus_hasil', ['id' => $hasil->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Hapus</button>
        </form>
        <hr>
    @endforeach
@endsection
