<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TugasAkhirController;
use App\Http\Controllers\UserController;
use App\Models\TugasAkhir;
use App\Models\User;
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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('beranda');
    });

    Route::get('/search', function () {
        $data = TugasAkhir::latest()->filter();

        if (request('filter') && request('filter') != 'all') {
            $data->whereHas('user', function ($query) {
                $query->where('jurusan', request('filter'));
            });
        }

        $tugasAkhir = $data->paginate(10);

        return view('search', compact('tugasAkhir'));
    });

    Route::get('/profile', function () {
        return view('profile');
    });
    Route::post('/profile/change-password', function () {
        request()->validate([
            'password' => 'required|confirmed',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $user->update([
            'password' => bcrypt(request('password')),
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah');
    });

    //admin
    Route::resource('/arsip', TugasAkhirController::class);
    Route::resource('/users', UserController::class)->except('show');
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'handleLogin']);
});
