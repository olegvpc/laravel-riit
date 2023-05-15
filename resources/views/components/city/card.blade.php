@props(['user'=>''])

<!-- Показываеем карточку только если есть запрос на это -->
{{-- @if($user->education) --}}

@php($cities = explode(',', $user->cities))
@if(true)
    <x-card {{ $attributes->class([
        'card'
    ]) }}>

        <x-card-body>
            <x-card-title>
                {{ __('Города') }}
            </x-card-title>
            <div class="m-0 small text-muted ">
                @foreach($cities as $city)
                <div class="row">
                    {{ $city }}
                </div>
                @endforeach
            </div>
        </x-card-body>

    </x-card>
@endif

