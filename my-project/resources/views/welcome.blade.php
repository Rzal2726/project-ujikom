<!doctype html>
<html lang="en">
    <head>
        <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon.svg') }}">
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/svg+xml">
        <title>TechSector - Dashboard</title>
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
        <!-- Select2 Core CSS -->

        <!-- Select2 Bootstrap 4 Theme -->
        <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

    </head>

    <body>
        <style>
            html, body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            width: 100%;
            overflow-x: hidden;
            position: relative;
            }

            body::before {
                content: "";
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url('{{ asset('assets/images/background.jpg') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                z-index: -2;
            }

            body::after {
                content: "";
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Layer gelap semi-transparan */
                z-index: -1;
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
            <!-- Profile Modal -->
            <div class="modal fade" id="modalProfile" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" 
            aria-labelledby="modalTitleId" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-3">
                    
                    <!-- Modal Header -->
                    <div class="modal-header bg-light border-0">
                        <h5 class="modal-title fw-bold" id="modalTitleId">Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal Form -->
                    <form>
                        <div class="modal-body px-4">
                            <div class="mb-3">
                                <label for="inputId" class="form-label fw-semibold">Name</label>
                                <input type="text" class="form-control rounded" id="profil-name" name="id" placeholder="Enter Name" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="inputName" class="form-label fw-semibold">Email</label>
                                <input type="text" class="form-control rounded" id="profil-email" name="name" placeholder="Enter Email" readonly> 
                            </div>  
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer border-0 px-4 pb-4">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
            </div>
            @yield('content') 
        </main>
        <footer class="bg-dark text-light py-4 mt-auto">
            <div class="container">
                <div class="row text-center text-md-start align-items-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5 class="fw-bold">TechSector</h5>
                        <p class="mb-0 small">Building the future, one line of code at a time.</p>
                    </div>
    
                    <div class="col-md-4 mb-3 mb-md-0 d-none d-md-block">
                        <!-- Spacer -->
                    </div>
    
                    <div class="col-md-4">
                        <h5 class="fw-bold">Follow Us</h5>
                        <a href="https://www.instagram.com/rzplayem2726/" class="text-light fs-4">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
    
                <div class="border-top mt-3 pt-3 text-center small">
                    &copy; 2025 TechSector. All rights reserved.
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
        
        @php
        $currentRoute = Route::currentRouteName();
        @endphp

        <script>
            var app_url = "{{ env('APP_URL') }}";
            let user_profile;
            async function checkAuth() {
                const token = localStorage.getItem('token');
                if (!token) {
                    window.location.href = app_url + "/"; // redirect to login
                }

                await fetch(app_url + "/api/auth/check", {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                })
                .then(response => {
                    if(response.status == 200){
                        return response.json();  // parse json if 200
                    } else {
                        throw new Error('Invalid Token');
                    }
                })
                .then(data => {
                    user_profile = data.user;  // store user data
                    localStorage.setItem('user-data', JSON.stringify(user_profile))
                    document.getElementById('profil-name').value = user_profile['name']
                    document.getElementById('profil-email').value = user_profile['email']
                    if(user_profile.level_id != 2){
                        
                        // Ini untuk halaman home-screen
                        @if ($currentRoute === 'home-screen')
                        const userCard = document.getElementById('user-card');
                        if (userCard) {
                            userCard.classList.add('d-none');
                        }
                        @endif
                        @if ($currentRoute === 'transaksi-screen')
                        const userCard = document.getElementById('tgl-input');
                        if (userCard) {
                            userCard.classList.add('d-none');
                        }
                        @endif
                    }else{
                        document.getElementById('user-nav').classList.remove('d-none');
                    }
                })
                .catch(error => {
                    console.log(error)
                });
            }
            async function logout(){
                const token = localStorage.getItem('token');

                const response = await fetch(app_url + "/api/auth/logout", {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                });

                if(response.status === 200){
                    localStorage.removeItem('token'); 
                    window.location.href = app_url + "/"; // redirect to login
                }else{
                    toastr.error("Logout gagal");
                }
            }
            // call this on every protected page
            checkAuth();
        </script>

        @yield('script')

    </body>
</html>
