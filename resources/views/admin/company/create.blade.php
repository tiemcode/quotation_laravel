<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h3 class="font-weight-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h3>
        </div>
    </x-slot>
    <div class="card" style="width:85%;">
        <h1 class="card-header ">Bedrijf toevoegen</h1>
        <div class="card-body">
            <form action="{{ route('companies.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <x-input-field type="text" label='Bedrijfs naam' name="company_name"></x-input-field>
                <x-input-field type="text" label='Contact persoon' name="contact_person"></x-input-field>
                <x-input-field type="text" label='Adres' name="address"></x-input-field>
                <x-input-field type="text" label='Postcode' name="postal_code"></x-input-field>
                <x-input-field type="text" label='Stad' name="city"></x-input-field>
                <x-input-field type="text" label='Telefoonnummer' name="phone_number"></x-input-field>
                <x-input-field type="text" label='Email' name="email"></x-input-field>
                <x-input-img label='Logo' name="logo"></x-input-img>
                <!-- <label for=" fileInput" class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control mb-2" id="fileInput"> -->
                <img src="#" alt="File Preview" id="filePreview" style="display: none; max-width: 300px; max-height: 300px;">
                <div class="my-3 d-flex flex-row-reverse ">
                    <input type="submit" class="btn btn-primary" value="Toevoegen">
                    <a href="{{ route('companies.index') }}" class="btn btn-link">annuleren</a>
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
                            preview.style.display = 'block';
                        }

                        reader.readAsDataURL(file);
                    } else {
                        preview.style.display = 'none';
                    }
                });
            </script>
        </div>
    </div>
</x-app-layout>