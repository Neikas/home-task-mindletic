<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
<h1>Appointment Confirmed</h1>
<p>Dear {{ $client_name }},</p>
<p>Your appointment has been successfully booked.</p>
<p><strong>Start Time:</strong> {{ $start_time }}</p>
<p><strong>End Time:</strong> {{ $end_time }}</p>
<p>Thank you for choosing our service!</p>
</body>
</html>
