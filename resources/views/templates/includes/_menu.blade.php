<nav class="navbar navbar-default navbar-fixed-top" id="navbar-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                Gerenciador de Finanças Pessoais
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li id=""><a href=""></a></li>
                <li id=""><a href=""></a></li>
            </ul>
            @if(auth()->check())
            <ul class="nav navbar-nav navbar-right">
                <li id=""><a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form></li>
            </ul>
            @endif   
        </div>
    </div>
</nav>

<style>
    #navbar-top {
        background-color: #23282e;
    }
    .navbar-brand, .navbar-right li a {
        text-decoration: none;
        color: white !important;
    }
</style>
