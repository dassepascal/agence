@php
if (!isset($label)) {
$label = ucfirst($name);
}
if (!isset($value)) {
$value = '';
}
if (!isset($class)) {
$class = null;
}
if (!isset($name)) {
$name = '';
}
@endphp




<div @class=(["form-group",$class])>
    <label for="">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
@foreach ($options as $k => $v  )
<option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
@endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
