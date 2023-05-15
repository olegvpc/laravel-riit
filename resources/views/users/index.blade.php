@extends('layouts.base')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Пользователи')

@section('content')

    <x-container>

        <x-title>
            {{ __('Список пользователей')}}
        </x-title>

        <div class="row">
            @if (empty($users))
                {{ __('Нет ни одного пользователя') }}
            @else
                @foreach ($users as $user)
                <x-card class="mb-2">
                    <x-card-body >
                        <div class="row">
                            <x-user.card class="col-12 col-md-4 me-3" :user=$user />
                            <x-education.card class="col-12 col-md-4 me-3" :user=$user />
                            <x-city.card class="col-12 col-md-3" :user=$user />
                        </div>
                    </x-card-body>
                </x-card>

                @endforeach
            @endif
        </div>

    </x-container>

@endsection
