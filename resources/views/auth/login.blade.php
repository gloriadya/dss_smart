<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            padding: 80px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .container h1 span {
            color: orange;
        }

        .container h1 span:last-child {
            color: #1a1aff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 30px;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #1a1aff;
        }

        .btn {
            background-color: #1a1aff;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0000e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><span>Hello, </span><span>admin</span></h1>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="form-group">
                <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="form-group">
                <input id="password" type="password" name="password" placeholder="Kata Sandi" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn">{{ __('Masuk') }}</button>
        </form>
    </div>
</body>
</html>
