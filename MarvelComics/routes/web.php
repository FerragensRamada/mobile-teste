<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;


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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/', function () {

  return view('searchcomics');
});


Route::get('/', function () {
    $user = Auth::user();

    if ($user) {
      return view('searchcomics');
    } else {
      Route::redirect('/dashboard');
    }
});


Route::get('/searchtitle', function (Request $request) {
  $apikey = include '../publickey.php';
  $now = time();
  $privateKey = include '../privatekey.php';
  $hash = md5($now . $privateKey . $apikey);
  $title = $request->input('title');

  $response = Http::get('https://gateway.marvel.com:443/v1/public/comics?ts=' . $now . '&apikey=' . $apikey . '&hash=' . $hash . '&title=' . $title );
  $res = json_decode($response);
  $results = $res->data->results;

  return view('comics', ["comics" => $results]);
});

Route::get('/searchid', function (Request $request) {
  $apikey = include '../publickey.php';
  $now = time();
  $privateKey = include '../privatekey.php';
  $hash = md5($now . $privateKey . $apikey);
  $id = $request->input('id');

  $response = Http::get('https://gateway.marvel.com:443/v1/public/comics/' . $id . '?ts=' . $now . '&apikey=' . $apikey . '&hash=' . $hash );
  $res = json_decode($response);
  $results = $res->data->results;

  return view('comics', ["comics" => $results]);
});


Route::get('/addcomic', function (Request $request) {

  Comic::firstOrCreate('comics')->insert([
    'comicid' => $request->input('id'),
    'title' => $request->input('title'),
    'description' => $request->input('description'),
    'ean' => $request->input('ean'),
    'price' => $request->input('price')
]);

  Route::redirect('/');
});

Route::get('/deletecomic', function (Request $request) {

  Flight::where('comicid', $request->input('delete'))->delete();

  Route::redirect('/');
});

Route::post('/mobilelogin', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $response = Http::post('/comicslist');

    return $response;
});
