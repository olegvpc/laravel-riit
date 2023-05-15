@extends('layouts.form')

@section('page.title', 'Sity')


@section('form.content')
    <!-- сообщения про ошибки валидации -->
    <x-errors />

	<x-card>
		<x-card-header>
			<h4 class="m-0">
				{{ __("Город посещения")}}
			</h4>
		</x-card-header>
        <x-card-body>

            <x-form action="{{ route('cities.store') }}" method='POST'>

                <x-form-item>
                    <x-label required>{{ __('Выберите пользователя')}}</x-label>
                    <x-select class='foo' name='id' value="{{ request('id')}}" :users_list=$users_list autofocus />
                </x-form-item>

                <x-form-item>
					<x-label required>{{ __('Напишите новый город')}}</x-label>
					<x-input type="text" class="form-control" name="city"/>
				</x-form-item>

                <x-form-item>
                    <x-button type='submit' class='w-100 btn-primary'>
                        {{ __('Cохранить') }}
                    </x-button>
                </x-form-item>

            </x-form>

        </x-card-body>



	</x-card>
@endsection
