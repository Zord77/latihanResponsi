<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bahan Baku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Bahan Baku</h1>
        <a href="{{ url('/bahanbaku/create') }}" class="btn btn-success mb-3">Tambah Bahan Baku</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Bahan</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bahanbaku as $bahan)
                    <tr>
                        <td>{{ $bahan->id_bahan }}</td>
                        <td>{{ $bahan->nama_bahan }}</td>
                        <td>{{ $bahan->stok }}</td>
                        <td>{{ $bahan->harga }}</td>
                        <td>{{ $bahan->satuan }}</td>
                        <td>
                            <a href="{{ url('/bahanbaku/edit/' . $bahan->id_bahan) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ url('/bahanbaku/delete/' . $bahan->id_bahan) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
