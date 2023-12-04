<x-app-layout>
    <x-row-table h1='Rollen' add='rol' form="roles"> </x-row-table>
    <div class="row card">
        <table class="table table-striped mb-0 ">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $item)
                    <tr>
                        <td class="p-2">
                            {{ ucfirst($item->name) }}
                        </td>
                        <x-table-icon form="roles" item={{ $item }}></x-table-icon>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <p class="text-center">Geen rollen gevonden</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Rol Toevoegen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <x-input-field type="text" name="name" label="Naam"></x-input-field>
                        <button type="submit" class="btn btn-primary">Toevoegen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
