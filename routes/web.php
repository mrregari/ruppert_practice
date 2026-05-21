<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\task4Controller;
use App\Http\Controllers\task6Controller;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\SessionController;

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

// //! 1) Маршруты

// // Задание 1
// Route::get('/test', function(){
//     return '!';
// });

// // Задание 2
// Route::get('dir/test', function(){
//     return '!!';
// });

// // Задание 3
// Route::get('/user/{name}', function($name) {
//     return "Имя юзера: {$name}";
// })->where(['name' => '[A-Za-z]+']);

// // Задание 4
// Route::get('/user/{surname}/{name}', function($surname, $name) {
//     return "Фамилия юзера: {$surname},<br> Имя юзера: {$name}";
// })->where(['surname' => '[A-Za-z]+', 'name' => '[A-Za-z]+']);

// // Задание 5
// Route::get('/city/{city?}', function($city = 'minsk') {
//     return "Город: {$city}";
// })->where(['city' => '[A-Za-z]+']);

// // Задание 6-8
// Route::get('/post/{id}', function($id) {
//     return "Post page {$id},";
// })->where(['id' => '[0-9]+']);

// // Задание 9
// Route::get('/user/{id}/{name}', function($id, $name) {
//     return "Id: {$id}, Name: {$name}";
// })->where(['id' => '[0-9]+', 'name' => '[A-Za-z_-]{3,}']);

// // Задание 10
// Route::get('/posts/{date}', function($date) {
//     return "Дата: {$date}";
// })->where(['date' => '[0-9]{4}-[0-9]{2}-[0-9]{2}']);

// // Задание 11
// Route::get('/{year}/{month}/{day}', function($year, $month, $day) {
//     return "Дата: {$year}-{$month}-{$day}";
// })->where(['year' => '[0-9]{4}', 'month' => '[0-9]{2}', 'day' => '[0-9]{2}']);

// // Задание 12
// Route::get('/users/{order}', function($order) {
//     return "order: {$order}";
// })->where(['order' => 'name|surname|age']);

// // Задание 13
// Route::get('/user/{id}', function($id) {
//     return "id: {$id}";
// })->whereNumber('id');

// // Задание 14
// Route::get('/city/{name}', function($name) {
//     return "City name: {$name}";
// })->whereAlpha('name');

// // Задание 15
// Route::get('/test/{slug}', function($slug) {
//     return "slug: {$slug}";
// });

// // Задание 16
// Route::get('/user/{id}', function($id) {
//     return "id: {$id}";
// })->whereNumber('id');

// // Задание 17
// Route::get('/user/{id}/{name}', function($id, $name) {
//     return "Id: {$id}, Name: {$name}";
// })->where(['id' => '[0-9]+', 'name' => '[a-z]{3,}']);

// // Задание 18
// Route::get('/articles/{date}', function($date) {
//     return "Дата: {$date}";
// })->where(['date' => '[0-9]{4}-[0-9]{2}-[0-9]{2}']);

// // Задание 19
// Route::get('/users/{order}', function($order) {
//     return "order: {$order}";
// })->where(['order' => 'name|surname|age']);

// // Задание 20
// Route::get('/{year}/{month}/{day}', function($year, $month, $day) {
//     $date = "{$year}-{$month}-{$day}";
//     return "День недели: " . date('l', strtotime($date));
// })->where(['year' => '[0-9]{4}', 'month' => '[0-9]{2}', 'day' => '[0-9]{2}']);


// //! 2) Контроллеры

// Route::get('/user', [UserController::class, 'show']);
// Route::get('/user/all', [UserController::class, 'all']);
// Route::get('/user/{name}', [UserController::class, 'name'])->whereAlpha('name');
// Route::get('/user/{surname}/{name}', [UserController::class, 'surnameName'])->whereAlpha('surname')->whereAlpha('name');
// Route::get('/users/{user}', [UserController::class, 'sendIntoTown']);

// Route::get('/pages/show/{id}', [TypeController::class, 'showOne'])->where(['id' => '[0-9]+']);
// Route::get('/pages/all', [TypeController::class, 'showAll']);

// Route::get('/test/sum/{num1}/{num2}', [TestController::class, 'sum'])->where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);


// //! 3) Представления

// Route::get('/post/show', [TestController::class, 'show']);
// Route::get('/post/show2', [TestController::class, 'show2']);
// Route::get('/post/test1', [TestController::class, 'test1']);
// Route::get('/post/test2', [TestController::class, 'test2']);
// Route::get('/post/test3', [TestController::class, 'test3']);


// //! 4) blade

// Route::prefix('task4')->group(function () {
//     Route::get('/one', [task4Controller::class, 'one']);
//     Route::get('/two', [task4Controller::class, 'two']);
//     Route::get('/three', [task4Controller::class, 'three']);
//     Route::get('/four', [task4Controller::class, 'four']);
//     Route::get('/five', [task4Controller::class, 'five']);
//     Route::get('/six', [task4Controller::class, 'six']);
// });


// //! 6) Построитель запросов

// Route::prefix('task6')->group(function () {
//     Route::get('/show', [UserController::class, 'show']);
// });


// //! 7) Модели

// Route::prefix('task7')->group(function () {
//     Route::get('/index', [UserController::class, 'index']);
//     Route::get('/task7', [UserController::class, 'task7']);
//     Route::get('/task8', [UserController::class, 'task8']);
//     Route::get('/task9', [UserController::class, 'task9']);
//     Route::get('/task10', [UserController::class, 'task10']);
//     Route::get('/task11', [UserController::class, 'task11']);
//     Route::get('/task12', [UserController::class, 'task12']);
//     Route::get('/task13', [UserController::class, 'task13']);
//     Route::get('/task14', [UserController::class, 'task14']);
//     Route::get('/task15', [UserController::class, 'task15']);
//     Route::get('/task16', [UserController::class, 'task16']);
//     Route::get('/task17', [UserController::class, 'task17']);
//     Route::get('/task18', [UserController::class, 'task18']);
//     Route::get('/task19', [UserController::class, 'task19']);

//     // Задания для самостоятельной работы
//     Route::get('/product-crud', [UserController::class, 'productCrud']);
//     Route::get('/filtering', [UserController::class, 'filtering']);
//     Route::get('/aggregates', [UserController::class, 'aggregates']);
//     Route::get('/scopes', [UserController::class, 'scopes']);
//     Route::get('/casts', [UserController::class, 'castsAndMutators']);
//     Route::get('/create-order', [UserController::class, 'createOrder']);
// });


// //! 8) Связи в моделях

// Route::prefix('task8')->group(function () {
//     // Задание 1-4
//     Route::get('/show', [UserController::class, 'show']);
//     // Задание 5
//     Route::get('/table', [UserController::class, 'table']);
//     // Задание 6-8
//     Route::get('/tableProfile', [UserController::class, 'tableProfile']);
//     // Задание 9-12
//     Route::get('/task12', [CountryController::class, 'task12']);
//     // Задание 13-20
//     Route::get('/country', [CountryController::class, 'show']);
//     // Задание 21-24
//     Route::get('/task24', [UserController::class, 'task24']);
//     // Задание 25-28
//     Route::get('/belongsToMany', [UserController::class, 'belongsToMany']);
//     // Задание 29
//     Route::get('/task29', [UserController::class, 'task29']);
// });


// //! 9) Формы

// // Задание 2
// Route::get('/form', [FormController::class, 'sumForm']);
// Route::get('/result', [FormController::class, 'sumResult']);

// // Задание 3
// Route::get('/user-form', [FormController::class, 'userForm']);
// Route::post('/result', [FormController::class, 'userResult']);

// // Задание 4
// Route::match(['get', 'post'], '/task4/form', [FormController::class, 'task4Form']);

// // Задание 5
// Route::match(['get', 'post'], '/task5/form', [FormController::class, 'task5Form']);

// // Задание 6
// Route::match(['get', 'post'], '/task6/form', [FormController::class, 'task6Form']);

// // Задание 7
// Route::match(['get', 'post'], '/task7/form', [FormController::class, 'task7Form']);

// // Задание 8
// Route::match(['get', 'post'], '/task8/form/{id}/{login}', [FormController::class, 'task8Form']);

// // Задание 9-12
// Route::get('/test/method', [FormController::class, 'methods']);



// //! 11) Сессии

// Route::prefix('session')->group(function () {
//     // Задание 1
//     Route::get('/object', [SessionController::class, 'getSessionObject']);
//     // Задание 2
//     Route::get('/set-value', [SessionController::class, 'setValue']);
//     Route::get('/get-value', [SessionController::class, 'getValue']);
//     // Задание 3-4
//     Route::get('/counter', [SessionController::class, 'pageCounter']);
//     // Задание 5
//     Route::get('/first-visit', [SessionController::class, 'firstVisitTime']);
//     // Задание 6
//     Route::get('delete-session-var', [SessionController::class, 'deleteVariable']);
//     // Задание 7
//     Route::get('/pull-show', [SessionController::class, 'pullAndShow']);
//     // Задание 8
//     Route::get('/session-all', [SessionController::class, 'showAllSession']);
//     // Задание 9
//     Route::get('/check-time', [SessionController::class, 'checkTime']);
//     // Задания 10-11
//     Route::get('/set-array', [SessionController::class, 'setNumberArray']);
//     Route::get('/add-to-array', [SessionController::class, 'addToArray']);
//     // Задания 12-13
//     Route::get('/session-save', [SessionController::class, 'saveViaGlobalHelper']);
//     Route::get('/session-get', [SessionController::class, 'getViaGlobalHelper']);

//     //? Самостоятельная работа
//     // Задание 1
//     Route::get('/save-username', [SessionController::class, 'saveUsername']);
//     // Задание 2
//     Route::get('/facade-put-get', [SessionController::class, 'facadePutGet']);
//     // Задание 3
//     Route::get('/check-has', [SessionController::class, 'checkHasKey']);
//     // Задание 4
//     Route::get('/forget-demo', [SessionController::class, 'forgetDemo']);
//     // Задание 5
//     Route::get('/flash-form', [SessionController::class, 'showFlashForm']);
//     Route::post('/flash-submit', [SessionController::class, 'submitFlashForm'])->name('flash.submit');
//     Route::get('/flash-result', [SessionController::class, 'showFlashResult']);
//     // Задание 6
//     Route::get('/session-all-data', [SessionController::class, 'getAllSessionData']);
//     // Задание 7
//     Route::get('/flush-session', [SessionController::class, 'flushAll']);
//     // Задание 8
//     Route::get('/push-array', [SessionController::class, 'pushArrayDemo']);
// });


// //! 12) Куки

// Route::prefix('cookie')->group(function () {
//     // Задание 1
//     Route::get('/set', [CookieController::class, 'setCookie']);
//     Route::get('/get', [CookieController::class, 'getCookie']);
//     // Задание 2
//     Route::get('/counter', [CookieController::class, 'counter']);
//     // Задание 3
//     Route::get('/queue', [CookieController::class, 'queueCookies']);

//     //? Самостоятельная работа
//     // Задания 1 и 3 
//     Route::get('/set-username', [CookieController::class, 'setUsernameCookie']);
//     // Задания 2 и 6
//     Route::get('/get-username', [CookieController::class, 'getUsernameCookie']);
//     // Задание 4 
//     Route::get('/queue-helper', [CookieController::class, 'queueCookieWithHelper']);
//     // Задание 5
//     Route::get('/forget', [CookieController::class, 'forgetCookie']);
//     // Задание 7
//     Route::get('/secure', [CookieController::class, 'secureCookie']);
//     // Задание 8
//     Route::get('/array-set', [CookieController::class, 'arrayCookie']);
//     Route::get('/array-get', [CookieController::class, 'readArrayCookie']);
// });