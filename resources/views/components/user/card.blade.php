@props(['user'=>''])

<x-card {{ $attributes->class([
    'card'
]) }}>
	<x-card-body>
        <x-card-title>
            {{ __('Имя') }}
        </x-card-title>
		<div class="mb-2">
			<h2 class="h5">
				<!--   вытаскиваем элементы массива -->
                {{ $user->name }}
			</h2 class="h5">

			<!--  временный элемент -->
            <div class="m-0  small text-muted ">
                ID: {{ $user->id }}
            </div>
		</div>

	</x-card-body>
</x-card>
