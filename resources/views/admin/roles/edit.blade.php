<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>
    <div class="card" style="width:85%;">
        <h1 class="card-header ">Rol aanpassen</h1>
        <div class="card-body">
            <form method="post" action="{{ route('roles.update' , $role) }}">
                @csrf
                <x-input-field type="text" :value="$role->name" label="Naam" name="name"></x-input-field>
                <div class="my-3 d-flex flex-row-reverse ">
                    <input type="submit" class="btn btn-primary" value="Toevoegen">
                    <a href="{{ route('roles.index') }}" class="btn btn-link">Ga terug</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>