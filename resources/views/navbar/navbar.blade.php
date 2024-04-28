<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="{{url('/user/dashboard')}}" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    {{-- <form class="d-none d-md-flex ms-4">
        <input class="form-control bg-dark border-0" type="search" placeholder="Search">
    </form> --}}
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#projectModal">
            New Project
        </button>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link" onclick="toggleDropdown()">
                <img class="rounded-circle me-lg-2" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Eo_circle_red_white_letter-c.svg/1024px-Eo_circle_red_white_letter-c.svg.png" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }}</span>
            </a>
            <div id="dropdownMenu" class="dropdown-menu bg-secondary border-0 rounded-0 rounded-bottom m-0" style="display: none;">
                <p href="#" class="dropdown-item">{{ auth()->user()->name }}</p>
                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
            </div>
        </div>                
    </div>
</nav>

<script>
    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
    }
</script>

