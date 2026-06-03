<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    
    <style>
        body { 
            background-color: #f8f9fa; 
            padding-top: 20px;
        }
        .card {
            border-radius: 0;
            box-shadow: none;
            border: 1px solid #dee2e6;
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-title {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 500;
        }
        /* Style tombol agar polos */
        .btn-custom {
            border-radius: 0;
            font-size: 14px;
        }
        /* Mencegah dropdown tertutup oleh baris tabel DataTables */
        .dataTables_wrapper {
            overflow: visible !important;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Manajemen Data Masyarakat</h2>
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Masyarakat</h3>
                    <div>
                        <a href="{{ url('/') }}" class="btn btn-secondary btn-sm btn-custom">Kembali</a>
                        <a href="{{ route('Masyarakat.create') }}" class="btn btn-success btn-sm btn-custom">+ Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tabel-masyarakat" class="table table-bordered table-sm table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor KK</th>
                                <th>Nomor KTP</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Opsi</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataMasyarakat as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->nomor_kk }}</td>
                                <td>{{ $item->nomor_ktp }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <!-- Dropdown Aksi -->
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle btn-custom" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            aksi
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('Masyarakat.edit', $item->id) }}">Edit</a></li>
                                            {{-- Tambahkan menu hapus atau detail di sini nanti --}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<!-- 1. jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- 2. Bootstrap Bundle JS (PENTING: Agar Dropdown Edit muncul) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- 3. DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tabel-masyarakat').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate": {
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>

</body>
</html>