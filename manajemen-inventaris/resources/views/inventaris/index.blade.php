<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Inventaris</title>
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

h1, table, .tambah, .box-information{
    margin-left: 400px;
}



</style>
<body>
    <nav>
        <div class="title"><h3>Manajemen Inventaris</h3></div>
        <div class="link">
            <a href="">Persediaan</a>
            <a href="">Pengelolaan</a>
            <a href="">Peminjaman</a>
        </div>
    </nav>

    <h1>Persediaan</h1>

    @if (session('success'))

        <div class="box-information"><p style="color: green;">{{ session('success') }}</p></div>
                
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
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $persediaan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>
                        <a href="{{ route('persediaan.edit', ['id' => $item->id]) }}">edit</a>
                        <a href="">hapus</a>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

    <a href="/TambahPersediaan" class="tambah">Tambah persediaan</a>
</body>
</html>
