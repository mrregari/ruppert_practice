<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\City;
use App\Models\Product;
use App\Models\Article;
use App\Models\Order;

class UserController extends Controller
{
    // Задания 4-19
    public function index()
    {
        $result = [];

        // Задание 4-6: Получить всех юзеров
        $result['Задание 4-6'] = User::all();

        // Задание 7: Получить всех юзеров с возрастом 30
        $result['Задание 7'] = User::where('age', 30)->get();

        // Задание 8: Получить всех юзеров с зарплатой от 100 до 300
        $result['Задание 8'] = User::whereBetween('salary', [100, 300])->get();

        // Задание 9: Получить всех юзеров, начиная с четвертого
        $result['Задание 9'] = User::skip(3)->get();

        // Задание 10: Получить 5 юзеров, начиная с четвертого
        $result['Задание 10'] = User::skip(3)->take(5)->get();

        // Задание 11: Получить юзеров с id 1, 3, 4, 5
        $result['Задание 11'] = User::whereIn('id', [1, 3, 4, 5])->get();

        // Задание 12: Получить юзера с возрастом 30
        $result['Задание 12'] = User::where('age', 30)->first();

        // Задание 13: Получить юзера с id=3
        $result['Задание 13'] = User::find(3);

        // Задание 14: Получить юзеров с id 3, 4, 5
        $result['Задание 14'] = User::whereIn('id', [3, 4, 5])->get();

        // Задание 15: Добавить нового юзера
        User::create([
            'sex' => 'Мужской',
            'first_name' => 'Иван',
            'second_name' => 'Иванов',
            'birth_date' => '1990-01-01',
            'age' => 34,
            'email' => 'ivan@example.com',
            'salary' => 500,
            'is_admin' => false,
        ]);
        $result['Задание 15'] = 'Юзер добавлен';

        // Задание 16: Изменить юзера
        $user = User::find(1);
        if ($user) {
            $user->update(['salary' => 700]);
            $result['Задание 16'] = 'Юзер изменён';
        } else {
            $result['Задание 16'] = 'Юзер не найден';
        }

        // Задание 17: Удалить юзеров с возрастом > 30
        $deleted = User::where('age', '>', 30)->delete();
        $result['Задание 17'] = 'Удалено юзеров: ' . $deleted;

        // Задание 18: Удалить юзера с id=3
        User::destroy(3);
        $result['Задание 18'] = 'Юзер с id=3 удалён';

        // Задание 19: Удалить юзеров с id 4, 5, 6
        User::destroy([4, 5, 6]);
        $result['Задание 19'] = 'Юзеры с id 4, 5, 6 удалены';

        // Получаем всех юзеров для отображения
        $users = User::all();

        return view('task7.index', compact('result', 'users'));
    }

    // Задание 7 (сам. работа) - CRUD
    public function productCrud()
    {
        $result = [];

        // Задание 7a: Получение всех товаров
        $result['7a - Все товары'] = Product::all();

        // Задание 7b: Получение товара по id = 5
        $result['7b - Товар id=5'] = Product::find(5);

        // Задание 7c: Получение первого товара
        $result['7c - Первый товар'] = Product::first();

        // Задание 7d: Получение товара по id или исключение
        $result['7d - Товар id=5 (OrFail)'] = Product::findOrFail(5);

        // Задание 8: Создание товара (2 способа)
        $product1 = new Product();
        $product1->name = 'Товар 1';
        $product1->price = 199.99;
        $product1->quantity = 10;
        $product1->save();
        $result['8a - Создан товар (save)'] = $product1;

        $product2 = Product::create([
            'name' => 'Товар 2',
            'price' => 299.99,
            'quantity' => 5,
            'is_active' => true,
        ]);
        $result['8b - Создан товар (create)'] = $product2;

        // Задание 9: Обновление
        $product = Product::find(1);
        if ($product) {
            $product->price = 999.99;
            $product->save();
            $result['9a - Товар обновлён'] = $product;
        }

        Product::where('quantity', 0)->update(['is_active' => false]);
        $result['9b - Массовое обновление'] = 'Выполнено';

        // Задание 10: Удаление
        $product = Product::find(1);
        if ($product) {
            $product->delete();
            $result['10a - Товар удалён (delete)'] = 'Выполнено';
        }

        Product::where('price', '<', 10)->delete();
        $result['10b - Массовое удаление'] = 'Выполнено';

        Product::destroy(1);
        $result['10c - Удаление через destroy'] = 'Выполнено';

        return view('task7.index', compact('result'));
    }

    // Задание 11-15 (сам. работа) - Фильтрация
    public function filtering()
    {
        $result = [];

        // Задание 11: price > 500 И is_active = true, сортировка
        $result['Задание 11'] = Product::where('price', '>', 500)
            ->where('is_active', true)
            ->orderBy('price', 'desc')
            ->get();

        // Задание 12: title LIKE '%Laravel%' ИЛИ views_count > 1000
        $result['Задание 12'] = Article::where('title', 'like', '%Laravel%')
            ->orWhere('views_count', '>', 1000)
            ->limit(10)
            ->offset(5)
            ->get();

        // Задание 13: whereBetween и whereIn
        $result['Задание 13a - whereBetween'] = Product::whereBetween('price', [100, 500])->get();
        $result['Задание 13b - whereIn'] = Product::whereIn('quantity', [0, 5, 10, 15])->get();

        // Задание 14: whereNotNull + whereDate
        $result['Задание 14'] = Article::whereNotNull('published_at')
            ->whereDate('created_at', today())
            ->get();

        // Задание 15: Группировка условий (closure)
        $result['Задание 15'] = Product::where(function ($query) {
                $query->where('price', '>', 1000)
                    ->where('quantity', '>', 0);
            })
            ->orWhere('is_active', false)
            ->get();

        return view('task7.index', compact('result'));
    }

    // Задание 16-17 (сам. работа) - Агрегатные функции
    public function aggregates()
    {
        $result = [];

        // Задание 16: Агрегатные функции
        $result['Задание 16a - count'] = Product::where('is_active', true)->count();
        $result['Задание 16b - avg'] = Product::avg('price');
        $result['Задание 16c - max'] = Product::max('price');
        $result['Задание 16d - min'] = Product::min('price');
        $result['Задание 16e - sum'] = Product::sum('quantity');

        // Задание 17: Группировка
        $result['Задание 17'] = Product::selectRaw('is_active, COUNT(*) as count, AVG(price) as avg_price')
            ->groupBy('is_active')
            ->get();

        return view('task7.index', compact('result'));
    }

    // Задание 18-19 (сам. работа) - Scopes
    public function scopes()
    {
        $result = [];

        // Задание 18: Локальные scopes
        $result['Задание 18'] = Product::active()->expensive(500)->get();

        // Задание 19: Глобальный scope с отключением
        $result['Задание 19a - с global scope'] = Article::all();
        $result['Задание 19b - без global scope'] = Article::withoutGlobalScope('published')->get();

        return view('task7.index', compact('result'));
    }

    // Задание 20-21 (сам. работа) - Casts и мутаторы
    public function castsAndMutators()
    {
        $result = [];

        // Задание 20: Casts
        $product = Product::create([
            'name' => 'Тестовый товар',
            'price' => 199.99,
            'quantity' => 10,
            'is_active' => true,
            'options' => ['color' => 'red', 'size' => 'XL'],
        ]);
        $result['Задание 20 - product'] = $product;
        $result['Задание 20 - options (array)'] = $product->options;

        // Задание 21: Аксессоры и мутаторы
        $article = Article::create([
            'title' => '  <b>laravel tutorial</b>  ',
            'body' => 'Текст статьи',
        ]);
        $result['Задание 21 - article title (accessor)'] = $article->title;

        return view('task7.index', compact('result'));
    }

    // Задание 3 (сам. работа) - Order с UUID
    public function createOrder()
    {
        $result = [];

        // Задание 3: Order с UUID
        $order = Order::create();
        $result['Задание 3 - Order с UUID'] = $order;
        $result['order_id'] = $order->order_id;

        return view('task7.index', compact('result'));
    }
}
