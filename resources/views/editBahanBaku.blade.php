<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bahan Baku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Bahan Baku</h1>
        <form action="{{ url('/bahanbaku/update/' . $bahanbaku->id_bahan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_bahan">Nama Bahan</label>
                <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" value="{{ $bahanbaku->nama_bahan }}" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $bahanbaku->stok }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $bahanbaku->harga }}" required>
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $bahanbaku->satuan }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
