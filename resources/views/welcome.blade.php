<!DOCTYPE html>
<html>
<head>
    <title>Your Role</title>
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
        margin-bottom: 2rem;
    }

    a {
        text-decoration: none;
        color: #000;
        border: 2px solid #000;
        padding: 0.7rem 1.5rem;
        border-radius: 5px;
        margin: 0.5rem 0;
        display: inline-block;
        transition: all 0.3s ease;
    }

    a:hover {
        background-color: #000;
        color: #fff;
    }
</style>
<body>

    <h3>Eco System</h3>
    
    <h1>Select Your Role:</h1>

    <a href="/select-role/admin"> Admin</a>
    <br><br>
    <a href="/select-role/super_admin">Super Admin</a>
    <br><br>
    <a href="/select-role/guest"> As Guest</a>

</body>
</html>