<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
</head>

<body>
    <h2>Offerte</h2>
    <p>Beste {{ ucfirst($company->company_name) }},</p>
    <p>Er staat een nieuwe offert klaar voor jullie {{ $quote->quotes_number }}.</p>

    {!! $quote->description !!}
    <p>Bekijk voor meer info in de bestanden die zijn mee geleverd met deze mail</p>
    <p>Met vriendelijke groet,</p>
    <p>De offerte applicatie</p>

</body>

</html>
