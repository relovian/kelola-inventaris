<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
    <h1>Tambah Persediaan</h1>

    <form action="{{ route('persediaan.update', ['id' => $persediaanDetail->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="kode_barang">Kode Barang : </label> <br>
        <input type="text" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $persediaanDetail->kode_barang??'') }}"> <br>
        <label for="nama_barang">Nama Barang : </label> <br>
        <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $persediaanDetail->nama_barang??'') }}">  <br>
        <label for="kategori">Kategori : </label><br>
            <span>Alat Tulis Kantor</span>
            <input type="radio" name="kategori" id="kategori" value="Alat Tulis Kantor" name="kategori" {{ old('kategori', $persediaanDetail->kategori == 'Alat Tulis Kantor' ? 'checked' : '') }}><br>
            <span>Elektronik</span>
            <input type="radio" name="kategori" id="kategori" value="Elektronik" name="kategori" {{ old('kategori', $persediaanDetail->kategori == "Elektronik" ? 'checked' : '') }}> <br> 
        <label for="number">Jumlah : </label> <br>
        <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $persediaanDetail->jumlah??'') }}"> <br> <br>

        <button type="submit">tambah</button>
    </form>
</body>
</html>