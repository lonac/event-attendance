<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Dashboard - Home</title>
    <link rel="stylesheet" href="awesome.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f3f4; /* Light Gray Background */
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .summary {
            display: flex;
            justify-content: space-around;
            margin-bottom: 40px;
        }
        .summary div {
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            text-align: center;
            color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .total-members {
            background-color: #3b9b9b; /* Soft teal */
        }
        .total-attended {
            background-color: #4caf50; /* Bright green */
        }
        .total-not-attended {
            background-color: #f44336; /* Red */
        }
        .marital-status-summary {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
            padding: 20px 0;
            border-top: 1px solid #ddd;
        }
        .marital-status-summary div {
            padding: 15px;
            width: 30%;
            text-align: center;
            font-size: 18px;
            background-color: #eceff1;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .single {
            background-color: #2196f3; /* Blue */
            color: white;
        }
        .married {
            background-color: #ff9800; /* Orange */
            color: white;
        }
        .divorced {
            background-color: #9c27b0; /* Purple */
            color: white;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            color: #777;
        }
        .btn {
            padding: 12px 25px;
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }
        .btn:hover {
            background-color: #45a049;
        }
        .footer p {
            color: #888;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Dashboard Header -->
    <div class="header">
        <h1>Event Attendance Dashboard</h1>
        <p>Summary of member attendance for the upcoming event.</p>
    </div>

    <!-- Summary Section -->
    <div class="summary">
        <div class="total-members">
            <h3>Total Members Planned</h3>
            <p id="totalPlanned">{{ $totalMembers }}</p>
        </div>
        <div class="total-attended">
            <h3>Total Attended</h3>
            <p id="totalAttended">{{ $attendedMembers }}</p>
        </div>
        <div class="total-not-attended">
            <h3>Total Not Attended</h3>
            <p id="totalNotAttended">{{ $notAttendedMembers }}</p>
        </div>
    </div>

    <!-- Marital Status Summary Section -->
    <div class="marital-status-summary">
        @foreach($maritalStatuses as $status)
        @php 
            $data = $marital_data->where('id',$status->marital_status)->first();
        @endphp
            <div class="{{ strtolower($status->marital_status) }}">
                <h3> @if($data)  {{$data->name??''}} @else <i>Not Set @endif </i> </h3>
                <p>{{ $status->count }}</p>
            </div>
        @endforeach
    </div>

    <!-- Link to Member/Attendance Page -->
    <a href="{{ route('attendance.create') }}" class="btn">Manage Members & Attendance</a>
    <form action="{{ route('attendance.download') }}" method="POST">
        @csrf 
        <button class="btn btn-sm btn-info" >Excel</button>
    </form>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 Event Dashboard. All rights reserved.</p>
</div>

</body>
</html>
