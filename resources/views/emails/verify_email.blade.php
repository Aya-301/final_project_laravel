<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <div>
        <h1>Email Verification</h1>
        <p>Please click the following link to verify your email:</p>
        <a href="{{$user->verification_url }}">{{ $user->verification_url }}</a>
    </div>
</body>
</html>
