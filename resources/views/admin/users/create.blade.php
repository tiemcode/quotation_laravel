<x-app-layout>
    <div class="card" style="width:85%;">
        <h1 class="card-header ">Gebruiker toevoegen</h1>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <x-input-field type="text" label='Naam' name="name"></x-input-field>
                <x-input-field type="text" label='Email' name="email"></x-input-field>
                <x-input-field type="text" label='Telefoonnummer' name="phone"></x-input-field>
                <div class="mb-3">
                    <label for="role" class="form-label">admin</label>
                    <input type="checkbox" name="isAdmin" id="role">
                </div>
                <x-input-field type="text" label='Adres' name="address"></x-input-field>
                <x-input-field type="text" label='Postcode' name="postal_code"></x-input-field>
                <x-input-field type="text" label='Stad' name="city"></x-input-field>
                <x-input-field type="password" label='Wachtwoord' name="password"></x-input-field>
                <x-input-field type="password" label='Wachtwoord bevestigen' name="password_confirmation"></x-input-field>

                <div class="my-3 d-flex flex-row-reverse ">
                    <input type="submit" class="btn btn-primary" value="Toevoegen">
                    <a href="{{ route('users.index') }}" class="btn btn-link">annuleren</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
