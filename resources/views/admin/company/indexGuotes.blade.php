<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h1 class="font-weight-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __(ucfirst($company->company_name)) }}
            </h1>
        </div>
    </x-slot>
    <div style="width:85%;">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-content-center   ">
                <h3 class="card-title ">Gekoppelde offertes</h3>
                <a href="{{ route('quotes.create') }}" class="btn btn-primary btn-md -sm h-100">Nieuwe
                    offerte</a>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.edit', $company) }}">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.users', $company) }}">Gebruikers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active ">Offertes</a>
                </li>
            </ul>
            <div class=" mt-3 ">
                <table class="card-body mb-0 table table-striped ">
                    <thead>
                        <tr>
                            <th>Offerte nummer</th>
                            <th>Aangemaakte datum</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($guotes as $item)
                            <tr>
                                <td>{{ $item->quotes_number }}</td>
                                <td>{{ date('d-m-Y h:i', strtotime($item->created_at)) }}</td>
                                <td>
                                    <form action="{{ route('companies.guotes.email', $company) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quote" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-primary">Email offerte</button>
                                    </form>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100">
                                    <p>Geen offertes gevonden</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
