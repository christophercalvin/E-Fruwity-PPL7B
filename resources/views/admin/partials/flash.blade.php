@if ($errors->any())
    <div class="alert alert-danger">
        <strong>OOOOOOOOOOPS!</strong>
        <br>
        Maaf Terjadi Kesalahan Dengan Inputan Anda! Silahkan Cek Apakah Data Sudah Sesuai atau Ada Kolom yang Belum Terisi.<br/><br/>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> 
@endif

@if (session('success'))
    <div class="alert alert-success">{{ session('YESS!!! Berhasil Mengubah Data') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('OH TIDAK! Terjadi Kesalahan, Silahkan Coba Lagi') }}</div>
@endif