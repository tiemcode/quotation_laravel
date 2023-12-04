<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h3 class="font-weight-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h3>
        </div>
    </x-slot>
    <div class="card" style="width:85%;">
        <h1 class="card-header ">Offerte aanmaken</h1>
        <div class="card-body">
            <form action="{{ route('quotes.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="company">Bedrijven</label>
                    <select class="form-select" id="company" name="company">
                        <option selected="selected" disabled value="">Kies een bedrijf</option>
                        @foreach ($companies as $item)
                        <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-input-field type="text" name="number" label="Offerte nummer"></x-input-field>
                <x-textarea name="desc" label="Inhoud"></x-textarea>
                <x-input-img name="file" label="Document"></x-input-img>
                <div class="my-3 d-flex flex-row-reverse ">
                    <input type="submit" class="btn btn-primary" value="aanmaken">
                    <a href=" {{ route('quotes.index') }} " class="btn btn-link">Ga Terug</a>
                </div>

            </form>
        </div>
    </div>
    @section('scripts')
    <script>
        $(document).ready(function() {
            $('#company').select2();
        });
        ClassicEditor
            .create(document.querySelector('#desc'))
            .catch(error => {
                console.error(error);
            });
    </script>
    @endsection
</x-app-layout>