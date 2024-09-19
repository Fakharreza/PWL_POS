<body>
    <h1>Form Ubah Data User</h1>
    <a href="/user">Kembali</a>
    <br><br>

    <form method="post" action="../ubah_simpan/{{ $data-> user_id}}">
        {{ csrf_field() }}
        {{ method_field('PUT')}}
        <label for="">Username</label>
        <input type="text" name="username" placeholder = "Masukkan Username" Value="{{$data->username}}">
        <br>
        <label for="">Nama</label>
        <input type="text" name ="nama" placeholder ="Masukkan Nama" value="{{ $data-> username}}">
        <br>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Masukkan Password" value="{{$data-> password}}">
        <br>
        <label for="">Level_id</label>
        <input type="number" name="level_id" placeholder = "Masukkan ID level" value="{{$data -> level_id}}">
        <br><br>
        <input type="submit" class ="btn btn-success" value="Ubah">
    </form>
</body>