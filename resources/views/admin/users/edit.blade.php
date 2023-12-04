<x-app-layout>
    <div class="card">
        <h1 class="card-header ">Gebruiker toevoegen</h1>
        <div class="card-body">
            <form action="{{ route('users.update' , $user) }}" method="post">
                @csrf
                <x-input-field :value="$user->name" type="text" label='Naam' name="name"></x-input-field>
                <x-input-field :value="$user->email" type="text" label='Email' name="email"></x-input-field>
                <x-input-field :value="$user->phone" type="text" label='Telefoonnummer' name="phone"></x-input-field>
                <div class="mb-3">
                    <label for="role" class="form-label">admin</label>
                    <input type="checkbox" @isset($user->is_admin)
                    checked
                    @endisset
                    name="isAdmin" id="role">
                </div>
                <x-input-field :value="$user->address" type="text" label='Adres' name="address"></x-input-field>
                <x-input-field :value="$user->postal_code" type="text" label='Postcode' name="postal_code"></x-input-field>
                <x-input-field :value="$user->city" type="text" label='Stad' name="city"></x-input-field>
                <div class="my-3 d-flex flex-row-reverse ">
                    <input type="submit" class="btn btn-primary" value="aanpassen">
                    <a href="{{ route('users.index') }}" class="btn btn-link">Ga terug</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>