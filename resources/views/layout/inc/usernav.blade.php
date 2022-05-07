<nav class="navbar navbar-expand-lg navbar-light" id="mainNav" style="background-color: #000000;
background-image: linear-gradient(147deg, #000000 0%, #04619f 74%); margin:10px; padding:10px; ">
    <div class="container px-4 px-lg-5 " >
        <a class="navbar-brand" href="index.html" style="color:#fff">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('/') }}"   style="color:#fff">HOME</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('user-dashboard') }}"   style="color:#fff">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('create-post')}}"   style="color:#fff">Create Post</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('/logout') }}"  style="color:#fff"><i class="right fas fa-gear"></i>Setting</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('/logout') }}"  style="color:#fff">Logout</a></li>

            </ul>


        </div>
    </div>
    {{-- <a  class="nav-link px-lg-3 py-3 py-lg-4" style="float: left; margin:20px; height:20px; display:flex; justify-content:center; align-items:center;">Logout</a> --}}
</nav>
