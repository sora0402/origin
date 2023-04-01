<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [UserController::class, 'index'])->name('index') ;
Route::get('/ice_break', [UserController::class, 'ice_break'])->name('ice_break') ;
Route::post('/create_diary', [UserController::class, 'create_diary'])->name('create_diary') ;
Route::post('/top', [UserController::class, 'top']);
Route::get('/top', [UserController::class, 'top'])->name('top') ;
Route::get('/write', [UserController::class, 'write'])->name('write');
Route::post('/diary_write', [UserController::class, 'diary_write'])->name('diary_write')->middleware('throttle:3, 1') ;
Route::get('/read', [UserController::class, 'read'])->name('read') ;
Route::post('/read', [UserController::class, 'read'])->name('read') ;
Route::get('/read_job', [UserController::class, 'read_job'])->name('read_job') ;
Route::post('/read_job', [UserController::class, 'read_job'])->name('read_job') ;
Route::get('/detail', [UserController::class, 'detail']);
Route::post('/detail', [UserController::class, 'detail'])->name('detail') ;
Route::get('/config', [UserController::class, 'config'])->name('config') ;
Route::post('/config', [UserController::class, 'config'])->name('config') ;
Route::post('/user_edit', [UserController::class, 'user_edit'])->name('user_edit') ;
Route::get('/explanation', [UserController::class, 'explanation'])->name('explanation') ;
Route::get('/contact', [UserController::class, 'contact'])->name('contact') ;
Route::post('/contact_confirm', [UserController::class, 'contact_confirm'])->name('contact_confirm') ;
Route::post('/compleat', [UserController::class, 'compleat'])->name('compleat')->middleware('throttle:3, 1');;
Route::get('/admin_report', [UserController::class, 'admin_report'])->name('admin_report') ;
Route::get('/admin_authority', [UserController::class, 'admin_authority'])->name('admin_authority') ;
Route::get('/admin_contact', [UserController::class, 'admin_contact'])->name('admin_contact') ;
Route::post('good_job', [AjaxController::class, 'good_job']);
Route::post('report', [AjaxController::class, 'report']);
Route::post('role', [AjaxController::class, 'role']);
Route::post('share_mode', [AjaxController::class, 'share_mode']);