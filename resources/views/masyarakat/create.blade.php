<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; padding-top: 30px; }
        .card { border-radius: 0; border: 1px solid #dee2e6; }
        .form-group { margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Masyarakat.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            @error('nama') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="nomor_kk" class="form-label">Nomor KK</label>
                            <input type="text" name="nomor_kk" id="nomor_kk" class="form-control @error('nomor_kk') is-invalid @enderror" value="{{ old('nomor_kk') }}">
                            @error('nomor_kk') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="nomor_ktp" class="form-label">Nomor KTP</label>
                            <input type="text" name="nomor_ktp" id="nomor_ktp" class="form-control @error('nomor_ktp') is-invalid @enderror" value="{{ old('nomor_ktp') }}">
                            @error('nomor_ktp') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                            @error('alamat') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">Pilih Gender</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender }}" {{ old('jenis_kelamin') == $gender ? 'selected' : '' }}>{{ $gender }}</option>
                                @endforeach
                            </select>
                            @error('jenis_kelamin') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary" style="border-radius:0">Simpan</button>
                            <a href="{{ route('Masyarakat.index') }}" class="btn btn-secondary" style="border-radius:0">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>