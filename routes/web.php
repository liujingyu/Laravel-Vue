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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/abc', function () {

    $query = http_build_query([
        'client_id' => '6',
        'redirect_uri' => 'http://localhost:8000/v',
        'response_type' => 'code',
        'scope' => 'conference'
    ]);

    return redirect('http://localhost:8000/oauth/authorize?'.$query);
});

Route::get('/v', function (Illuminate\Http\Request $request) {
    $http = new \GuzzleHttp\Client;

    $response = $http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'client_id' => '6',
            'client_secret' => 'qkLVnGetG3yozpv9WI5t5VFjRwxN0kwGttjr798S',
            'grant_type' => 'authorization_code',
            'redirect_uri' => 'http://localhost:8000/v',
            'code' => $request->code,
        ],
    ]);
    return json_decode((string) $response->getBody(), true)['access_token'];
});
