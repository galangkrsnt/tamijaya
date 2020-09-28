<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});





Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('cekrole');
Route::get('/bus', 'PageController@bus')->name('bus');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contact')->name('contact');


//admin route

Route::get('/admin/penumpang', 'PenumpangController@index')->name('admin.penumpang')->middleware('cekrole');
Route::get('/admin/jadwal/cari', 'JadwalController@cari')->name('jadwal.cari');
Route::get('/admin/jadwal/hasilCari', 'JadwalController@hasilCari')->name('jadwal.hasilCari');
Route::get('/admin/jadwal/detail/{id}', 'JadwalController@detail')->name('jadwal.detail');
Route::post('/admin/jadwal/sorting', 'JadwalController@sorting')->name('jadwal.sorting');
Route::get('admin/pesanan/kursi/{id}', ['uses'=> 'PesananController@pilihKursi'])->name('pesanan.kursi');
Route::post('/admin/pesanan/sorting', 'PesananController@sorting')->name('pesanan.sorting');
Route::get('admin/penumpang/create/{id}', ['uses'=> 'PenumpangController@create'])->name('penumpang.create');
Route::post('admin/penumpang/store/{id}', ['uses'=> 'PenumpangController@store'])->name('penumpang.store');
Route::post('/admin/penumpang/sorting', 'PenumpangController@sorting')->name('penumpang.sorting');

Route::get('admin/penumpang/{penumpang}/edit', ['uses'=> 'PenumpangController@edit'])->name('penumpang.edit')->middleware('cekrole');
Route::put('admin/penumpang/{penumpang}', ['uses'=> 'PenumpangController@update'])->name('penumpang.update')->middleware('cekrole');
Route::post('admin/penumpang/{id}', ['uses'=> 'PenumpangController@destroy'])->name('penumpang.destroy')->middleware('cekrole');
Route::post('admin/penumpang/', ['uses'=> 'PenumpangController@index'])->name('penumpang.index')->middleware('cekrole');
Route::delete('admin/penumpang/{penumpang}', ['uses'=> 'PenumpangController@destroy'])->name('penumpang.destroy')->middleware('cekrole');
Route::get('admin/pesanan/detail/{id}', ['uses'=> 'PesananController@detail'])->name('pesanan.detail')->middleware('cekrole');

Route::resource('/admin/bus', 'BusController')->middleware('cekrole');
Route::resource('/admin/jadwal', 'JadwalController')->middleware('cekrole');
Route::resource('/admin/pesanan', 'PesananController');

Route::get('admin/pembayaran/{id}', ['uses'=> 'PembayaranController@konfirmasi'])->name('pembayaran.konfirmasi')->middleware('cekrole');


Route::post('customer/pesanan/store/{id}', ['uses'=> 'PesananController@store'])->name('customer.pesanan.store');
Route::get('customer/tiketku/', ['uses'=> 'PesananController@tiketku'])->name('customer.tiketku');
Route::get('customer/tiket/pdf/{id}', ['uses'=> 'PesananController@tiketpdf'])->name('customer.tiketpdf');
Route::get('customer/pembayaran/{pesanan}', ['uses'=> 'PembayaranController@create'])->name('pembayaran.create');
Route::post('customer/pembayaran/store/{id}', ['uses'=> 'PembayaranController@store'])->name('pembayaran.store');


Route::get('/customer/pesanan/autodel', 'PesananController@autoDelete')->name('pesanan.autodel');
Route::get('/tes/{id}', 'PesananController@tes')->name('tes');






