@props(['name', 'label', 'value' => '', 'error' => null, ])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="file" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name, $value) }}" id="fileInput" value="{{ $value }}">
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
