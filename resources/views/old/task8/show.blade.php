@extends('components.layout')

@section('content')
<h2>Задание {{ $taskNumber ?? 'из 8 практики' }}</h2><br>

<h1>{{ $profileName ?? '' }}</h1>

@if(isset($result))
    @if(isset($result['user_name']))
        <p>Имя пользователя: {{ $result['user_name'] }}</p>
    @endif
    @if(isset($result['city_name']))
        <p>Город: {{ $result['city_name'] }}</p>
    @endif
    @if(isset($result['position_name']))
        <p>Должность: {{ $result['position_name'] }}</p>
    @endif
@endif

@if(isset($users) && isset($roles))
    <h3>Users with Roles:</h3>
    @foreach($users as $user)
        <p>User: {{ $user->name }} - Roles: {{ $user->roles->pluck('name')->join(', ') }}</p>
    @endforeach
    
    <h3>Roles with Users:</h3>
    @foreach($roles as $role)
        <p>Role: {{ $role->name }} - Users: {{ $role->users->pluck('name')->join(', ') }}</p>
    @endforeach
@endif

@if(isset($users) && !isset($roles))
    <h3>Users with city and position:</h3>
    @foreach($users as $user)
        <p>User: {{ $user->name ?? 'N/A' }} - City: {{ $user->city?->name ?? 'N/A' }} - Position: {{ $user->position?->name ?? 'N/A' }}</p>
    @endforeach
@endif

@endsection

@section('title', $title ?? 'Task 8')
