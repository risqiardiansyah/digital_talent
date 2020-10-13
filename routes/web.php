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

//route view tambah segitiga
Route::get('/segitiga', function () {
	$data = array(
		'alas'=>0,
		'tinggi'=>0,
		'hasil'=>0,
		'created_at'=>00-00-0000
	);
    return view('segitiga', $data);
});

//route view tambah persegi
Route::get('/persegi', function () {
    return view('persegi');
});

// ROute view tambah lingkaran
Route::get('/lingkaran', function () {
    return view('lingkaran');
});

Route::get('/', 'SegitigaController@index'); //route index atau halaman home
Route::post('/hitung_segitiga', 'SegitigaController@tambah'); //route hitung segitiga
Route::get('/segitiga/edit/{id}', 'SegitigaController@edit'); //route edit segitiga
Route::post('/segitiga/proses_edit', 'SegitigaController@proses_edit'); //route hitung lingakaran
Route::get('/segitiga/hapus/{id}', 'SegitigaController@hapus'); //route hitung lingakaran

Route::post('/hitung_persegi', 'PersegiController@tambah'); //route hitung persegi
Route::post('/persegi/edit/{id}', 'PersegiController@edit'); //route hitung persegi
Route::get('/persegi/edit/{id}', 'PersegiController@edit'); //route edit Persegi
Route::post('/persegi/proses_edit', 'PersegiController@proses_edit'); //route hitung lingakaran
Route::get('/persegi/hapus/{id}', 'PersegiController@hapus'); //route hitung lingakaran

Route::post('/hitung_lingkaran', 'LingkaranController@tambah'); //route hitung lingakaran
Route::get('/lingkaran/edit/{id}', 'LingkaranController@edit'); //route hitung lingakaran
Route::post('/lingkaran/proses_edit', 'LingkaranController@proses_edit'); //route hitung lingakaran
Route::get('/lingkaran/hapus/{id}', 'LingkaranController@hapus'); //route hitung lingakaran

Route::get('/csv_lingkaran', 'LingkaranController@export_csv'); //route export csv lingakaran segitiga
Route::get('/csv_persegi', 'PersegiController@export_csv'); //route export csv persegi
Route::get('/csv_segitiga', 'SegitigaController@export_csv'); //route export csv segitiga