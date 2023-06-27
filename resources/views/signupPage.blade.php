<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 2rem;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
        }

        .form-label {
            font-weight: 700;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>

    <title>Signup</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div>
                        <h1>Register</h1>
                    </div>
                    <form action="signup" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        placeholder="Enter First name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control"
                                        placeholder="Enter Last name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder="Enter Address" value="{{ old('address') }}">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="userBirthday" class="form-label">Birthday</label>
                            <input type="date" name="userBirthday" id="userBirthday" class="form-control"
                                value="{{ old('userBirthday') }}">
                            @error('userBirthday')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gcashno" class="form-label">Gcash Number</label>
                                    <input type="text" name="gcashno" id="gcashno" class="form-control"
                                        placeholder="Enter Gcash Number" value="{{ old('gcashno') }}">
                                    @error('gcashno')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="usertype" class="form-label">User Type</label>
                                    <select name="usertype" id="usertype" class="form-control">
                                        <option value=""></option>
                                        <option value="customer" {{ old('usertype') == 'customer' ? 'selected' : '' }}>
                                            Customer</option>
                                        <option value="seller" {{ old('usertype') == 'seller' ? 'selected' : '' }}>Seller
                                        </option>
                                    </select>
                                    @error('usertype')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Enter Username" value="{{ old('username') }}">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Enter Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password2" class="form-label">Confirm Password</label>
                                    <input type="password" name="password2" id="password2" class="form-control"
                                        placeholder="Confirm Password">
                                    @error('password2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="REGISTER" name="create" class="btn btn-primary"
                                style="width: 100%; background-color: #198754; border-color: transparent;">
                        </div>
                    </form>
                    <center><a href="/login" style="color: #198754">Already have an account?</a></center>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
