{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tap & Go | Login</title>
</head>
<body>

  <div class="flex min-h-screen items-center justify-center bg-gray-100 px-6 py-12">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
      
      <div class="text-center mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800">Sign in to your account</h2>
        <p class="mt-2 text-sm text-gray-500">Enter your credentials to continue</p>
      </div>
  
      <form action="{{ route('user.login') }}" method="POST" class="space-y-6">
        @csrf
  
        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
          <div class="mt-2">
            <input type="email" name="email" id="email" required
              class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 shadow-sm">
          </div>
          @if($errors->has('email'))
            <p class="text-sm text-red-600 mt-1">{{ $errors->first('email') }}</p>
          @endif
        </div>
  
        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-2">
            <input type="password" name="password" id="password" required
              class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 shadow-sm">
          </div>
          @if($errors->has('password'))
            <p class="text-sm text-red-600 mt-1">{{ $errors->first('password') }}</p>
          @endif
        </div>
  
        <!-- Submit Button -->
        <div>
          <button type="submit"
            class="w-full flex justify-center rounded-md bg-indigo-600 px-4 py-2 text-white font-semibold hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150">
            Sign in
          </button>
        </div>
      </form>
    </div>
  </div>
  
    {{-- <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="{{route('user.login')}}" method="POST">
            @csrf
            <div>
              <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
              <div class="mt-2">
                <input type="email" name="email" id="email" required
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 focus:outline-indigo-600">
              </div>
              @if($errors->has('email'))
                <p class="text-sm text-red-600 mt-1">{{ $errors->first('email') }}</p>
              @endif
            </div>
            
            <div class="mt-4">
              <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
              <div class="mt-2">
                <input type="password" name="password" id="password" required
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 focus:outline-indigo-600">
              </div>
              @if($errors->has('password'))
                <p class="text-sm text-red-600 mt-1">{{ $errors->first('password') }}</p>
              @endif
            </div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
          </form>
      
        </div>
      </div> --}}
</body>
</html>

  
