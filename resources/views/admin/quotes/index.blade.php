<x-app-layout>
    <x-row-table h1="Offertes" form="quotes" add="offerte"></x-row-table>
    <div class="row card">
        <table class="table table-striped mb-0">
            <thead>
                <th>Offerte nummer</th>
                <th>Bedrijfsnaam</th>
                <th>Geaccordeerde datum</th>
                <th>Aangemaakte datum</th>
                <th></th>
            </thead>
            <tbody>
                @forelse($quotes as $item)
                    <tr>
                        <td>{{ $item->quotes_number }}</td>
                        <td>{{ ucfirst($item->company->company_name) }}</td>
                        <td>
                        @empty($quote->accepted_date)
                            <p>Geen offerte datum</p>
                        @else
                            <p>{{ date('d-m-Y', strtotime($quote->accepted_date)) }}</p>
                        @endempty
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <x-table-icon form="quotes" item={{ $item }}></x-table-icon>
                </tr>
            @empty
                <tr colspan="10">
                    <td>Geen offertes gevonden</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
