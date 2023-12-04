<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h3 class="font-weight-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __(ucfirst($company->company_name)) }}
            </h3>
        </div>
    </x-slot>
    <div style="width:85%;">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('companies.users.update', [$company, $user]) }}">
                    @csrf
                    <div>
                        <div class="mt-2">
                            <label for="username" class="form-label">Gebruiker</label>
                            <input type="text" name="title" id="title" disabled value="{{ $user->name }}"
                                class="form-control @error('title') is-invalid @enderror" />
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <label for="rollen" class="form-label">Rol</label>
                            <select class="form-select" name="rollen" id="rollen">
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $selectedId ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="my-3 d-flex flex-row-reverse ">
                        <input type="submit" class="btn btn-primary" value="Aanpassen">
                        <a href=" {{ route('companies.users', $company) }} " class="btn btn-link">Ga Terug</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
