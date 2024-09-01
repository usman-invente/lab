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
            display: none; /* Initially hidden */
        }
    </style>
</head>
<body>

<div class="container vh-50 d-flex justify-content-center align-items-center">
    <div class="card col-md-6"> <!-- Changed col-md-6 to col-md-4 -->

        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="card-img-top header-img" alt="Registration Image">
        <div class="card-body">
            <h3 class="text-center mb-4">Sign Up</h3>
            <form id="registrationForm" action="{{ route('registering') }}" method="POST">
                @csrf 
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
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
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                            <i class="fas fa-eye" id="confirmEyeIcon"></i>
                        </button>
                    </div>
                    <span id="passwordError" class="error-message">Passwords do not match!</span>
                </div>
                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">I agree to the <a href="#">terms of service</a></label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <div class="text-center mt-3">
                <p>Already have an account? <a href="{{ route('login') }}" class="btn btn-link">Log In</a></p>
            </div>
        </div>
    </div>
</div>


        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script>
    // Toggle password visibility
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

    document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const confirmEyeIcon = document.getElementById('confirmEyeIcon');
        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
            confirmEyeIcon.classList.remove('fa-eye');
            confirmEyeIcon.classList.add('fa-eye-slash');
        } else {
            confirmPasswordInput.type = 'password';
            confirmEyeIcon.classList.remove('fa-eye-slash');
            confirmEyeIcon.classList.add('fa-eye');
        }
    });

    // Real-time password match validation
    document.getElementById('confirmPassword').addEventListener('input', function () {
        const password = document.getElementById('password').value;
        const confirmPassword = this.value;
        const errorMessage = document.getElementById('passwordError');
        
        if (confirmPassword && password !== confirmPassword) {
            errorMessage.style.display = 'block'; // Show the error message
        } else {
            errorMessage.style.display = 'none'; // Hide the error message
        }
    });
// JavaScript for form handling and final password match validation
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorMessage = document.getElementById('passwordError');

    if (password !== confirmPassword) {
        errorMessage.style.display = 'block'; // Show the error message
        event.preventDefault(); // Prevent form submission
    } else {
        errorMessage.style.display = 'none'; // Hide the error message
        // The form will be submitted automatically since we don't prevent it.
    }
});

</script>
</body>
</html>
