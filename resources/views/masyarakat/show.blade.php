<!DOCTYPE html>
<html>
<head>
    <title>Detail Masyarakat</title>
</head>
<body>

<h1>Detail Masyarakat</h1>

<p><strong>Nama:</strong> {{ $masyarakat->nama }}</p>
<p><strong>No KK:</strong> {{ $masyarakat->nomor_kk }}</p>
<p><strong>No KTP:</strong> {{ $masyarakat->nomor_ktp }}</p>
<p><strong>Alamat:</strong> {{ $masyarakat->alamat }}</p>
<p><strong>Jenis Kelamin:</strong> {{ $masyarakat->jenis_kelamin }}</p>

<hr>

<h2>Daftar Keluhan</h2>

@if($masyarakat->keluhans->count())
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Keluhan</th>
            <th>Status</th>
        </tr>

        @foreach($masyarakat->keluhans as $keluhan)
            <tr>
                <td>{{ $keluhan->id }}</td>
                <td>{{ $keluhan->keluhan }}</td>
                <td>{{ $keluhan->status }}</td>
            </tr>
        @endforeach

    </table>
@else
    <p>Belum ada keluhan.</p>
@endif

<br>

<a href="{{ route('Masyarakat.index') }}">
    Kembali ke Daftar Masyarakat
</a>

</body>
</html>