<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .email-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .email-body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }

        .email-footer {
            background-color: #f4f4f4;
            color: #777777;
            padding: 15px;
            text-align: center;
            font-size: 12px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Reset Your Password</h1>
        </div>
        <div class="email-body">
            <p>Hi {{ $user->name }},</p>
            <p>We received a request to reset your password. Please click the button below to continue</p>
            <center>
                <a href="{{env('APP_URL')}}/reset-password/{{$token->token}}" class="button">Reset Password</a>
            </center>
            <p>If you didn't request a password reset, you can safely ignore this email. Your password will remain
                unchanged.</p>
            <p>Thanks,<br>The NXLog Team</p>
        </div>
        <div class="email-footer">
            <p>&copy; {{date('Y')}} NXLog. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
