<x-user-layout>
    <x-userTable-head h1="{{$company->company_name}}"></x-userTable-head>
    <div class="mt-3">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="{{ route('user.show', $company) }}" class="nav-link">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active ">Werknemers</a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('user.companyQuotes', $company) }}" class="nav-link ">offertes</a>
            </li>
        </ul>
        <div class="row card">

            <table class="table rounded  table-striped mb-0">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Rol</th>
                        <th>Telefoonnummer</th>
                        <th>Email</th>
                        <th>Adres</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                    <tr>
                        <td>
                            <p>{{ ucfirst($item->name) }}</p>
                        </td>
                        <td>
                            <?php
                            $role = App\Models\Role::find($item->pivot->role_id);
                            ?>
                            <p>{{ ucfirst($role->name) }}</p>
                        </td>

                        <td>
                            <p>{{ ucfirst($item->phone) }}</p>
                        </td>
                        <td>
                            <p>{{ ucfirst($item->email) }}</p>
                        </td>
                        <td>
                            <p>{{ ucfirst($item->address) }}</p>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <p class="text-center">Geen gebruikers gevonden</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    </div>
</x-user-layout>
