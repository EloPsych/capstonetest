<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/forgotModal.css') }}">

<!-- The Modal -->
<div id="myForgotModal" class="forgotModal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will send you an email password reset link.') }}
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-secondary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-secondary-button>
                </div>
            </form>
    </div>
</div>

<!-- Modal JavaScript-->
<script src="{{ asset('js/forgotModal.js') }}"></script>