<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('/storage/hhh.avif'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .login-container {
            background-color: white; 
            padding: 70px;
            border-radius: 20px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px; 
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="storage/love.png" alt="Logo" class="logo" style="width:100px; height:60px;"> 
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="name" name="name" class="form-control form-control-lg bg-light fs-6 @error('name') is-invalid @enderror">        
                </div>
            <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror">          
            </div>
            <div class="mb-4">
                <label for="phone" class="form-label">Phone Number</label>
              <input type="phone" class="form-control form-control-lg bg-light fs-6 @error('phone') is-invalid @enderror" name="phone">         
             </div>
             <div class="mb-4">
                <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="">Choose Gender...</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>         
             </div>
             <div class="mb-4">
                <label for="address" class="form-label">Address</label>
              <input type="address" class="form-control form-control-lg bg-light fs-6 @error('address') is-invalid @enderror" name="address">         
             </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror" name="password">         
             </div>
             <div class="mb-4">
                <label for="confirm_password" class="form-label"> Confirm Password</label>
              <input type="password" class="form-control form-control-lg bg-light fs-6 @error('confirm_password') is-invalid @enderror" name="confirm_password">
                        
             </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>

         </form> 
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
