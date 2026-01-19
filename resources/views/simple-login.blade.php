<!DOCTYPE html>
<html>
<head>
    <title>Login - Eco System</title>
    <style>
        body { 
            font-family: Arial; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 300px;
        }
        h2 { text-align: center; color: #333; margin-bottom: 30px; }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover { background: #5568d3; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2> Eco System Login</h2>
        
        <!-- CHANGE THIS LINE: use named route -->
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="text" name="name" placeholder="Enter your name" required>
            <button type="submit">Submit</button>
        </form>
        
    </div>
</body>
</html>