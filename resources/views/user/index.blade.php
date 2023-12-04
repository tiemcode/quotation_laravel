<x-user-layout>

    <x-userTable-head h1="mijn bedrijven"></x-userTable-head>
    <div class="row card">
        <table class="table  table-striped mb-0 ">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Telefoon</th>
                    <th>Email</th>
                    <th>Adres</th>
                    <th>Postcode</th>
                    <th>Plaats</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($companies as $company)
                    <tr>
                        <td>
                            <a href="{{ route('user.show', $company) }}">
                                {{ Str::ucfirst($company->company_name) }}
                            </a>
                        </td>
                        <td>{{ $company->phone }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ Str::ucfirst($company->address) }}</td>
                        <td>{{ $company->postal_code }}</td>
                        <td>{{ Str::ucfirst($company->city) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <p class="text-center">Geen resultaten gevonden</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-user-layout>
