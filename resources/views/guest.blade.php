<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest</title>
</head>
<style>
    body {
        background-color: #fff; 
        color: #000;
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        text-align: center;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }

    a {
        text-decoration: none;
        color: #000;
        border: 2px solid #000;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    a:hover {
        background-color: #000;
        color: #fff;
    }
</style>
<body>
    <h1>You are browsing as Guest</h1>
<p>You cannot access admin pages</p>

{{-- return the guest into role page to select  --}}
<a href="/">Go back</a>

</body>
</html>