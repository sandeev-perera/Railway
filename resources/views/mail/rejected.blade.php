<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Application Rejected</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f3f4f6;
      text-align: center;
    }

    .card {
      background-color: white;
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      max-width: 500px;
      margin: 50px auto;
    }

    .title {
      font-size: 22px;
      font-weight: bold;
      color: #1f2937;
      margin-bottom: 16px;
    }

    .message {
      font-size: 16px;
      color: #4b5563;
      margin-bottom: 24px;
      line-height: 1.6;
    }

    ul {
      text-align: left;
      display: inline-block;
      margin: 0 auto 24px;
      padding-left: 20px;
    }

    li {
      font-size: 15px;
      color: #374151;
      margin-bottom: 8px;
    }

    .footer {
      font-size: 14px;
      color: #6b7280;
    }
  </style>
</head>
<body>

  <div class="card">
    <p class="title">Dear {{ $applicant->full_name }},</p>

    <p class="message">We regret to inform you that your application has been rejected due to the following reason(s):</p>

    <ul>
      @foreach($reasons as $reason)
          <li>{{ $reason }}</li>
      @endforeach
    </ul>

    <p class="message">If you have any questions, feel free to contact us for clarification.</p>

    <p class="footer">Best regards,<br>Admin Team</p>
  </div>

</body>
</html>
