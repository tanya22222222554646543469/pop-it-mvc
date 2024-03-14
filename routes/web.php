<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/disciplines', [Controller\Site::class, 'disciplines']);
Route::add('GET', '/disciplines_attendance', [Controller\Site::class, 'disciplines_attendance']);
Route::add('GET', '/groups', [Controller\Site::class, 'groups']);
Route::add('GET', '/group_students', [Controller\Site::class, 'group_students']);
Route::add('GET', '/menu', [Controller\Site::class, 'menu']);
Route::add(['GET', 'POST'], '/create_user', [Controller\Site::class, 'create_user']);
Route::add('GET', '/all_user', [Controller\Site::class, 'all_user']);
Route::add(['GET', 'POST'],'/add_disciplines', [Controller\Site::class, 'add_disciplines']);
Route::add(['GET', 'POST'],'/add_group', [Controller\Site::class, 'add_group']);
Route::add(['GET', 'POST'],'/add_student', [Controller\Site::class, 'add_student']);