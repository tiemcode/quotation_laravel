@props(['name', 'label', 'value' => '', 'error' => null, 'type'])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">
        {{ old($name, $value) }}</textarea>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
