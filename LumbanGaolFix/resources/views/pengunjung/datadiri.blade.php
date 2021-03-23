@extends('layouts.defaultthree')
@section('title', 'Pengunjung')
@section('edit-css')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comments"></i></span><span>Forum</span></h4>
        <p>Data Diri / </p>
    </div>
    <div class="content-right">
        <div class="bigContent flex-baru-row">
            <div class="biodata shadow-sm">
                <form action="/pengunjung/biodata/save" method="post" onsubmit="return submitForm(this, false)">
                    <div class="table-responsive">
                     <table class="table">
                         <tbody>
                             <tr>
                                 <td>Nama Lengkap</td>
                                 <td><input type="text" name="name" id="" value="{{ Auth::user()->name }}" data-toggle="tooltip" title="Klik jika ingin mengubah data!" required></td>
                             </tr>
                             <tr>
                                 <td>Email</td>
                                 <td data-toggle="tooltip" title="Tidak dapat diubah!">{{ Auth::user()->email }}</td>
                             </tr>
                             <tr>
                                 <td>Alamat</td>
                                 <td>
                                 <textarea data-toggle="tooltip" title="Klik jika ingin mengubah data!" name="alamat" id="" cols="30" rows="5" required>{{ Auth::user()->alamat == Null ? 'Belum Mengisi Alamat' : Auth::user()->alamat   }}</textarea>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Jenis Kelamin</td>
                                 <td><select name="jenisKelamin" id="" class="form-control" required>
                                         <option value="L" {{ Auth::user()->jenisKelamin === 'L' ? 'selected' : '' }}>Laki-laki</option>
                                         <option value="P" {{ Auth::user()->jenisKelamin === 'P' ? 'selected' :  '' }}>Perempuan</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Tanggal Lahir</td>
                                 <td><input class="form-control" type="date" name="tanggalLahir" id="" value="{{ Auth::user()->tanggalLahir }}" required></td>
                             </tr>
                             <tr>
                                 <td colspan="2">
                                     <button type="submit" class="btn btn-success">
                                         <i class="fas fa-exchange-alt"></i> <span class='text-btn'>Simpan Perubahan</span>
                                         <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                                         <span class='text-loading displayNone'>Sedang Menyimpan</span>
                                     </button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                    </div>
                 </form>
            </div>
            <div class="profile shadow-sm">
                <form action="/pengunjung/biodata/profile/save" method="post" enctype="multipart/form-data" onsubmit="return submitForm(this, false)">
                    <img src="/uploads/img/UserProfile/{{ Auth::user()->profile }}" alt="asdasd" width="100%">
                    <div class="custom-file mb-3 mt-60">
                        <input type="file" class="custom-file-input" id="file" name="file" required>
                        <input type="hidden" name="oldFile" value="{{ Auth::user()->profile }}" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-exchange-alt"></i><span class='text-btn'>Ganti Profile</span>
                        <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                        <span class='text-loading displayNone'>Sedang Mengubah</span>
                    </button>
                    <a class="btn btn-warning" onclick="return refresh()"><i class="fas fa-sync-alt"></i> Reset</a>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
@endsection
