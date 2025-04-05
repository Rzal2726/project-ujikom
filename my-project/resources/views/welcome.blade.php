<!doctype html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="favicon.png">
        <title>RL Manager - Dashboard</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <style>
            html, body {
                height: 100%;
                margin: 0;
            }
            .wrapper {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
            .main-content {
                flex: 1;
            }
        </style>
    
        @yield('modal')
        <header>
            @yield('navbar')
        </header>

        <main class="wrapper">
            @yield('content') 
        </main>
        <footer class="bg-dark text-light text-center py-3">
            <div class="container text-center text-md-start">
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-md-4">
                        <h5>Aplikasi</h5>
                        <p>Building the future, one line of code at a time.</p>
                    </div>
                    <!-- Column 2 -->
                    <div class="col-md-4">
                        <h5>Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">Home</a></li>
                            <li><a href="#" class="text-light text-decoration-none">About</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Column 3 -->
                    <div class="col-md-4">
                        <h5>Follow Us</h5>
                        <a href="#" class="text-light me-2"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="text-light me-2"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="text-light"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <!-- Bottom text -->
                <div class="text-center mt-3">
                    <p class="mb-0">&copy; 2025 Aplikasi. All rights reserved.</p>
                </div>
            </div>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/js-loading-overlay@1.2.0/dist/js-loading-overlay.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            var app_url = "{{ env('APP_URL') }}";
            console.log(app_url); // Check in browser console
        </script>
        @yield('script')
    </body>
</html>
