<x-app-layout>
    <x-row-table h1="Bedrijven" form="companies" add="bedrijf"></x-row-table>
    <div class="row card">
        <table class="table table-striped mb-0 ">
            <thead>
                <tr>
                    <th>Bedrijfnaam</th>
                    <th>Contact persoon</th>
                    <th>Telefoonnummer</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($company as $item)
                <tr>
                    <td class="p-2">
                        {{ ucfirst($item->company_name) }}
                    </td>
                    <td>{{ ucfirst($item->contact_person) }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <x-table-icon form="companies" item={{ $item }}></x-table-icon>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <p class="text-center">Geen bedrijven gevonden</p>
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="row">
        {{ $company->links('pagination::bootstrap-5') }}
    </div>


</x-app-layout>
