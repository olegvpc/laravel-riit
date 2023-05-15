{{-- @props(['options'=> ['foo'=>'bar']]) --}}
@props(['value' => null, 'users_list'=> []])

<select {{ $attributes->class([
	'form-control'
]) }}>
	@foreach($users_list as $id => $user)
		<option value="{{ $id }}" {{ ($id == $value) ? 'selected' : null}}>
			{{ $user }}
		</option>

	@endforeach
</select>
