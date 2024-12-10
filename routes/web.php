<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PhotoController;


Route::get('/', [MemberController::class, 'index']);
Route::get('attendance', [MemberController::class, 'create'])->name('attendance.create');
Route::post('attendance', [MemberController::class, 'store'])->name('attendance.register');



Route::get('member-registration', [MemberController::class, 'register'])->name('attendance.new');
Route::post('member-registration', [MemberController::class, 'registerMember'])->name('attendance.store');


Route::post('/attendance/update/{id}', [MemberController::class, 'updateAttendance'])->name('attendance.update');
Route::post('/attendance/register/{id}', [MemberController::class, 'registerMember']);

