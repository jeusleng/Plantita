<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <title>Homepage</title>
    <style>
        body {
            margin-top: 0;
            padding-top: 0;
        }
        
        .logo {
            width: 20%;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <?php if (session('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show">
            <center>
                {{ session('success') }}
            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/customerPage" style="font-family: 'Poppins', sans-serif; color: #198754; font-size:25px;">
                <img src="logo.png" alt="Logo" class="logo">
                |   CUSTOMER
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form action="customerMyAcc" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">My
                                Account</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="customerMarketplaceDirect" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">Browse
                                Marketplace</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="customerMyOrdersDirect" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">My
                                Orders</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <div>
                        <p style="font-family: 'Poppins', sans-serif; color: #198754; font-size:45px;">Welcome to Plantita Ordering System!</p>
                        <p style="font-family: 'Poppins', sans-serif;">We are thrilled to have you join our plant ordering system. 
                        Whether you are a seasoned plant enthusiast or just beginning your 
                        green journey, our platform offers a wide selection of beautiful 
                        plants to explore and order. From lush foliage to vibrant blooms, 
                        you'll discover a variety of options to suit your taste and style. 
                        Our dedicated team is committed to providing a seamless shopping experience, 
                        ensuring that each plant arrives at your doorstep in excellent condition. 
                        Get ready to enhance your living space with the beauty of nature. 
                        Happy browsing and happy planting!
                        </p>
                        <img src="side_image.png" alt="Side Image" style="width: 80%;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
