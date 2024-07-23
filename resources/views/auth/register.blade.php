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
            text-align: left
        }

        .form-group input {
            width: calc(100% - 20px);
            margin-top: 10px;
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
        <h1><span>Selamat Datang</span></h1>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
    
            <!-- Name -->
            <div class="form-group">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="form-group mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="form-group mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="form-group mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <button type="submit" class="btn" style="margin-bottom: 10px">{{ __('Register') }}</button>
        </form>
        
        <div class="flex items-center justify-end" style="margin-top: 10px">
            Already Registered?
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>      
        </div>
    </div>
</body>
</html>
