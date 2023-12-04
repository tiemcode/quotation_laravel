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
            <div class="card-header">
                <h3 class="card-title ">Bedrijf aanpassen</h3>
            </div>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.users', $company) }}">Gebruikers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.guotes', $company) }}">Offertes</a>
                </li>
            </ul>
            <div class="card-body">
                <form action="{{ route('companies.update', $company) }} " enctype="multipart/form-data" method="post">
                    @csrf
                    <x-input-field type="text" label='Bedrijfsnaam' name="company_name"
                        :value="$company->company_name"></x-input-field>
                    <x-input-field type="text" label='Contactpersoon' name="contact_person"
                        :value="$company->contact_person"></x-input-field>
                    <x-input-field type="text" label='Adres' name="address" :value="$company->address"></x-input-field>
                    <x-input-field type="text" label='Postcode' name="postal_code" :value="$company->postal_code"></x-input-field>
                    <x-input-field type="text" label='Stad' name="city" :value="$company->city"></x-input-field>
                    <x-input-field type="text" label='Telefoonnummer' name="phone_number"
                        :value="$company->phone"></x-input-field>
                    <x-input-field type="text" label='Email' name="email" :value="$company->email"></x-input-field>
                    <x-input-img label='Logo' name="logo" :value="$company->logo"></x-input-img>

                    <img @isset($company->logo) src="{{ asset('images/' . $company->logo) }}" @endisset
                        id="filePreview" style="max-width: 300px; max-height: 300px;">
                    <div class="my-3 d-flex flex-row-reverse ">
                        <input type="submit" class="btn btn-primary" value="Aanpassen">
                        <a href=" {{ route('companies.index') }} " class="btn btn-link">annuleren</a>
                    </div>
                </form>
                <script>
                    document.getElementById('fileInput').addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        const preview = document.getElementById('filePreview');
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                            }
                            reader.readAsDataURL(file);
                        }
                    });
                </script>
            </div>
        </div>
</x-app-layout>
