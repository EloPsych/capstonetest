<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;

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
*/

Route::redirect('/', 'login'); //route for default page

Route::get('/dashboard', function () {
    return view('dashboard'); //dashboard route
})->middleware(['auth', 'verified'])->name('dashboard'); //protected by auth prevents user from reaching the view dashboard without logging in.

Route::get('/password/reset', 'PasswordResetController@showResetForm')->name('password.request');

Route::get('/reports', function () {
    return view('reports');
})->middleware(['auth', 'verified'])->name('reports'); //route for reports

Route::get('/contacts', [ContactController::class, 'index'])->middleware(['auth', 'verified'])->name('contacts.index'); //contacts route
Route::get('/contacts/department', [DepartmentController::class, 'department'])->middleware(['auth', 'verified'])->name('contacts.department'); //department route

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create'); //create contact route
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create'); //create department contact route

Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store'); //store contact that was created route
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store'); //store department contact that was created route

Route::get('/contacts/{contacts}/edit', [ContactController::class, 'edit'])->name('contacts.edit'); //edit contact route
Route::get('/departments/{departments}/edit', [DepartmentController::class, 'edit'])->name('departments.edit'); //edit department contact route

Route::put('/contacts/{contacts}/update', [ContactController::class, 'update'])->name('contacts.update'); //replace the existing contact route
Route::put('/departments/{departments}/update', [DepartmentController::class, 'update'])->name('departments.update'); //replace the existing department contact route

Route::delete('/contacts/{contacts}/destroy', [ContactController::class, 'destroy'])->name('contacts.destroy'); //replace the existing contact route
Route::delete('/departments/{departments}/destroy', [DepartmentController::class, 'destroy'])->name('departments.destroy'); //replace the existing department contact route




Route::get('/verifications', function () {
    return view('verifications');
})->middleware(['auth', 'verified'])->name('verifications'); // route for verifications

Route::middleware('auth')->group(function () { //routes for the profile edit
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
