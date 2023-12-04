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
                <h3 class="card-title">Gebruikers koppelen</h3>
                <button class="btn btn-primary h-100 " data-bs-toggle="modal" data-bs-target="#exampleModal">Nieuwe
                    gebruiker</button>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.edit', $company) }}">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">Gebruikers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.guotes', $company) }}">Offertes</a>
                </li>
            </ul>
            <div class="mt-3">
                <table class="table card-body mb-0 table-striped ">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Rol</th>
                            <th>Telefoonnummer</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companyUsers as $item)
                            <tr>
                                <td>
                                    <p>{{ ucfirst($item->name) }}</p>
                                </td>
                                <td>
                                    <?php
                                    $role = App\Models\Role::find($item->pivot->role_id);
                                    ?>
                                    <p>{{ ucfirst($role->name) }}</p>
                                </td>

                                <td>
                                    <p>{{ ucfirst($item->phone) }}</p>
                                </td>
                                <td>
                                    <p>{{ ucfirst($item->email) }}</p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-evenly  ">
                                        <a
                                            href="{{ route('companies.users.edit', [
                                                'company' => $company,
                                                'user' => $item,
                                            ]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </a>
                                        <form method="POST"
                                            action="{{ route('companies.users.destroy', [
                                                'company' => $company,
                                                'user' => $item,
                                            ]) }}"
                                            onsubmit="return confirm('weet je het zeker om deze te verwijderen')">
                                            @csrf
                                            <button type="submit" class="link-danger border-0 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p class="text-center">Geen gebruikers gevonden</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nieuwe gebruiker</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('companies.users.add', $company) }}">
                        @csrf
                        @method('post')
                        <div class="modal-body">
                            <label for="user">Gebruiker</label>
                            <select id="user" style="width: 100%" name="user" class="form-control">
                                @foreach ($selectUsers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <label for="role">Rol</label>
                            <select id="role" name="role" class="form-control">
                                @foreach ($allRoles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="opslaan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @section('scripts')
            <script>
                $(document).ready(function() {
                    $('#user').select2({
                        dropdownParent: $('#exampleModal')
                    });
                });
            </script>
        @endsection
</x-app-layout>
