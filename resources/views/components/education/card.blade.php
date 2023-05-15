@props(['user'=>''])

<!-- Показываеем карточку только если есть запрос на это -->
{{-- @if($user->education) --}}
@if(true)
    <x-card {{ $attributes->class([
        'card'
    ]) }}>

        <x-card-body>
            <x-card-title>
                {{ __('Образование') }}
            </x-card-title>
            <div class="mb-2">
                <h2 class="h5">
                    {{ $user->education }}
                </h2 class="h5">

            </div>
        </x-card-body>

    </x-card>
@endif
