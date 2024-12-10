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
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .header button:hover {
            background-color: #45a049;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            color: #777;
        }
        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .phone-input, .marital-status {
            cursor: pointer;
        }
        /* Disable button if not attended */
        .disabled {
            background-color: #ccc;
            pointer-events: none;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <!-- Header -->
    <div class="header">
        <h1>Member Attendance Management</h1>
        <p>Manage attendance and update member details for the event.</p>

        <a href="{{ route('attendance.new') }}" class="btn">Register New Member</a>
    </div>

    <!-- DataTable for Members -->
    <div class="member-list">
        <table id="memberTable" class="display">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Marital Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr id="member-{{ $member->id }}">
                        <td>{{ $member->firstname }} {{ $member->lastname }}</td>
                        <td>
                            <!-- Phone number input field (always editable) -->
                            <form action="{{ route('attendance.update', $member->id) }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" name="phone_number" value="{{ $member->phone_number }}" placeholder="Enter phone number..." />
                        </td>
                        <td>
                            <!-- Marital status dropdown (always editable) -->
                            <select name="marital_status" required class="form-control">
                                <option value="">Select Marital Status</option>
                                @foreach($maritalStatuses as $status)
                                    <option value="{{ $status->id }}" 
                                            {{ $member->marital_status == $status->id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <!-- Update Button to submit the form -->
                            <button type="submit" class="btn">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <a href="{{ url('/') }}" class="btn">Back to Dashboard</a>
    </div>
</div>

<!-- DataTable and jQuery Scripts -->
<script src="jquery.js"></script>
<script src="datatable.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#memberTable').DataTable();
    });
</script>

</body>
</html>
