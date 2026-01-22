<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tambah peminjaman</title>
</head>
<body>
    <h1>Tambah Peminjaman</h1>
    <form action="{{ route('peminjaman.update', ['id' => $peminjamanDetail->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="kode barang">kode barang</label> <br>
        <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang', $peminjamanDetail->kode_barang) }}" > <br>
        <label for="jumlah">jumlah</label> <br>
        <input type="number" name="jumlah" id="jumlah"  value="{{ old('jumlah', $peminjamanDetail->jumlah) }}" > <br>
        <label for="username">username</label> <br>
        <input type="string" name="username" id="username"  value="{{ old('username', $peminjamanDetail->username) }}" > <br>
        <label for="tanggal_kembali">tanggal kembali</label> <br>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali" value={{ old('tanggal_kembali', $peminjamanDetail->tanggal_kembali) }}>  <br>

        <button type="submit">edit</button>
    </form>
</body>
</html>