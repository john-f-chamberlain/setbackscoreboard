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

Route::get("display", "Setback@show_score")->name("display");
Route::get("/", "Setback@show_form");
Route::post("/submit_form", "Setback@proc_form")->name("proc");
Route::get("admin", "Setback@show_admin")->name("admin");

Route::post("admin/add_player", "Setback@add_player")->name("add_player");
Route::get("admin/toggle_player/{player}", "Setback@toggle_player")->name("toggle_player");
