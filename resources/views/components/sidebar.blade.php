<div class="dropdown-menu card">
    <a class=" @if (Route::is('profile.edit')) active @endif dropdown-item"
        href="{{ route('profile.edit') }}">Profiel</a>
    <a class=" @if (Route::is('user.index')) active @endif dropdown-item" href="{{ route('user.index') }}">Mijn
        bedrijven</a>
    @can('isAdmin', Auth::user())
        <a class="dropdown-item
        @if (Route::is('companies.index')) active @endif "
            href=" {{ route('companies.index') }}">Bedrijven</a>
        <a class="  @if (Route::is('roles.index')) active @endif dropdown-item"
            href="{{ route('roles.index') }}">Rollen</a>
        <a class="  @if (Route::is('users.index')) active @endif dropdown-item"
            href="{{ route('users.index') }}">Gebruikers</a>
        <a class="  @if (Route::is('quotes.index')) active @endif dropdown-item"
            href="{{ route('quotes.index') }}">Offertes</a>
    @endcan
    <form method=" POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn text-danger  " :href="route('logout')"
            onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Uitloggen') }}
        </button>
    </form>

</div>
