<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tampilan File</title>
</head>

<body>
    <div class="container">
        <h2 class="mt-5 mb-3">Gambar Yang Diunggah</h2>
        <hr>
        <div class="row g-0">
            <div class="col-md-6 mb-3">
                <img src="{{ $path }}" alt="" class="img-fluid">
            </div>
            <h4 class="ms-2">Detail File</h4>
            <hr>
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td>Nama Asli File</td>
                        <td>:</td>
                        <td>{{ $oldName }}</td>
                    </tr>
                    <tr>
                        <td>Nama Baru File</td>
                        <td>:</td>
                        <td>{{ $newName }}</td>
                    </tr>
                    <tr>
                        <td>Lokasi File</td>
                        <td>:</td>
                        <td><a href="{{ $path }}">{{ $path }}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
