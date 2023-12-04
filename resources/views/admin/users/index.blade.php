<x-app-layout>
    <x-row-table h1="Gebruikers" form="users" add="gebruiker"></x-row-table>
    <div class="row card">
        <table class="table table-striped mb-0 ">
            <thead>
                <th>Naam</th>
                <th>Telefoonnummer</th>
                <th>Email</th>
                <th>Adres</th>
                <th></th>
            </thead>
            <tbody>
                @forelse($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <x-table-icon form="users" item={{ $item }}></x-table-icon>
                    </tr>
                @empty
                    <tr colspan="10">
                        <td>Geen gebruikers gevonden</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
