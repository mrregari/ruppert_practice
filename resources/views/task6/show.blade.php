@extends('components.layout')

@section('content')
<h2>Задание {{ $taskNumber ?? 'из 7 практики (Модели)' }}</h2>

{{-- Задания 12, 13: Вывод одного юзера --}}
@if(isset($user) && !isset($users))
<div>
    <h5>Фамилия: {{ $user->second_name ?? 'Не указано' }}, Имя: {{ $user->first_name ?? 'Не указано' }}</h5>
</div>
<div>
    <ul>
        <li>id: {{ $user->id ?? 'Не указано' }}</li>
        <li>Пол: {{ $user->sex ?? 'Не указано' }}</li>
        <li>Дата рождения: {{ $user->birth_date ?? 'Не указано' }}</li>
        <li>Возраст: {{ $user->age ?? 'Не указано' }}</li>
        <li>Email: {{ $user->email ?? 'Не указано' }}</li>
        <li>Avatar: {{ $user->avatar ?? 'Не указано' }}</li>
        <li>Зарплата: {{ $user->salary ?? 'Не указано' }}</li>
    </ul>
</div>
@endif

{{-- Задание 6: Вывод юзеров в виде HTML таблицы --}}
@if(isset($users) && is_iterable($users))
<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Пол</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Дата рождения</th>
            <th>Возраст</th>
            <th>Email</th>
            <th>Аватар</th>
            <th>Зарплата</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id ?? 'Не указано' }}</td>
            <td>{{ $user->sex ?? 'Не указано' }}</td>
            <td>{{ $user->second_name ?? 'Не указано' }}</td>
            <td>{{ $user->first_name ?? 'Не указано' }}</td>
            <td>{{ $user->birth_date ?? 'Не указано' }}</td>
            <td>{{ $user->age ?? 'Не указано' }}</td>
            <td>{{ $user->email ?? 'Не указано' }}</td>
            <td>{{ $user->avatar ?? 'Не указано' }}</td>
            <td>{{ $user->salary ?? 'Не указано' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection

@section('title', $title ?? 'Task 7 - Models')
