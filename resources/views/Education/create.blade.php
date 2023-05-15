@extends('layouts.form')

@section('page.title', 'Educaion')


@section('form.content')
    <!-- сообщения про ошибки валидации -->
    <x-errors />

	<x-card>
		<x-card-header>
			<h4 class="m-0">
				{{ __("Запись про образование")}}
			</h4>
		</x-card-header>
        <x-card-body>

            <x-form action="{{ route('education.store')}}" method='POST'>

                <x-form-item>
                    <x-label required>{{ __('Выберите пользователя')}}</x-label>
                    <x-select class='foo' name='id' value="{{ request('id')}}" :users_list=$users_list autofocus />
                </x-form-item>

                <x-form-item>
					<x-label required>{{ __('Укажите образование')}}</x-label>
					<x-input type="text" class="form-control" name="education"/>
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
