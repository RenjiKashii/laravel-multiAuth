<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/admin', function () {
    return Inertia::render('Admin/Welcome', [
        'canLogin' => Route::has('admin.login'),
        'canRegister' => Route::has('admin.register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::group(['middleware'=>['auth']], function() {
//     Route::get('/admin/dashboard', function () {
//         return Inertia::render('Admin/Dashboard');
//     });
// });

Route::get('/admin/dashboard', function () {
    return Inertia::render('Admin/Dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('admin/roles', App\Http\Controllers\Admin\RoleController::class)
                ->names([
                    'index' => 'admin.roles.index',
                    'create' => 'admin.roles.create',
                    'edit' => 'admin.roles.edit',
                    'update' => 'admin.roles.update',
                    'destroy' => 'admin.roles.destroy',
                    'store' => 'admin.roles.store',
                ]);
