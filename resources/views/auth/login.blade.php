<html>
<head>
<title>Login - Contact Manager</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.auth-container {
    width: 400px;
    background: #ffffff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.auth-container h1 {
    text-align: center;
    color: #4f46e5;
    margin-bottom: 10px;
    font-size: 28px;
}

.auth-container h2 {
    text-align: center;
    color: #333;
    margin-bottom: 25px;
    font-size: 22px;
}

.auth-container label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: bold;
}

.auth-container input {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    outline: none;
    transition: 0.3s;
}

.auth-container input:focus {
    border-color: #667eea;
    box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
}

.auth-container button {
    width: 100%;
    padding: 12px;
    background: #4f46e5;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.auth-container button:hover {
    background: #3730a3;
}

.success {
    background: #d1fae5;
    color: #065f46;
    border: 1px solid #10b981;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 6px;
    text-align: center;
}

.error {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #ef4444;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 6px;
}

.error p {
    margin: 3px 0;
    font-size: 14px;
}

.auth-container p {
    text-align: center;
    margin-top: 20px;
    color: #555;
}

.auth-container a {
    color: #4f46e5;
    text-decoration: none;
    font-weight: bold;
}

.auth-container a:hover {
    text-decoration: underline;
}

@media (max-width: 500px) {
    .auth-container {
        width: 90%;
        padding: 30px 25px;
    }
}
</style>
</head>
<body>
<div class="auth-container">

    <h1>Contact Manager</h1>
    <h2>Login</h2>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email"
               value="{{ old('email') }}"
               placeholder="Enter your email">

        <label>Password</label>
        <input type="password" name="password"
               placeholder="Enter password">

        <button type="submit">Login</button>
    </form>

    <p>
        Don't have an account?
        <a href="{{ route('register') }}">Register</a>
    </p>

</div>
</body>
</html>