@include('layouts.links');

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- MDBootstrap (optional) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/5.1.3/css/mdb.min.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .header-img {
            border-radius: 20px 20px 0 0;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            display: none;
            /* Initially hidden */
        }
    </style>
</head>

<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card col-lg-6">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                class="card-img-top header-img" alt="Registration Image">
            <div class="card-body">
                <h3 class="text-center mb-4">Login</h3>
                <form id="registrationForm" action="{{ route('logingIn') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                  <div class="text-center mt-3">
                <p>Not Have an account? <a href="{{ route('register') }}" class="btn btn-link">Signup</a></p>
            </div>
            </div>
        </div>
    </div>

</body>
<script>
                                                                                                        document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
</script>
</html>
