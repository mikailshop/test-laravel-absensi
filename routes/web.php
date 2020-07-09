<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Role;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('home',                     [ 'as'=>'home',                  'uses' => 'HomeController@index']);
    Route::post('absen',                   [ 'as'=>'absen',                 'uses' => 'HomeController@absen']);

    Route::get('useronline',               [ 'as'=>'useronline',            'uses' => 'HomeController@useronline']);
    
    //Route::get('absen',                    [ 'as'=>'absen',                 'uses' => 'AbsenController@index']);
    Route::post('absen/absenharian',       [ 'as'=>'absenharian',           'uses' => 'AbsenController@absenharian']);

    Route::get('kantin',                   [ 'as'=>'kantin',                'uses' => 'KantinController@store' ]);
    Route::get('/import_excel',          'ImportExcelController@index');
    Route::post('/import_excel/import',  'ImportExcelController@import');

    Route::get('user',                     [ 'as'=>'user',                  'uses' => 'UserController@index']);
    Route::get('user/create',              [ 'as'=>'user.create',           'uses' => 'UserController@create']);
    Route::get('user/exportxls/',          [ 'as'=>'user.exportxls',        'uses' => 'UserController@exportXls']);
    Route::get('user/exportpdf/',          [ 'as'=>'user.exportpdf',        'uses' => 'UserController@exportPdf']);
    Route::post('user/importxls',          [ 'as'=>'user.importxls',        'uses' => 'UserController@importXls']);
    Route::post('user/importpdf',          [ 'as'=>'user.importpdf',        'uses' => 'UserController@importPdf']);
    Route::post('user/store',              [ 'as'=>'user.store',            'uses' => 'UserController@store']);
    Route::get('user/view/{id}',           [ 'as'=>'user.view',             'uses' => 'UserController@view']);
    Route::get('user/edit/{id}',           [ 'as'=>'user.edit',             'uses' => 'UserController@edit']);
    Route::post('user/update/{id}',        [ 'as'=>'user.update',           'uses' => 'UserController@update']);
    Route::get('user/delete/{id}',         [ 'as'=>'user.delete',           'uses' => 'UserController@delete']);
    Route::get('user/search',              [ 'as'=>'user.search',           'uses' => 'UserController@search']);
    Route::get('user/{id}/profile',        [ 'as'=>'user.profile',          'uses' => 'UserController@profile']);

    Route::get('biodata',                  [ 'as'=>'biodata',               'uses' => 'BiodataController@index']);
    Route::get('biodata/create',           [ 'as'=>'biodata.create',        'uses' => 'BiodataController@create']);
    Route::post('biodata/store',           [ 'as'=>'biodata.store',         'uses' => 'BiodataController@store']);
    Route::get('biodata/edit/{id}',        [ 'as'=>'biodata.edit',          'uses' => 'BiodataController@edit']);
    Route::post('biodata/update/{id}',     [ 'as'=>'biodata.update',        'uses' => 'BiodataController@update']);
    Route::get('biodata/delete/{id}',      [ 'as'=>'biodata.delete',        'uses' => 'BiodataController@delete']);

    Route::get('pasangan',                 [ 'as'=>'pasangan',              'uses' => 'PasanganController@index']);
    Route::get('pasangan/create',          [ 'as'=>'pasangan.create',       'uses' => 'PasanganController@create']);
    Route::post('pasangan/store',          [ 'as'=>'pasangan.store',        'uses' => 'PasanganController@store']);
    Route::get('pasangan/edit/{id}',       [ 'as'=>'pasangan.edit',         'uses' => 'PasanganController@edit']);
    Route::post('pasangan/update/{id}',    [ 'as'=>'pasangan.update',       'uses' => 'PasanganController@update']);
    Route::get('pasangan/delete/{id}',     [ 'as'=>'pasangan.delete',       'uses' => 'PasanganController@delete']);

    Route::get('anak',                     [ 'as'=>'anak',                  'uses' => 'AnakController@index']);
    Route::get('anak/create',              [ 'as'=>'anak.create',           'uses' => 'AnakController@create']);
    Route::post('anak/store',              [ 'as'=>'anak.store',            'uses' => 'AnakController@store']);
    Route::get('anak/edit/{id}',           [ 'as'=>'anak.edit',             'uses' => 'AnakController@edit']);
    Route::post('anak/update/{id}',        [ 'as'=>'anak.update',           'uses' => 'AnakController@update']);
    Route::get('anak/delete/{id}',         [ 'as'=>'anak.delete',           'uses' => 'AnakController@delete']);

    Route::get('orangtua',                 [ 'as'=>'orangtua',              'uses' => 'OrangtuaController@index']);
    Route::get('orangtua/create',          [ 'as'=>'orangtua.create',       'uses' => 'OrangtuaController@create']);
    Route::post('orangtua/store',          [ 'as'=>'orangtua.store',        'uses' => 'OrangtuaController@store']);
    Route::get('orangtua/edit/{id}',       [ 'as'=>'orangtua.edit',         'uses' => 'OrangtuaController@edit']);
    Route::post('orangtua/update/{id}',    [ 'as'=>'orangtua.update',       'uses' => 'OrangtuaController@update']);
    Route::get('orangtua/delete/{id}',     [ 'as'=>'orangtua.delete',       'uses' => 'OrangtuaController@delete']);

    Route::get('jabatan',                  [ 'as'=>'jabatan',               'uses' => 'JabatanController@index']);
    Route::get('jabatan/create',           [ 'as'=>'jabatan.create',        'uses' => 'JabatanController@create']);
    Route::post('jabatan/store',           [ 'as'=>'jabatan.store',         'uses' => 'JabatanController@store']);
    Route::get('jabatan/edit/{id}',        [ 'as'=>'jabatan.edit',          'uses' => 'JabatanController@edit']);
    Route::post('jabatan/update/{id}',     [ 'as'=>'jabatan.update',        'uses' => 'JabatanController@update']);
    Route::get('jabatan/delete/{id}',      [ 'as'=>'jabatan.delete',        'uses' => 'JabatanController@delete']);

    Route::get('department',               [ 'as'=>'department',            'uses' => 'DepartmentController@index']);
    Route::get('department/create',        [ 'as'=>'department.create',     'uses' => 'DepartmentController@create']);
    Route::post('department/store',        [ 'as'=>'department.store',      'uses' => 'DepartmentController@store']);
    Route::get('department/edit/{id}',     [ 'as'=>'department.edit',       'uses' => 'DepartmentController@edit']);
    Route::post('department/update/{id}',  [ 'as'=>'department.update',     'uses' => 'DepartmentController@update']);
    Route::get('department/delete/{id}',   [ 'as'=>'department.delete',     'uses' => 'DepartmentController@delete']);

    Route::get('gaji',                     [ 'as'=>'gaji',                  'uses' => 'GajiController@index']);
    Route::get('gaji/create',              [ 'as'=>'gaji.create',           'uses' => 'GajiController@create']);
    Route::post('gaji/store',              [ 'as'=>'gaji.store',            'uses' => 'GajiController@store']);
    Route::get('gaji/edit/{id}',           [ 'as'=>'gaji.edit',             'uses' => 'GajiController@edit']);
    Route::post('gaji/update/{id}',        [ 'as'=>'gaji.update',           'uses' => 'GajiController@update']);
    Route::get('gaji/delete/{id}',         [ 'as'=>'gaji.delete',           'uses' => 'GajiController@delete']);

    Route::get('shift',                    [ 'as'=>'shift',                 'uses' => 'ShiftController@index']);
    Route::get('shift/create',             [ 'as'=>'shift.create',          'uses' => 'ShiftController@create']);
    Route::post('shift/store',             [ 'as'=>'shift.store',           'uses' => 'ShiftController@store']);
    Route::get('shift/edit/{id}',          [ 'as'=>'shift.edit',            'uses' => 'ShiftController@edit']);
    Route::post('shift/update/{id}',       [ 'as'=>'shift.update',          'uses' => 'ShiftController@update']);
    Route::get('shift/delete/{id}',        [ 'as'=>'shift.delete',          'uses' => 'ShiftController@delete']);

    Route::get('cuti',                     [ 'as'=>'cuti',                  'uses' => 'CutiController@index']);
    Route::get('cuti/create',              [ 'as'=>'cuti.create',           'uses' => 'CutiController@create']);
    Route::post('cuti/store',              [ 'as'=>'cuti.store',            'uses' => 'CutiController@store']);
    Route::get('cuti/search',              [ 'as'=>'cuti.search',           'uses' => 'CutiController@search']);
    Route::post('cuti/approve/{id}',       [ 'as'=>'cuti.approve',          'uses' => 'CutiController@approve']);
    Route::post('cuti/paid/{id}',          [ 'as'=>'cuti.paid',             'uses' => 'CutiController@paid']);

    Route::get('total-cuti',               [ 'as'=>'total-cuti',            'uses' => 'TotalCutiController@index']);
    Route::get('total-cuti/create',        [ 'as'=>'total-cuti.create',     'uses' => 'TotalCutiController@create']);
    Route::post('total-cuti/store',        [ 'as'=>'total-cuti.store',      'uses' => 'TotalCutiController@store']);
    Route::get('total-cuti/edit/{id}',     [ 'as'=>'total-cuti.edit',       'uses' => 'TotalCutiController@edit']);
    Route::post('total-cuti/update/{id}',  [ 'as'=>'total-cuti.update',     'uses' => 'TotalCutiController@update']);
    Route::get('total-cuti/delete/{id}',   [ 'as'=>'total-cuti.delete',     'uses' => 'TotalCutiController@delete']);

    Route::get('aturgaji',                 [ 'as'=>'aturgaji',              'uses' => 'AturgajiController@index']);
    Route::get('aturgaji/detail/{id}',     [ 'as'=>'aturgaji.detail',       'uses' => 'AturgajiController@detail']);
    Route::post('aturgaji/store',          [ 'as'=>'aturgaji.store',        'uses' => 'AturgajiController@store']);
    Route::get('aturgaji/salarylist',      [ 'as'=>'aturgaji.salarylist',   'uses' => 'AturgajiController@salarylist']);
    Route::get('aturgaji/makepayment',     [ 'as'=>'aturgaji.makepayment',  'uses' => 'AturgajiController@makepayment']);
    Route::post('aturgaji/make-advance',   [ 'as'=>'aturgaji.makeadvance',  'uses' => 'AturgajiController@makeAdvance']);
});