<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Thank you for registering with us. We're excited to have you on board.</p>
    <p>Your registered email is: {{ $user->email }}</p>
    <p>If you have any questions, feel free to reach out to us.</p>
    <p>Best regards,<br>The Team</p>
</body>
</html>
