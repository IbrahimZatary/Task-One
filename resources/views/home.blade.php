<!DOCTYPE html>
<html>
<head>
    <title>Eco System  @yield('title')</title>
    <style>
        /* YOUR EXISTING STYLES HERE - keep all your gradient CSS */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }
        /* ... keep all your existing CSS ... */
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <h1> Eco System</h1>
                <nav>
                    @if(session('user_name'))
                        <!-- Admin Navigation (only for Ibraheem) -->
                        <a href="{{ route('categories.index') }}">Categories</a>
                        <a href="{{ route('products.index') }}">All Products</a>
                        
                        <!-- Logout Form -->
                        <form action="{{ route('simple.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="
                                background: none;
                                border: none;
                                color: #00000;
                                cursor: pointer;
                                font: inherit;
                                padding: 10px 20px;
                            ">Logout ({{ session('user_name') }})</button>
                        </form>
                    @else
                        <!-- Not logged in -->
                        <a href="{{ route('simple.login') }}">Login</a>
                    @endif
                </nav>
            </div>
        </div>
    </header>

    <div class="container main-content">
        @if(session('success'))
            <div class="alert">
                ✓ {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>