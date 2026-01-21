<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman Inventaris</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    nav {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        background-color: #B3D0FF;
        margin-bottom: 80px;
    }

    nav .link a {
        margin-left: 15px;
        color: black;
        text-decoration: none;
    }

    h1,
    table,
    .tambah,
    .box-information {
        margin-left: 300px;
    }
    
    .warning-box {
        margin-top: 20px;
        margin-left: 300px;
        font-style: italic;
        color: red;
    }
</style>

<body>
    <nav>
        <div class="title">
            <h3>Manajemen Inventaris</h3>
        </div>
        <div class="link">
            <a href="{{ route('persediaan.index') }}">Persediaan</a>
            <a href="">Pengelolaan</a>
            <a href="{{ route('peminjaman.index') }}">Peminjaman</a>
        </div>
    </nav>

    <h1>Peminjaman</h1>

    {{-- @if (session('success'))
        <div class="box-information">
            <p style="color: green;">{{ session('success') }}</p>
        </div>
    @endif --}}

    {{-- @if ($errors->any())

        <div class="box-information">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif --}}


    <table border=1>
        <thead>
            <tr>
                <th>no</th>
                <th>kode barang</th>
                <th>nama barang</th>
                <th>jumlah</th>
                <th>jumlah</th>
                <th>username</th>
                <th>tanggal pinjam</th>
                <th>tanggal kembali</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
            </tr>
        </tbody>
    </table>
    <a href="/TambahPeminajamn" class="tambah">Tambah peminjaman</a>

    <p class="warning-box"> ⚠️ Teks Warna Merah = Stok Hampir Habis</p>
</body>

</html>
