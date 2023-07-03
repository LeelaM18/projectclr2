<?php

use App\Http\Controllers\codeclr\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\codeclr\PostController;
use App\Http\Controllers\UsController;


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
    return redirect()->route('post.index');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('post',PostController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/post', [PostController::class, 'index'])->name('post.index');
// its a form the collect the data
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
// save the data from the form to database
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
// show one item from database
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('post.show');
// edit one item from database
Route::any('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
// update one item from database
Route::any('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
// delete the item from database
Route::get('/post/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from Manohar',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('d3@voilacode.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});

Route::get('/profile', [ProfileController::class, 'index'])->name('user.index');
Route::get('/profile/show/{id}', [ProfileController::class, 'show'])->name('user.show');
Route::get('/profile/edit/{id}', [profileController::class, 'edit'])->name('user.edit');
Route::get('/profile/destory/{id}', [Controller::class, 'update'])->name('user.destory');

