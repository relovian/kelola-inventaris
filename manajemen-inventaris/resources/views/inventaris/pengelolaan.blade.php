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
            <a href="{{ route('pengelolaan.index') }}">Pengelolaan</a>
            <a href="{{ route('peminjaman.index') }}">Peminjaman</a>
        </div>
    </nav>

    <h1>Pengelolaan</h1>

    @if (session('success'))
        <div class="box-information">
            <p style="color: green;">{{ session('success') }}</p>
        </div>
    @endif

    @if ($errors->any())

        <div class="box-information">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <table border=1>
        <thead>
            <tr>
                <th>no</th>
                <th>kode barang</th>
                <th>nama barang</th>
                <th>stok masuk</th>
                <th>stok keluar</th>
                <th>total stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            {{ var_dump($pengelolaan) }}
            

            @foreach ($pengelolaan as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->stok_masuk }}</td>
                    <td>{{ $item->stok_keluar }}</td>
                    <td>{{ $item->stok_masuk - $item->stok_keluar }}</td>
                    <td>
                        <a href="">edit</a>
                        <a href="">hapus</a>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
    <a href="/TambahPeminjaman" class="tambah">Tambah peminjaman</a>
</body>

</html>
