@php
if (!isset($label)) {
$label = ucfirst($name);
}
if (!isset($type)) {
$type = 'text';
}
if (!isset($class)) {
$class = null;
}
if (!isset($name)) {
$name = '';
}
if(!isset($value)){
$value = '';
}
@endphp




<div @class=(["form-group",$class])>
    <label for="">{{ $label }}</label>

    @if ($type === 'textarea')
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        id="{{ $name }}">{{ old($name,$value) }}</textarea>


    @else
    <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}"
        id="{{ $name }}" value="{{ old($name, $value) }}">

    @endif
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

</div>
