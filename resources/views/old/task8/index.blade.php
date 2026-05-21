<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практика 8 - Связи в моделях</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #ff4444;
            padding-bottom: 10px;
        }
        h2 {
            color: #555;
            margin-top: 30px;
        }
        .result {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .result h3 {
            margin-top: 0;
            color: #ff4444;
        }
        pre {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
        .nav {
            margin: 20px 0;
            padding: 15px;
            background: #fff;
            border-radius: 8px;
        }
        .nav a {
            display: inline-block;
            margin: 5px 10px 5px 0;
            padding: 8px 15px;
            background: #ff4444;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .nav a:hover {
            background: #cc0000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #ff4444;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Практика 8 - Связи в моделях Eloquent</h1>
    
    <div class="nav">
        <strong>Задания:</strong>
        <a href="/task8/user-articles">1. Статьи пользователя</a>
        <a href="/task8/user-orders">2. Заказы пользователя</a>
        <a href="/task8/user-city">3. Город пользователя</a>
        <a href="/task8/city-users">4. Пользователи города</a>
        <a href="/task8/article-user">5. Автор статьи</a>
        <a href="/task8/order-products">6. Товары заказа</a>
        <a href="/task8/product-warehouses">7. Склады товара</a>
        <a href="/task8/order-user">8. Пользователь заказа</a>
        <a href="/task8/product-orders">9. Заказы товара</a>
    </div>

    <div class="result">
        <h3>Результат:</h3>
        @if(isset($result) && !empty($result))
            @foreach($result as $key => $value)
                <p><strong>{{ $key }}:</strong></p>
                @if(is_object($value) || is_array($value))
                    <pre>{{ json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                @else
                    <p>{{ $value }}</p>
                @endif
            @endforeach
        @else
            <p>Выберите задание из меню выше</p>
        @endif
    </div>
</body>
</html>
