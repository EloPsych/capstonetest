<x-guest-layout class="left-column col-6">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    
    <form method="POST" action="{{ route('login') }}">
        @csrf        
        <!-- Email Address -->
        <div>
            <!--<x-input-label for="email"/>-->
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <!--<x-input-label for="password"/>-->
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block flex items-center justify-end mt-4">
            <x-danger-button class="btn btn-danger mt-1 w-full" 
                style="background-color:#972121; font-family: Poppins" 
                onmouseover="this.style.backgroundColor='#C51605'; this.style.cursor='pointer';" 
                onmouseout="this.style.backgroundColor='#972121'; this.style.cursor='default';">
                {{ __('Log in') }}
            </x-danger-button>
        </div>

        <div class="flex items-center justify-center mt-4">
        @if (Route::has('password.request'))
            <a class="rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                style="color:#972121; text-decoration:none" 
                onmouseover="this.style.color='#C51605'; this.style.cursor='pointer';" 
                onmouseout="this.style.color='#972121'; this.style.cursor='default';" 
                href="{{route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
        </div>
        <hr>

        <div class="flex items-center justify-center mt-4">
        <a  style="background-color:#42B72A; text-decoration: none; color: #fff; padding: 10px; border-radius: 4px; font-family: Poppins; width:13vw; text-align:center" 
            onmouseover="this.style.backgroundColor='#96C291'; this.style.cursor='pointer';" 
            onmouseout="this.style.backgroundColor='#42B72A'; this.style.cursor='default';"
            id ="openModalButton" href="#">Create new account</a>
        </div>
    </form>
    @include('modal/registerModal')
</x-guest-layout>