<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Dashboard - Attendance</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- DataTable CSS -->
    <link href="datatable.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 600px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2rem;
            color: #333;
        }

        .header p {
            font-size: 1rem;
            color: #666;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 1rem;
            color: #333;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
        }

        .footer .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
        }

        .footer .btn:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            .header h1 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="header">
        <h1>Register New Member</h1>
        <p>Please fill in the details below to register a new member.</p>
    </div>

    <!-- Registration Form -->
    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>
        </div>

        <div class="form-group">
            <label for="marital_status">Marital Status:</label>
            <select id="marital_status" name="marital_status" required>
                <option value="">Select Marital Status</option>
                @foreach($maritalStatuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit">Register Member</button>
        </div>
    </form>
</div>

<!-- Footer -->
<div class="footer">
   <div class="form-group">
   <a href="{{ url('/') }}" class="btn">Back to Dashboard</a>
   </div>
</div>

</body>
</html>
