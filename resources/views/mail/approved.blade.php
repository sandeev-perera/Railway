<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Application Verified</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f3f4f6;
      height: 100vh;
      text-align: center

    }

    .card {
      background-color: white;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 400px;
      width: 100%;
    }

    .checkmark {
      width: 64px;
      height: 64px;
      margin: 0 auto 20px;
      color: #10b981;
    }

    .title {
      font-size: 24px;
      font-weight: bold;
      color: #1f2937;
      margin-bottom: 10px;
    }

    .message {
      font-size: 16px;
      color: #4b5563;
      margin-bottom: 30px;
    }

    .button {
      display: inline-block;
      padding: 12px 24px;
      background-color: blueviolet;
      color: white;
      font-weight: 600;
      text-decoration: none;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }
    .word{
        color: white
    }

  </style>
</head>
<body>

  <div class="card">
    <svg class="checkmark" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
    </svg>

    <div class="title">Application Verified!</div>
    <div class="message">Your application has been successfully verified.<br>You can now sign in to your account.</div>

    <a href="/login">Sign In Now</a>
  </div>

</body>
</html>
