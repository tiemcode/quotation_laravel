@if (session()->has('success'))
<div class="pt-4">
    <div class="alert alert-success">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 50px;" fill="currentColor" class="text-success  bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
            </svg>
            <div class="ms-3">
                <p class="text-success">{{ session()->get('success') }}</p>
            </div>
        </div>
    </div>
</div>
@endif
@if (session()->has('error'))
<div class="pt-4">
    <div class="alert alert-danger">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 50px;" fill="currentColor" class="text-danger bi bi-dash-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
            </svg>
            <div class="ms-3">
                <p class="text-danger">{{ session()->get('error') }}</p>
            </div>
        </div>
    </div>
</div>
@endif
