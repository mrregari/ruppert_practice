<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\task4Controller;
use App\Http\Controllers\task6Controller;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
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
// //Практика номер 1
// //Задание 1

// Route::get('/test', function(){
//     return "Пощадите меня";
// });

// //Задание 10

// Route::get('/dir/test', function(){
//     return 'Ну пожалуйста!';
// });

// //Задание 11

// Route::get('/user/{name}', function($name){
//     return $name . 'Пощади меня';
// });

// //Задание 100

// Route::get('/user/{surname}/{name}', function($surname,$name){
//     return 'Уважаемый ' . $surname . " " . $name . ' Пощади меня';
// });

// //Задание 101

// Route::get('/city/{city?}', function($city = 'minsk'){
//     return $city . ' А тут бы меня пощадили!';
// });

// //Задание 110

// Route::get('/id/{id}', function($id){
//     return $id . ' уээээээээээээээээээээээээээ';
// })->where('id', '[0-9]+');

// //Задание 1001

// Route::get('/user1s/{id}/{name}', function($id, $name){
//     return $id . ' уээээээээээээээээээээээээээ';
// })->where('id', '[0-9]+')->where('name', '[a-z]{3,}');

// //Задание 1010

// Route::get('/posts/{date}', function($date){
//     return 'Дата моей пощады: ' . $date;
// })->where('date', '\d{4}-\d{2}-\d{2}');

// //Задание 1011

// Route::get('/{year}/{month}/{day}', function($year, $month, $day){
//     return 'Дата моей пощады: ' . $year ." | ". $day ." | ". $month;
// })->where([
//     'year' => '\d{4}',
//     'month' => '\d{2}',
//     'day' => '\d{2}'
// ]);

// //Задание 1100

// Route::get('/user1s/{order}', function($order){
//     return 'Порядок пощады: ' . $order;
// })->where('order', 'name|surname|age');

// //Задание 1101

// Route::get('/userid/{id}', function($id){
//     return $id . ' уээээээээээээээээээээээээээ';
// })->whereNumber('id');

// //Задание 1110

// Route::get('/cityname/{name}', function($name){
//     return $name . 'Пощади меня';
// })->whereAlpha('name');

// //Задание 10000

// Route::get('/userid/{id}', function($id){
//     return $id . ' уээээээээээээээээээээээээээ';
// })->whereNumber('id');

// //Задание 10001

// Route::get('/users/{id}/{name}', function($id, $name){
//     return $id . ' уээээээээээээээээээээээээээ';
// })->whereNumber('id')->whereAlpha('name');

// //Задание 10010

// Route::get('/articles/{date?}', function($date = "Пощады не будет"){
//     return 'Дата моей пощады: ' . $date;
// })->where('date', '\d{4}-\d{2}-\d{2}');

// //Задание 10011

// Route::prefix('orders')->group(function(){
//     Route::get('/user/{order}', function($order){
//         return 'Порядок пощады: ' . $order;
//     })->where('order', 'surname');

//     Route::get('/user/{age}', function($age){
//         return 'Порядок пощады: ' . $age;
//     })->where('order', 'age');

//     Route::get('/user/{name}', function($name){
//         return 'Порядок пощады: ' . $name;
//     })->where('order', 'name');

// });


// //Задание 10100

// Route::get('/{year}/{month}/{day}', function($year, $month, $day){
//     $date = new DateTime("$year-$month-$day");
//     $weekday = $date->format('D');
//     return 'Дата моей пощады: ' . $weekday;
// })->where([
//     'year' => '\d{4}',
//     'month' => '\d{2}',
//     'day' => '\d{2}'
// ]);


//Практика номер 10
//Задание 1
//Задание 10

Route::get('/user', [UserController::class, 'show']);

//Задание 11

Route::get('/user/all', [UserController::class, 'all']);

//Задание 110

Route::get('/user/{name}', [UserController::class, 'name']);


//Задание 111

Route::get('/user/{surname}/{name}',[UserController::class, 'surName']);

//Задание 1000+1001

Route::get('/city/{name}', [UserController::class, 'getCity']);

//Задание 1010

// Route::get('/pages/show', [TypeController::class, 'showOne']);
Route::get('/pages/all', [TypeController::class, 'showAll']);

//Задание 1011

Route::get('/pages/show/{id}', [TypeController::class, 'showOne'])->whereNumber('id');

//Задание 1100

Route::get('/test/sum/{num1}/{num2}', [TestController::class, 'sum']);

//! 3) Представления 

// Задание 1-3

Route::get('/post/show', [TestController::class, 'show']);

// Задание 5-6

Route::get('/post/show2', [TestController::class, 'show2']);

// Задание 7-11

Route::get('/post/test1', [TestController::class, 'test1']);
Route::get('/post/test2', [TestController::class, 'test2']);
Route::get('/post/test3', [TestController::class, 'test3']);




//! 4) blade

// Задание 1

Route::get('/task4/one', [task4Controller::class, 'one']);

// Задание 2-6

Route::get('/task4/two', [task4Controller::class, 'two']);

// Задание 7-8

Route::get('/task4/three', [task4Controller::class, 'three']);

// Задание 9-13

Route::get('/task4/four', [task4Controller::class, 'four']);

// Задание 14-39

Route::get('/task4/five', [task4Controller::class, 'five']);

// Задание 40-48

Route::get('/task4/six', [task4Controller::class, 'six']);



// Практика 6

Route::prefix('task6')->group(function () {

    // Задание 1- (Построитель запросов)
    Route::get('/show', [UserController::class, 'show']);

});

// Практика 7 - Модели
Route::prefix('task7')->group(function () {

    // Задание 4-6
    Route::get('/index', [UserController::class, 'index']);

    // Задание 7
    Route::get('/task7', [UserController::class, 'task7']);

    // Задание 8
    Route::get('/task8', [UserController::class, 'task8']);

    // Задание 9
    Route::get('/task9', [UserController::class, 'task9']);

    // Задание 10
    Route::get('/task10', [UserController::class, 'task10']);

    // Задание 11
    Route::get('/task11', [UserController::class, 'task11']);

    // Задание 12
    Route::get('/task12', [UserController::class, 'task12']);

    // Задание 13
    Route::get('/task13', [UserController::class, 'task13']);

    // Задание 14
    Route::get('/task14', [UserController::class, 'task14']);

    // Задание 15
    Route::get('/task15', [UserController::class, 'task15']);

    // Задание 16
    Route::get('/task16', [UserController::class, 'task16']);

    // Задание 17
    Route::get('/task17', [UserController::class, 'task17']);

    // Задание 18
    Route::get('/task18', [UserController::class, 'task18']);

    // Задание 19
    Route::get('/task19', [UserController::class, 'task19']);

    // Задания для самостоятельной работы
    Route::get('/product-crud', [UserController::class, 'productCrud']);
    Route::get('/filtering', [UserController::class, 'filtering']);
    Route::get('/aggregates', [UserController::class, 'aggregates']);
    Route::get('/scopes', [UserController::class, 'scopes']);
    Route::get('/casts', [UserController::class, 'castsAndMutators']);
    Route::get('/create-order', [UserController::class, 'createOrder']);

});
