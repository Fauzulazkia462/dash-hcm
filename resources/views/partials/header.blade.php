<nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top affix" data-offset-top="20">
    <div class="container">
        <a class="navbar-brand" href="/"><strong class="text-primary">HCM</strong><span class="text-light"> DASHBOARD</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                @php
                    $email = Auth::user()->email;
                @endphp
                @if ($email == 'anis.febrina@inacofood.com')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Admin</a>
                    </li>
                @endif
                <li class="nav-item">
                    <form id="logout" action="/logout" method="POST">
                        @csrf
                        <a class="nav-link" href="javascript:;" onclick="document.getElementById('logout').submit();">Logout</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
