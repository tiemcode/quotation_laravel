@props(['h1', 'form', 'add'])

<div class="row my-3">
    <div class="col-6">
        <h1>{{ $h1 }}</h1>
    </div>
    <div class="col-4">
        <form action=" {{ route($form . '.search') }}" class="d-flex input-group ">
            <input type="text" name="search" id="search"
                @isset($bar) value="{{ $bar }}" @endisset class="form-control -sm"
                placeholder="Zoeken">
            <button type="submit" class="btn btn-secondary -sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </form>
    </div>
    <div class="col-2">
        <a @if (Route::is('roles.index')) data-bs-toggle="modal" data-bs-target="#addModal"
          @else
        href="{{ route($form . '.create') }}" @endif
            class="btn btn-primary font-weight-semibold">
            Nieuwe {{ $add }}
        </a>
    </div>
</div>
