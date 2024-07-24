<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #FF6347;
        }
        p {
            font-size: 18px;
            color: #333;
        }
        .button {
            background-color: #FF6347;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
        .button:hover {
            background-color: #E55347;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Error!</h1>
        <p><?php echo htmlspecialchars($_GET['message']); ?></p>
        <a href="signin.html" class="button">Click Here To Login</a>
    </div>
</body>
</html>
