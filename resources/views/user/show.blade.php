<x-user-layout>
    <x-usertable-head h1="{{$company->company_name}}"></x-usertable-head>


    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active">Info</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.companyEmployies', $company) }}" class="nav-link">Werknemers</a>
        </li>
        <li class="nav-item ">
            <a href="{{route('user.companyQuotes' ,$company)}}" class="nav-link ">Offertes</a>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            <p><strong>Bedrijfsnaam:</strong> {{ ucfirst($company->company_name) }}</p>
            <p><strong>Contanct Persoon: </strong>{{ucfirst($company->contact_person)}}</p>
            <p><strong>Telefoonnummer:</strong> {{ ucfirst($company->phone) }}</p>
            <p><strong>Email:</strong> {{ ucfirst($company->email) }}</p>
            <p><strong>Adres:</strong> {{ ucfirst($company->address) }}</p>
            <p><strong>Postcode:</strong> {{ ucfirst($company->postal_code) }}</p>
            <p><strong>Plaats:</strong> {{ ucfirst($company->city) }}</p>
        </div>
    </div>

</x-user-layout>
