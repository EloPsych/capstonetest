<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/contactModal.css') }}">

<!-- The Modal -->
<div id="myModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <section>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <!-- Create Contacts -->
                    <form method="post" action="{{route('contacts.store')}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="max-w-xl">
                            <header>
                                <img src="/img/ContactLogo.png" alt="Logo" class="logo" style="width:100px; margin-left: 8.4vw">
                                <h2 class="header text-lg font-medium text-gray-900">
                                    {{ __('Contact Information') }}
                                </h2>

                                <p class="mt-1 mb-10 text-sm text-gray-600">
                                    {{ __("You can add contacts in this section") }}
                                </p><hr>
                            </header>
            
                            <!-- Image Upload -->
                            <div class="mt-4 justify-center items-center">
                                <x-input-label for="image" :value="__('Image')" />
                                <input id="image" type="file" name="image" class="block mt-1 w-full" accept="image/*" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div><br>

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Phone -->
                            <div class="mt-4">
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" placeholder="eg. 09123456789" required autofocus autocomplete="tel" pattern="[0-9]{11}" title="Phone number must be 11 digits long" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <div class="flex justify-center items-center gap-4 mt-6">
                                <x-primary-button class="button-scale"><p>Add to Contacts</p></x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

<!-- Modal JavaScript-->
<script src="{{ asset('js/contactModal.js') }}"></script>