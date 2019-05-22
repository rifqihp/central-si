<?php

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

Route::middleware(['auth'])->group( function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin/home', 'HomeController@index')->name('admin.home');
    Route::get('/admin/dashboard', 'DashboardController@index')->name('admin.dashboard');

    /** Routing Pengelolaan Dosen */
    Route::post('/admin/dosen/cari', 'DosenCariController@show')->name('admin.dosencari.show'); //routing pencarian dosen
    Route::get('/admin/dosen/cari', 'DosenController@index')->name('admin.dosencari.index'); //routing pencarian dosen

    Route::get('/admin/dosen', 'DosenController@index')->name('admin.dosen.index');  //routing lihat daftar dosen
    Route::post('/admin/dosen', 'DosenController@store')->name('admin.dosen.store'); //routing simpan data dosen baru
    Route::get('/admin/dosen/create', 'DosenController@create')->name('admin.dosen.create'); //routing tampilkan form data dosen baru
    Route::delete('/admin/dosen/{dosen}', 'DosenController@destroy')->name('admin.dosen.destroy'); //routing hapus data dosen baru
    Route::patch('/admin/dosen/{dosen}', 'DosenController@update')->name('admin.dosen.update'); //routing simpan perubahan data dosen
    Route::get('/admin/dosen/{dosen}', 'DosenController@show')->name('admin.dosen.show'); //routing tampilkan detail dosen
    Route::get('/admin/dosen/{dosen}/edit', 'DosenController@edit')->name('admin.dosen.edit');  //routing tampilkan form edit dosen


    /** Routing Pengelolaan Mahasiswa */
    Route::post('/admin/mahasiswa/cari', 'MahasiswaCariController@show')->name('admin.mahasiswacari.show'); //routing pencarian mahasiswa
    Route::get('/admin/mahasiswa/cari', 'MahasiswaController@index')->name('admin.mahasiswacari.index'); //routing pencarian mahasiswa
    Route::get('/admin/mahasiswa', 'MahasiswaController@index')->name('admin.mahasiswa.index');  //routing lihat daftar mahasiswa
    Route::post('/admin/mahasiswa', 'MahasiswaController@store')->name('admin.mahasiswa.store'); //routing simpan data mahasiswa baru
    Route::get('/admin/mahasiswa/create', 'MahasiswaController@create')->name('admin.mahasiswa.create'); //routing tampilkan form data mahasiswa baru
    Route::delete('/admin/mahasiswa/{mahasiswa}', 'MahasiswaController@destroy')->name('admin.mahasiswa.destroy'); //routing hapus data mahasiswa baru
    Route::patch('/admin/mahasiswa/{mahasiswa}', 'MahasiswaController@update')->name('admin.mahasiswa.update'); //routing simpan perubahan data mahasiswa
    Route::get('/admin/mahasiswa/{mahasiswa}', 'MahasiswaController@show')->name('admin.mahasiswa.show'); //routing tampilkan detail mahasiswa
    Route::get('/admin/mahasiswa/{mahasiswa}/edit', 'MahasiswaController@edit')->name('admin.mahasiswa.edit');  //routing tampilkan form edit mahasiswa

    /** Routing untuk tugas mulai dari sini */

     /** Routing untuk tendik */
    
    Route::post('/admin/tendik/cari', 'TendikCariController@show')->name('admin.tendikcari.show'); //routing pencarian tendik
    Route::get('/admin/tendik/cari', 'TendikController@index')->name('admin.tendikcari.index'); //routing pencarian tendik
    Route::get('/admin/tendik', 'TendikController@index')->name('admin.tendik.index');  //routing lihat daftar tendik
    Route::post('/admin/tendik', 'TendikController@store')->name('admin.tendik.store'); //routing simpan data tendik baru
    Route::get('/admin/tendik/create', 'TendikController@create')->name('admin.tendik.create'); //routing tampilkan form data tendik baru
    Route::delete('/admin/tendik/{tendik}', 'TendikController@destroy')->name('admin.tendik.destroy'); //routing hapus data tendik baru
    Route::patch('/admin/tendik/{tendik}', 'TendikController@update')->name('admin.tendik.update'); //routing simpan perubahan data tendik
    Route::get('/admin/tendik/{tendik}', 'TendikController@show')->name('admin.tendik.show'); //routing tampilkan detail tendik
    Route::get('/admin/tendik/{tendik}/edit', 'TendikController@edit')->name('admin.tendik.edit');  //routing tampilkan form edit tendik



    Route::get('pembimbing/submit', 'PembimbingSubmissionController@create')->name('admin.pembimbing.create');
    Route::post('pembimbing/submit', 'PembimbingSubmissionController@store')->name('admin.pembimbing.store');

    // Routing pengelolaan tendik
    Route::post('/admin/tendik/cari', 'TendikCariController@show')->name('admin.tendikcari.show'); //routing pencarian tendik
    Route::get('/admin/tendik/cari', 'TendikController@index')->name('admin.tendikcari.index'); //routing pencarian mahasiswa
    Route::get('/admin/tendik', 'TendikController@index')->name('admin.tendik.index');  //routing lihat daftar tendik
    Route::post('/admin/tendik', 'TendikController@store')->name('admin.tendik.store'); //routing simpan data tendik baru
    Route::get('/admin/tendik/create', 'TendikController@create')->name('admin.tendik.create'); //routing tampilkan form data tendik baru
    Route::delete('/admin/tendik/{tendik}', 'TendikController@destroy')->name('admin.tendik.destroy'); //routing hapus data tendik baru
    Route::patch('/admin/tendik/{tendik}', 'TendikController@update')->name('admin.tendik.update'); //routing simpan perubahan data tendik
    Route::get('/admin/tendik/{tendik}', 'TendikController@show')->name('admin.tendik.show'); //routing tampilkan detail tendik
    Route::get('/admin/tendik/{tendik}/edit', 'TendikController@edit')->name('admin.tendik.edit');  //routing tampilkan form edit tendik



});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
    //Laravel Permission spatie/permissions
    Route::resource('permissions', 'Backend\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Backend\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Backend\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Backend\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Backend\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Backend\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
});

