<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <title>{{ session('regno') == null ? 'Login Required' : 'Edit Order' }}</title>

    <style>
        body {
            margin-top: 0;
            padding-top: 0;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        h1 {
            font-size: 28px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            font-weight: 500;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .img-fluid {
            max-width: 250px;
            max-height: 250px;
        }

        .btn-success {
            background-color: #198754;
            border-color: #198754;
            width: 100%;
        }

        a {
            display: block;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php if(session('regno') == null): ?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="alert alert-warning text-center">
                    <h4> <a href="/login" style="font-family: 'Poppins', sans-serif; ">LOGIN FIRST</a></h4>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="container">
        <h1 style="font-family: 'Poppins', sans-serif; color: #198754;">UPDATE ORDER</h1>

        <?php foreach ($plantitas as $plantita): ?>
        <div class="row">
            <div class="col-md-6">
                <label>Customer Name</label>
                <input type="text" class="form-control"
                    value="{{ $plantita->first_name . ' ' . $plantita->last_name }}" readonly>
            </div>
            <div class="col-md-6">
                <label>Customer Gcash Number</label>
                <input type="text" class="form-control" value="{{ $plantita->gcash_no }}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Customer Gcash Reference Number</label>
                <input type="text" class="form-control" value="{{ $plantita->gcashrefno }}" readonly>
            </div>
            <div class="col-md-6">
                <label>Customer Payment Amount</label>
                <input type="text" class="form-control" value="{{ $plantita->amount }}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label>Order No</label>
                <input type="text" class="form-control" value="{{ $plantita->orderno }}" readonly>
            </div>
            <div class="col-md-4">
                <label>Trans No</label>
                <input type="text" class="form-control" value="{{ $plantita->transno }}" readonly>
            </div>
            <div class="col-md-4">
                <label>Item No</label>
                <input type="text" class="form-control" value="{{ $plantita->itemno }}" readonly>
            </div>
        </div>

        <label>Image</label>
        <div class="d-flex justify-content-center">
            <img class="img-fluid" src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image">
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Description</label>
                <input type="text" class="form-control" value="{{ $plantita->itemdesc }}" readonly>
            </div>
            <div class="col-md-6">
                <label>Price</label>
                <input type="text" class="form-control" value="{{ $plantita->price }}" readonly>
            </div>
        </div>

        <form action="{{ $plantita->transno }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label>Status</label>
                    <select class="form-select" name="status">
                        <option value="Processing" {{ $plantita->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                        <option value="Cancelled" {{ $plantita->status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                        <option value="Completed" {{ $plantita->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Pending Shipment" {{ $plantita->status == 'Pending Shipment' ? 'selected' : '' }}>Pending Shipment</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks" rows="2">{{ $plantita->remarks }}</textarea>
                </div>
            </div>

            <br>

            <input type="submit" class="btn btn-success" value="UPDATE">
        </form>

        <a href="javascript:void(0);" onclick="history.back();" class="btn btn-secondary" style="width: 100%">CANCEL</a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
