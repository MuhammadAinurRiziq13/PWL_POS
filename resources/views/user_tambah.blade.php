<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form tambah data</h1>
    <form action="/user/tambah_simpan" method="post">
        {{ csrf_field() }}

        <label for="">Username</label>
        <input type="text" name="username" id="username" placeholder="Masukkan Username">
        <br>
        <label for="">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama">
        <br>
        <label for="">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan Password">
        <br>
        <label for="">Level ID</label>
        <input type="number" name="level_id" id="level_id" placeholder="Masukkan ID Level">
        <br><br>
        <input type="submit" name="" id="" class="" value="Simpan">
    </form>
</body>
</html>