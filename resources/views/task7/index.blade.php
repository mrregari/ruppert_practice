@extends('components.layout')

@section('content')
<h2>7. Модели</h2>

@if(isset($result))
    @foreach($result as $taskName => $data)
        <div style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
            <h3>{{ $taskName }}</h3>
            
            @if(is_object($data) || is_array($data))
                <pre>{{ json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
            @else
                <p>{{ $data }}</p>
            @endif
        </div>
    @endforeach
@endif

@if(isset($users) && is_iterable($users))
    <h3>Все пользователи</h3>
    <table class="table">
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
                <td>{{ $user->id ?? '—' }}</td>
                <td>{{ $user->sex ?? '—' }}</td>
                <td>{{ $user->second_name ?? '—' }}</td>
                <td>{{ $user->first_name ?? '—' }}</td>
                <td>{{ $user->birth_date ?? '—' }}</td>
                <td>{{ $user->age ?? '—' }}</td>
                <td>{{ $user->email ?? '—' }}</td>
                <td>{{ $user->avatar ?? '—' }}</td>
                <td>{{ $user->salary ?? '—' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection

@section('title', '7. Модели')
