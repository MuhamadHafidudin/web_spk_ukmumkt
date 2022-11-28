@extends("blank")

@section("konten")

    <h1>Semua Data</h1>

    @foreach($data as $kriteria)
        Nama : {{ $kriteria->nama }} <br>
        Keterangan: {{ $kriteria->keterangan }} <br>
        <a href="{{ route('ubah_kriteria', ['id' => $kriteria->id]) }}">Ubah</a>
        <a href="{{ route('tampil_kriteria', ['id' => $kriteria->id]) }}">Tampil</a>

        <form action="{{ route('hapus_kriteria', ['id' => $kriteria->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Hapus</button>
        </form>
        <hr>
    @endforeach
@endsection
