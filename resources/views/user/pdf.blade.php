<!DOCTYPE html>
<html>

<head>
    <title>User PDF</title>
</head>

<!--  -->
{{-- @dd( $company, $quote) --}}

<body>
    <div>
        <h1><strong>Offerte nummer:</strong> {{ ucfirst($quote->quotes_number) }}</h1>
        <p><strong>Offerte datum:</strong> {{ date('d-m-Y h:i', strtotime($quote->created_at)) }}</p>
        <p><strong>Ontschijving</strong></strong> {{ date('d-m-Y h:i', strtotime($quote->description)) }}</p>
        <p>bekijk de andere bij lagens voor mee info</p>
    </div>
    <div>
        <p><strong>Bedrijfsnaam:</strong> {{ ucfirst($company->company_name) }}</p>
        <p><strong>Contanct Persoon: </strong>{{ ucfirst($company->contact_person) }}</p>
        <p><strong>Telefoonnummer:</strong> {{ ucfirst($company->phone) }}</p>
        <p><strong>Email:</strong> {{ ucfirst($company->email) }}</p>
        <p><strong>Adres:</strong> {{ ucfirst($company->address) }}</p>
        <p><strong>Postcode:</strong> {{ ucfirst($company->postal_code) }}</p>
        <p><strong>Plaats:</strong> {{ ucfirst($company->city) }}</p>
    </div>

</body>

</html>
