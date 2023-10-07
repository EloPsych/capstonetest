<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Contact') }}
        </h2>
    </x-slot>

<section>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="post" action="{{route('departments.update', ['departments' => $departments])}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> 
                <div class="max-w-xl">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Contact Information') }}
                </h2>
            </header>

                 <!-- Image Upload -->
                <div class="mt-4">
                    <x-input-label for="image" :value="__('Image')" />
                    <input id="image" type="file" name="image" class="block mt-1 w-full" accept="image/*" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $departments->name)" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $departments->email)" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <!-- Phone -->
                <div  class="mt-4">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone', $departments->phone)" placeholder="eg. 09123456789" required
                     autofocus autocomplete="tel" pattern="[0-9]{11}" title="Phone number must be 11 digits long" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4 mt-6">
                    <x-primary-button>{{ __('Update Contact') }}</x-primary-button>
                </div>

                </div>
                </div>
            </form>
        </div>
    </div>

</section>

</x-app-layout>
