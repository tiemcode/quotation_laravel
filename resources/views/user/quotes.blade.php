<x-user-layout>
    <x-usertable-head h1="{{$company->company_name}}"></x-usertable-head>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="{{ route('user.show', $company) }}" class="nav-link ">Info</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.companyEmployies', $company) }}" class="nav-link">Werknemers</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link active ">Offertes</a>
        </li>
    </ul>
    <div class="card row">
        <table class="table  table-striped  mb-0">
            <thead>
                <tr>
                    <th>Offerte nummer</th>
                    <th>Bedrijfsnaam </th>
                    <th>Aangemaakte datum</th>
                    <th>Download PDF</th>
                    <th>geaccepteerd datum</th>
                </tr>
            </thead>
            <tbody>
                @forelse($quotes as $item)
                <tr>
                    <td class="p-2">
                        <p>{{ $item->quotes_number }}</p>
                    </td>
                    <td class="p-2">
                        <p>{{ $item->company->company_name }}</p>
                    </td>
                    <td class="p-2">
                        <p>{{ date('d-m-Y h:i', strtotime($item->created_at)) }}</p>
                    </td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <form action="{{ route('user.companyQuote.download', $company) }}" method="post" class="mr-2">
                                @csrf
                                <input type="hidden" name="quote_id" value="{{ $item->id }}">
                                <input type="submit" value="Download" class="btn btn-primary">
                            </form>
                            @isset($item->file)
                            <form method="post" action="{{ route('user.companyQuote.downloadFile', $company) }}">
                                @csrf
                                <input type="hidden" name="quote_id" value="{{ $item->id }}">
                                <input type="submit" value="Download bijlage" class="btn btn-sm btn-link ">
                            </form>
                            @endisset
                        </div>
                    </td>
                    <td class="p-2">
                        @empty($item->accepted_date)
                        <p>Geen offerte datum</p>
                        @else
                        <p>{{ date('d-m-Y h:i', strtotime($item->accepted_date)) }}</p>
                        @endempty
                    </td>
                    <td>
                        @if (!$item->accepted_date)
                        @can('isOwner', [$company, $item->company])
                        <form action="{{ route('user.companyaccept', $company) }}" onsubmit="return confirm('weet je het zeker om deze te accepteren')" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="quote_id" value="{{ $item->id }}">
                            <input type="submit" value="Accepteren" class="btn btn-success">
                        </form>
                        @endcan
                        @endempty
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <p class="text-center">Geen offertes gevonden</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
    </div>
</x-user-layout>
