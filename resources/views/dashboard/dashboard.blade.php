<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{auth()->user()->name}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
        .embed-responsive-iframe {
            max-width: 100%;
            max-height: 100%;
            
        }
    </style>
    <style>
        /* Style to make iframe fullscreen */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        
        iframe {
            position: absolute;
            top: 7.5%;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
    
    
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{url('/users/dashboard')}}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>{{auth()->user()->name}}</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Eo_circle_red_white_letter-c.svg/1024px-Eo_circle_red_white_letter-c.svg.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{auth()->user()->name}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{url('/users/dashboard')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{url('/users/chart')}}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('navbar.navbar')
            <!-- Navbar End -->
            <!-- Button to trigger modal -->

            <!-- Button to trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background: rgb(65, 65, 65);">
                                <h5 class="modal-title" id="projectModalLabel">New Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="background-color: rgb(65, 65, 65);">
                                <!-- Form -->
                                <form action="{{ url('/users/dashboard') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label text-white fw-bold">Project Name:</label>
                                        <input type="text" id="name" name="name" class="form-control text-white fw-bold" placeholder="Enter Project Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="button_one" class="form-label text-white fw-bold">Choose Button Url (Optional):</label>
                                        <input type="file" id="button_one" name="button_one" class="form-control text-white fw-bold" placeholder="Enter Button Url">
                                    </div>
                                    <div class="mb-3">
                                        <label for="button_two" class="form-label text-white fw-bold">Choose Button Url (Optional):</label>
                                        <input type="file" id="button_two" name="button_two" class="form-control text-white fw-bold" placeholder="Enter Button Url">
                                    </div>
                                    <div class="mb-3">
                                        <label for="button_three" class="form-label text-white fw-bold">Choose Button Url (Optional):</label>
                                        <input type="file" id="button_three" name="button_three" class="form-control text-white fw-bold" placeholder="Enter Button Url">
                                    </div>
                                    <div class="mb-3">
                                        <label for="button_four" class="form-label text-white fw-bold">Choose Button Url (Optional):</label>
                                        <input type="file" id="button_four" name="button_four" class="form-control text-white fw-bold" placeholder="Enter Button Url">
                                    </div>
                                    <div class="mb-3">
                                        <label for="background_image" class="form-label text-white fw-bold">Choose Background Image Url (Optional):</label>
                                        <input type="file" id="background_image" name="background_image" class="form-control text-white fw-bold" placeholder="Enter Image Url">
                                    </div>
                                    <div class="mb-3">
                                        <label for="background_phone" class="form-label text-white fw-bold">Choose Background Image Phone (Optional):</label>
                                        <input type="file" id="background_phone" name="background_phone" class="form-control text-white fw-bold" placeholder="Enter Image Url">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row row-cols-1 row-cols-md-4 g-4" style="padding: 30px;">
                        @foreach ($data as $item)
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('storage/' . $item->background_image) }}" class="card-img-top" alt="Skyscrapers" />
                                <div class="card-body">
                                    <h3 class="card-title text-dark text-center" style="font-weight: 900;">{{$item->name}}</h3>
                                    {{-- <p class="card-text">{{$item->description}}</p> --}}
                                    <div class="d-flex justify-content-center mt-3">
                                        <!-- Update button -->
                                        <a href="" class="btn me-2 btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal{{ $item->id }}" style="padding: 15px; font-size: 15px; font-weight: 900;"><i class="fa-solid fa-wrench fa-bounce fa-2xl"></i></a>

                                        <div class="modal fade" id="updateModal{{ $item->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: rgb(59, 59, 59)">
                                                        <h5 class="modal-title" id="updateModalLabel{{ $item->id }}">Update Project</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" style="background: rgb(59, 59, 59)">
                                                        <form action="{{ url('/users/dashboard/' . $item->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT') <!-- This is necessary for Laravel to recognize it as an update request -->
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label text-white fw-bold">Project Name:</label>
                                                                <input type="text" id="name" name="name" class="form-control text-white fw-bold" placeholder="Enter Project Name" value="{{$item->name}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="button_one" class="form-label text-white fw-bold">Choose Button Url (Optional):</label>
                                                                <input type="file" id="button_one" name="button_one" class="form-control text-white fw-bold text-dark" style="color: black;" placeholder="Enter Button Url" value="{{$item->button_one}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="button_two" class="form-label text-white fw-bold">Choose Button Url (Optional):</label>
                                                                <input type="file" id="button_two" name="button_two" class="form-control text-white fw-bold text-dark" style="color: black;" placeholder="Enter Button Url" value="{{$item->button_two}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="button_three" class="form-label text-white fw-bold">Choose Button Url (Optional):</label>
                                                                <input type="file" id="button_three" name="button_three" class="form-control text-white fw-bold text-dark" style="color: black;" placeholder="Enter Button Url" value="{{$item->button_three}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="button_four" class="form-label text-white fw-bold">Choose Button Url (Optional):</label>
                                                                <input type="file" id="button_four" name="button_four" class="form-control text-white fw-bold text-dark" style="color: black;" placeholder="Enter Button Url" value="{{$item->button_four}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="background_image" class="form-label text-white fw-bold">Choose Background Image Url (Optional):</label>
                                                                <input type="file" id="background_image" name="background_image" class="form-control text-white fw-bold" placeholder="Enter Image Url">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="background_phone" class="form-label text-white fw-bold">Choose Background Image Phone (Optional):</label>
                                                                <input type="file" id="background_phone" name="background_phone" class="form-control text-white fw-bold" placeholder="Enter Image Url">
                                                            </div>                        
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <a href="{{ url('/users/dashboard/live-server', ['projectId' => $item->id]) }}" target="_blank" class="btn me-2 btn-info" style="padding: 15px; font-size: 15px; font-weight: 900;"><i class="fa-solid fa-server fa-bounce fa-2xl"></i></a>
                                        <!-- Delete button -->
                                        <form action="{{ url('users/dashboard/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="padding: 15px; font-size: 15px; font-weight: 900;"><i class="fa-solid fa-trash fa-bounce fa-2xl"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        <!-- Content End -->
</div>


    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
