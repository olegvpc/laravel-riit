@extends('layouts.form')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Login-site')


@section('form.content')
    <!-- сообщения про ошибки валидации -->
    <x-errors />

	<x-card>
		<x-card-header>
			<h4 class="m-0">
				{{ __("Создание нового пользователя")}}
			</h4>

		</x-card-header>

		<x-card-body>
			<x-form action="{{ route('users.store')}}" method="POST">
				<!-- Добавления скрытого поля для SCRF защиты -->
				{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
				{{-- @csrf --}}

				<x-form-item>
					<x-label required>{{ __('Имя')}}</x-label>
					<x-input type="text" class="form-control" name="name" autofocus />
				</x-form-item>

				<x-button type='submit' class='btn-primary'>
					{{ __('Cоздать')}}
				</x-button>
			</x-form>
		</x-card-body>
	</x-card>
@endsection
