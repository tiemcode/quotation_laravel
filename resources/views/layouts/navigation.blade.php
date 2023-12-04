<nav class="navbar navbar-expand-lg navbar-light border-bottom  ">
    <div class="container">
        <x-breeze.application-logo class="d-block wi" />


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="ml-auto">
            <div class="d-flex">
                @php use App\Models\User; @endphp
                @auth
                <div class="dropdown">
                    <button class="btn link-primary  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profiel</a>
                        </li>
                        @can('isAdmin', User::class)
                        <li>
                            <a class="dropdown-item" href="{{ route('companies.index') }}">Dashboard</a>
                        </li>
                        @endcan
                        
                        <li>
                            <a class="dropdown-item" href="{{ route('user.index') }}">Mijn bedrijven</a>
                        </li>

                        <li>
                            <!-- Authentication -->
                            <form method="POST" class="dropdown-it" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn text-danger  " :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Uitloggen') }}
                                </button>
                            </form>

                        </li>
                    </ul>
                </div>
                @else
                <a href="{{ route('login') }}" class="text-sm text-decoration-none">Log in</a>
                @endauth
            </div>


        </div>
    </div>
</nav>
