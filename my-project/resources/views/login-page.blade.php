<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon.svg') }}">
    <link rel="shortcut icon" href="{{ asset('assets/image/favicon.svg') }}" type="image/svg+xml">    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R Manager - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
            background-color: rgba(0, 0, 0, 0.2); /* Layer gelap semi-transparan */
            z-index: -1;
        }
    </style>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 border-0 shadow-lg w-100" style="max-width: 400px;">
            <div class="card-body">
    
                <!-- Logo Centered -->
                <div class="text-center mb-4">
                    <svg width="200" height="60" viewBox="0 0 200 60" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <!-- Monitor Icon -->
                        <rect x="5" y="5" width="40" height="30" rx="3" ry="3" fill="#2d89ef"/>
                        <rect x="10" y="10" width="30" height="20" rx="1.5" ry="1.5" fill="white"/>
                        <rect x="18" y="37" width="14" height="3" fill="#2d89ef" rx="1"/>
                        <rect x="16" y="40" width="18" height="2" fill="#444"/>
                      
                        <!-- Text -->
                        <text x="60" y="28" font-family="Verdana, sans-serif" font-size="22" fill="#222" font-weight="bold">TechSector</text>
                        <text x="60" y="45" font-family="Verdana, sans-serif" font-size="10" fill="#888">Komputer & Aksesoris</text>
                      </svg>
                      
                </div>
    
                <h2 class="card-title text-center mb-4">Login</h2>
    
                <form>
                    @csrf
    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control border-0 border-bottom rounded-0" id="email" placeholder="Enter your email ( john@example.com )" required>
                    </div>
    
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control border-0 border-bottom rounded-0" id="password" placeholder="Enter your password" required>
                            <span class="input-group-text bg-transparent border-0 border-bottom rounded-0" onclick="togglePassword()" style="cursor: pointer;">
                                <i id="togglePasswordIcon" class="fa fa-eye"></i>
                            </span>
                        </div>
                    </div>
    
                    <button type="button" class="btn btn-primary w-100 mt-3" onclick="login()">Login</button>
                </form>
    
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-loading-overlay@1.2.0/dist/js-loading-overlay.min.js"></script>
    <script defer>
        var app_url = "{{ env('APP_URL') }}";

        function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePasswordIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}
async function login(){
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!email.value.trim()) {
    toastr.error("Kolom email tidak boleh kosong");
    email.focus();
    return false;
    }

    if (!emailPattern.test(email.value.trim())) {
    toastr.error("Format email tidak valid");
    email.focus();
    return false;
    }

    if (!password.value.trim()) {
    toastr.error("Kolom password tidak boleh kosong");
    password.focus();
    return false;
    }
    JsLoadingOverlay.show({ "spinnerIcon": "ball-spin" });
    await fetch(app_url + "/api/auth/login", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        body: JSON.stringify({
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,
        })
    })
    .then(async (response) => {
        JsLoadingOverlay.hide();
        const res = await response.json();
        
        if(response.status === 200){
            localStorage.setItem('token', res.token);
            window.location.href = app_url + "/dashboard"; // <-- redirect here
        }else if(response.status === 400){
            toastr.error(res.message || 'Invalid email or password'); // <-- show error here
        }else{
            toastr.error('Something went wrong');
        }
    })
    .catch((error) => {
        JsLoadingOverlay.hide();
        console.log(error);
        toastr.error('Connection error');
    });
}

    </script>
</body>
</html>
