<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peminjaman Tabel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                Manajemen Inventaris
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('persediaan.*') ? 'active fw-semibold text-white' : '' }}" href="{{ route('persediaan.index') }}">Persediaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('pengelolaan.*') ? 'active fw-semibold text-white' : '' }}" href="{{ route('pengelolaan.index') }}">Pengelolaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('peminjaman.*') ? 'active fw-semibold text-white' : '' }}" href="{{ route('peminjaman.index') }}">Peminjaman</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Peminjaman Stok</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())

                        <div class="alert alert-danger" role="alert">
                            <strong>Gagal!</strong> Data belum lengkap:
                            <ul class="mb-0 mt-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Username</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($peminjaman as $item)
                                <tr>
                                    <td class='text-center'>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    @if ($item->jumlah < 50)
                                        <td style="color: red;" class="text-center">{{ $item->jumlah }}</td>
                                    @else
                                        <td class="text-center">{{ $item->jumlah }}</td>
                                    @endif
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->tanggal_pinjam }}</td>
                                    <td>{{ $item->tanggal_kembali }}</td>


                                    <td>
                                        <a href="{{ route('peminjaman.edit', ['id' => $item->id]) }}"
                                            class="btn btn-warning btn-sm text-decoration-none text-black">
                                            Edit
                                        </a>

                                        <a href="{{ route('peminjaman.destroy', ['id' => $item->id]) }}"
                                            class="btn btn-danger btn-sm text-decoration-none text-white">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="/TambahPeminjaman" class="btn btn-primary btn-sm fw-semibold">
                            Tambah Peminjaman
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
