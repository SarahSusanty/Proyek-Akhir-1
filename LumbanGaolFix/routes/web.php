    <?php

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */


    //Beranda
    Route::get('/', 'BerandaController@index')->name('beranda');


    Auth::routes(['verify'=>true]);
    // Pengunjung
    Route::get('/home', 'PengunjungController@index')->name('pengunjung');
    Route::get('/pengunjung/aspirasi', 'PengunjungController@aspirasi')->name('pengunjung.aspirasi');
    Route::get('/pengunjung/aspirasi/baru', 'PengunjungController@aspirasiBaru')->name('pengunjung.aspirasiBaru');
    Route::get('/pengunjung/aspirasi/edit/{id}', 'PengunjungController@aspirasiEdit')->name('pengunjung.aspirasiBaru');
    Route::get('/pengunjung/paginate/{status}/aspirasi', 'PengunjungController@paginateAspirasi')->name('pengunjung.paginateAspirasi');
    Route::post('/pengunjung/aspirasi/edit/Store', 'PengunjungController@prosesEdit')->name('pengunjung.aspirasiBaru');
    Route::post('/pengunjung/aspirasi/baru/Store', 'PengunjungController@proses')->name('pengunjung.aspirasiBaru');
    Route::post('/pengunjung/aspirasi/delete', 'PengunjungController@deleteAspirasi')->name('pengunjung.aspirasiBaru');
    Route::get('/pengunjung/forum', 'PengunjungController@forum')->name('pengunjung.forum');
    Route::get('/pengunjung/forum/ditolak', 'PengunjungController@forumDitolak')->name('pengunjung.forum');
    Route::get('/pengunjung/forum/menunggu', 'PengunjungController@forumMenunggu')->name('pengunjung.forum');
    Route::Post('/pengunjung/forum/keluar', 'PengunjungController@forumKeluar')->name('pengunjung.forum');
    Route::Post('/pengunjung/forum/coba', 'PengunjungController@forumCoba')->name('pengunjung.forum');
    Route::post('/pengunjung/forum/menunggu/row', 'PengunjungController@forumMenungguRow')->name('pengunjung.forum');
    Route::post('/pengunjung/forum/ditolak/row', 'PengunjungController@forumDitolakRow')->name('pengunjung.forum');
    Route::get('/forum/messages/{id}/{read}', 'PengunjungController@forumMessagesRow')->name('pengunjung.forum');
    Route::get('/pengunjung/{id}/messages', 'PengunjungController@forumMessage')->name('pengunjung.forum');
    Route::post('/forum/messages/send', 'PengunjungController@forumMessagesSend')->name('pengunjung.forum');
    Route::post('/forum/messages/delete/{id}', 'PengunjungController@forumMessagesDelete')->name('pengunjung.forum');
    Route::get('/pengunjung/forum/join', 'PengunjungController@forumJoin')->name('pengunjung.forumJoin');
    Route::get('/pengunjung/{id}/join/request', 'PengunjungController@requestJoinForum')->name('pengunjung.forumJoin');
    Route::get('/pengunjung/datadiri', 'PengunjungController@dataDiri')->name('pengunjung.forumJoin');
    Route::post('/pengunjung/biodata/profile/save', 'PengunjungController@dataDiriProfile')->name('pengunjung.datadiriProfile');
    Route::post('/pengunjung/biodata/save', 'PengunjungController@dataDiriBiodata')->name('pengunjung.dataDiriBiodata');
    Route::post('/pengunjung/liveSearchForumJoin', 'PengunjungController@liveSearchForumJoin')->name('pengunjung.forumJoin');
    Route::post('/pengunjung/liveSearchForum', 'PengunjungController@liveSearchForum')->name('pengunjung.forumJoin');
    // Admin
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/biodata', 'AdminController@dataDiri')->name('admin.datadiri');
    Route::post('/admin/biodata/profile/save', 'AdminController@dataDiriProfile')->name('admin.datadiriProfile');
    Route::post('/admin/biodata/save', 'AdminController@dataDiriBiodata')->name('admin.dataDiriBiodata');
    Route::get('/admin/forum', 'AdminController@forum')->name('admin.forum');
    Route::get('/admin/forum/edit/{id}', 'AdminController@forumEdit')->name('admin.forum');
    Route::post('/admin/forum/row', 'AdminController@paginateForum')->name('admin.forum');
    Route::get('/admin/forum/participants/{id}', 'AdminController@forumParticipants')->name('admin.forum');
    Route::get('/admin/forum/Konfirmasi/participants', 'AdminController@forumParticipantsConfirm')->name('admin.forum');
    Route::Post('/admin/forum/participants/confirm/proses', 'AdminController@forumConfirmParticipantsProcess')->name('admin.forum');
    Route::post('/admin/forum/participants/row/{id}', 'AdminController@forumParticipantsRow')->name('admin.forum');
    Route::post('/admin/forum/participants/Confirm/row', 'AdminController@forumConfirmParticipantsRow')->name('admin.forum');
    Route::post('/admin/forum/participants/out', 'AdminController@forumParticipantsOut')->name('admin.forum');
    Route::get('/admin/forum/new', 'AdminController@forumNew')->name('admin.forum');
    Route::post('/admin/forum/new/store', 'AdminController@forumNewStore')->name('admin.forum');
    Route::post('/admin/forum/edit/store', 'AdminController@forumEditStore')->name('admin.forum');
    Route::get('/admin/forum/delete/{id}', 'AdminController@forumDelete')->name('admin.forum');
    Route::get('/admin/forum/{id}/messages', 'AdminController@forumMessages')->name('admin.forum');
    Route::get('/admin/forum/messages/{id}/{read}', 'AdminController@forumMessagesRow')->name('admin.forum');
    Route::post('/admin/forum/messages/send', 'AdminController@forumMessagesSend')->name('admin.forum');
    Route::post('/admin/forum/messages/delete/{id}', 'AdminController@forumMessagesDelete')->name('admin.forum');
    Route::get('/admin/aspirasi', 'AdminController@aspirasi')->name('admin.aspirasi');
    Route::get('/admin/paginate/{status}/aspirasi', 'AdminController@paginateAspirasi')->name('admin.paginateAspirasi');
    Route::get('/admin/aspirasi/menunggu', 'AdminController@aspirasiMenunggu')->name('admin.aspirasiMenunggu');
    Route::get('/admin/aspirasi/blokir', 'AdminController@aspirasiBlokir')->name('admin.aspirasiBlokir');
    Route::get('/admin/aspirasi/{id}/konfirmasi/{confirm}', 'AdminController@aspirasiKonfirmasi')->name('admin.aspirasiKonfirmasi');
    Route::get('/admin/informasi', 'AdminController@informasi')->name('admin.informasi');
    Route::post('/admin/informasi/row', 'AdminController@rowInformasi')->name('admin.rowInformasi');
    Route::get('/admin/informasi/edit/{id}', 'AdminController@informasiEdit')->name('admin.informasiEdit');
    Route::POST('/admin/informasi/Edit/Save', 'AdminController@informasiEditSave')->name('admin.informasiEditSave');
    Route::post('/admin/informasi/hapus', 'AdminController@deleteInformasi')->name('admin.informasiHapus');
    Route::get('/admin/informasi/baru', 'AdminController@informasiBaru')->name('admin.informasiBaru');
    Route::post('/admin/informasi/New', 'AdminController@informasiBaruAdd')->name('admin.informasiBaru');
    Route::get('/admin/galeri', 'AdminController@galeri')->name('admin.galeri');
    Route::post('/admin/galeri/addAlbum', 'AdminController@addAlbum')->name('admin.addAlbum');
    Route::post('/admin/galeri/editAlbum', 'AdminController@editAlbum')->name('admin.addAlbum');
    Route::post('/admin/galeri/deleteAlbum', 'AdminController@deleteAlbum')->name('admin.addAlbum');
    Route::get('/admin/galeri/contents/{id}', 'AdminController@galeriContents')->name('admin.galeriContents');
    Route::get('/admin/galeri/pictures/{id}', 'AdminController@galeriPicture')->name('admin.galeriPicture');
    Route::get('/admin/galeri/videos/{id}', 'AdminController@galeriVideo')->name('admin.galeriVideo');
    Route::post('/admin/galeri/addNew/videos', 'AdminController@galeriAddVideo')->name('admin.addNewVideo');
    Route::post('/admin/galeri/addNew/pictures', 'AdminController@galeriAddPicture')->name('admin.addNewPictures');
    Route::post('/admin/galeri/delete/pictures', 'AdminController@galeriDeletePicture')->name('admin.DeletePictures');
    Route::post('/admin/galeri/delete/video', 'AdminController@galeriDeleteVideo')->name('admin.DeleteVideo');
    Route::post('/admin/takeByID', 'AdminController@TakeDataID')->name('admin.take');
    Route::get('/admin/Data', 'AdminController@dataWeb')->name('admin.data');
    Route::get('/admin/Data/{type}', 'AdminController@dataWebType')->name('admin.dataType');
    Route::get('/admin/Data/{type}/edit/{id}', 'AdminController@dataWebTypeEdit')->name('admin.dataTypeEdit');
    Route::post('/admin/Data/{type}/edit/{id}/save', 'AdminController@dataWebTypeEditSave')->name('admin.dataTypeEdit');
    Route::post('/uploadFile', 'AdminController@uploadFile')->name('admin.uploadFile');
    Route::post('/deleteFile', 'AdminController@deleteFile')->name('admin.deleteFile');
    Route::post('/category/New', 'AdminController@newCategory')->name('admin.addCategory');

    // Auth Google
    Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
    Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

    // Aspirasi
    Route::get('/aspirasi', 'AspirasiController@index')->name('aspirasi');
    Route::get('/aspirasi/cari', 'AspirasiController@search')->name('aspirasi.search');
    Route::get('/aspirasi/tanggapan/{id}', 'AspirasiController@showReplay')->name('aspirasi.Replay');
    Route::post('/aspirasi/kirim', 'AspirasiController@addAspiration')->name('aspirasi.addAspiration');
    Route::post('/aspirasi/tanggapan/kirim', 'AspirasiController@addReplay')->name('aspirasi.addReplay');

    // Galeri
    Route::get('/galeri', 'GaleriController@index')->name('galeri');
    Route::get('/galeri/take/{id}', 'GaleriController@showAlbum')->name('galeri.showAlbum');

    // Iformasi
    Route::get('/informasi', 'InformasiController@index')->name('informasi');
    Route::get('/informasi/baca/{id}', 'InformasiController@read')->name('informasi.read');
    Route::get('/informasi/cari', 'InformasiController@search')->name('informasi.search');
    Route::get('/informasi/category/{id}', 'InformasiController@category')->name('informasi.category');

    // File Manager
    Route::get('/Files', 'FileManagerController@index')->name('file');
    Route::get('/Files/video', 'FileManagerController@video')->name('file.video');
    Route::get('/Files/picture', 'FileManagerController@picture')->name('file.picture');
    Route::post('/Files/picture/store', 'FileManagerController@pictureStore')->name('file.pictureStore');
    Route::post('/Files/video/store', 'FileManagerController@videoStore')->name('file.videoStore');
    Route::post('/Files/pictures/delete', 'FileManagerController@pictureDelete')->name('file.pictureDelete');
    Route::post('/Files/videos/delete', 'FileManagerController@videoDelete')->name('file.videoDelete');
