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
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <label for="kode barang">kode barang</label> <br>
        <input type="text" name="kode_barang" id="kode_barang"> <br>
        <label for="jumlah">jumlah</label> <br>
        <input type="number" name="jumlah" id="jumlah"> <br>
        <label for="username">username</label> <br>
        <input type="string" name="username" id="username"> <br>

        <button type="submit">simpan</button>
    </form>
</body>
</html>