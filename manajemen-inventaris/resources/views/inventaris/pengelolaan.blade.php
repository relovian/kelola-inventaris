<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pengelolaan Tabel</title>
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
                        <a class="nav-link {{ request()->routeIs('persediaan.*') ? 'active fw-semibold text-white' : '' }}" href="{{ route('persediaan.index') }}">Persediaan</a>
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
                <h5 class="mb-0">Pengelolaan Stok</h5>
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
                                <th>Stok Masuk</th>
                                <th>Stok Keluar</th>
                                <th>Total Stok</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($pengelolaan as $item)
                                <tr>
                                    <td class='text-center'>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->stok_masuk }}</td>
                                    <td>{{ $item->stok_keluar }}</td>
                
                                 
                                    @if ($total_stok = $item->stok_masuk - $item->stok_keluar < 50)
                                        <td style="color: red;" class="text-center">{{ $item->stok_masuk - $item->stok_keluar }}</td>
                                    @else
                                        <td class="text-center">{{ $item->stok_masuk - $item->stok_keluar }}</td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
                        <span class="me-2">⚠️</span>
                        <div>
                            <strong>Perhatian!</strong>
                            Teks Total Stok berwarna <span class="text-danger fw-bold">merah</span>
                            menandakan stok hampir habis.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
