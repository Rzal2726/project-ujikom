<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R Manager - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 border-0 shadow-lg" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-2"></div>
                    <div class=" col-8 navbar-brand fw-bold text-white text-center border border-primary bg-primary bg-gradient border-5 rounded p-2" href="#"><i class="fa fa-tachometer-alt"></i> RL Products Manager</div>
                    <div class="col-2"></div>
                </div>

                <h2 class="card-title text-center mb-4">Login</h2>
                
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control border-0 border-bottom" id="email" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control border-0 border-bottom" id="password" placeholder="Enter your password" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                        </div>
                        <a href="#" class="text-decoration-none">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
                </form>

                <p class="text-center mt-3">Don't have an account? <a href="#" class="text-primary">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
