<?php

if (session('regno') == null) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Login Required</title>
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="alert alert-warning text-center">
                        <h4> <a href="/login" style="font-family: 'Poppins', sans-serif; ">LOGIN FIRST</a></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f8f9fa;
            }

            .container {
                width: 50%;
            }

            .text-center {
                font-size: 36px;
                font-weight: 700;
            }

        </style>

        <title>Edit My Account</title>
    </head>

    <body>

        <br><br>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h1 class="text-center mb-4">EDIT ACCOUNT DETAILS</h1>
                    </center>

                    @foreach ($users as $user)
                    <form action="{{ $user->regno }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name"
                                        placeholder="Input First name" value="{{ $user->first_name }}">
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name"
                                        placeholder="Input Last name" value="{{ $user->last_name }}">
                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Input Address" value="{{ $user->address }}">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" class="form-control" id="birthday" name="userBirthday"
                                        value="{{ \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}">
                                    @error('userBirthday')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gcashNo">Gcash Number</label>
                                    <input type="text" class="form-control" id="gcashNo" name="gcashno"
                                        placeholder="Input Gcash Number" value="{{ $user->gcash_no }}">
                                    @error('gcashno')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Input Username" value="{{ $user->username }}">
                                    @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password2">Confirm Password</label>
                                    <input type="password" class="form-control" id="password2" name="password2"
                                        placeholder="Enter Password">
                                    @error('password2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary"
                            style="width: 100%; background-color: #198754; border-color: transparent;">Update
                            Credentials</button>
                    </form>
                    <br>
                    <a href="javascript:void(0);" onclick="history.back();" class="btn btn-danger"
                        style="width: 100%; border-color: transparent;">Cancel</a>
                    @endforeach
                </div>
            </div>
        </div>
    </body>


    </html>
    <?php

}

?>
