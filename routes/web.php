<?php

use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
Route::get('/homepage', function () {
    return view('homepage');
})->middleware('auth', 'verified', 'role:maba')-> name('homepage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# ADMIN
## DATA USER

# MELIHAT DATA USER
Route::get('lihat-user', [UserController::class, 'show'])->middleware('auth', 'verified', 'role:admin')->name('lihat-user');

# MENAMBAH DATA USER
Route::get('tambah-user', function () {
    return view('addUser');
})->middleware('auth', 'verified', 'role:admin')->name('tambah-user');
Route::post('menambah-user', [UserController::class, 'store'])->middleware('auth', 'verified', 'role:admin')->name('menambah-user');

# MENGUBAH DATA USER
Route::get('edit-user/{id}', function ($id) {
    return view('editUser', ['user' => User::findOrFail($id)]);
})->middleware('auth', 'verified', 'role:admin')->name('edit-user');

Route::put('update-user/{id}', [UserController::class, 'update']) 
->middleware('auth', 'verified', 'role:admin')->name('update-user');

# MENGHAPUS DATA USER
Route::delete('hapus-user/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->back()->with('success', 'User berhasil dihapus');
})->middleware('auth', 'verified', 'role:admin')->name('hapus-user');


## PENDAFTARAN

# MELIHAT DATA PENDAFTARAN
Route::get('lihat-daftar', [PendaftaranController::class, 'showAll'])->middleware('auth', 'verified', 'role:admin')->name('lihat-daftar');

# MENGUBAH DATA PENDAFTARAN
Route::get('edit-daftar/{id}', function ($id) {
    return view('editDaftar', ['daftar' => Pendaftaran::findOrFail($id)]);
})->middleware('auth', 'verified', 'role:admin')->name('edit-daftar');

Route::get('/get-kabupaten', [PendaftaranController::class, 'getKabupaten'])->name('get.kabupaten');
Route::get('/get-kecamatan', [PendaftaranController::class, 'getKecamatan'])->name('get.kecamatan');

Route::put('update-daftar/{id}', [PendaftaranController::class, 'update']) 
->middleware('auth', 'verified', 'role:admin')->name('update-daftar');

# MENGHAPUS DATA PENDAFTARAN
Route::delete('hapus-daftar/{id}', function($id) {
        $record = Pendaftaran::findOrFail($id);
        $record->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
})->middleware('auth', 'verified', 'role:admin')->name('hapus-daftar');



# MABA
# PENDAFTARAN
Route::get('pendaftaran', [PendaftaranController::class, 'show'])->middleware('auth', 'verified', 'role:maba')->name('pendaftaran');


Route::get('/get-kabupatens', [PendaftaranController::class, 'getKabupatens'])->name('get.kabupatens');
Route::get('/get-kecamatans', [PendaftaranController::class, 'getKecamatans'])->name('get.kecamatans');


Route::post('mendaftar', [PendaftaranController::class, 'store'])->middleware('auth', 'verified', 'role:maba')->name('mendaftar');

require __DIR__.'/auth.php';
