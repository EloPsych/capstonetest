<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-100 leading-tight">
            {{ __('iNotify: Emergency Dashboard') }}
        </h2>
    </x-slot>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <!-- Button to create a new contact -->
                <a href="#" id="openModalButton" class="font-bold py-4 px-6 text-white" style="color:#972121; position: absolute; right: 5vw;">
                    <i id="openModalIcon" class="fa-solid fa-user-plus fa-2xl"></i>
                </a>

                <div class="list">
                    <nav style="font-family: 'Poppins'; font-weight: bold">
                    <a href="{{route('contacts.index') }}" :active="request()->routeIs('contacts.index')" class="mr-10" style="font-size: 23px; font-family: Cairo;"><u>People</u></a>
                    <a href="{{route('contacts.department') }}" :active="request()->routeIs('contacts.department')" style="font-size: 23px; font-family: Cairo">Department</a>
                </div>
            </div><hr><br>

            <!-- Grid of contacts -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($contacts as $contact)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="relative flex justify-end mt-4">

                        <!-- Options button -->
                        <button type="button" class="text-gray-400 hover:text-red-900 focus:outline-none" id="optionsButton{{ $contact->id }}">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>

                        <!-- Options dropdown -->
                        <div class="absolute right-0 hidden mt-2 py-2 bg-white border border-gray-200 shadow-md rounded-lg" id="optionsDropdown{{ $contact->id }}">
                           
                        <!-- Edit option -->
                            <a href="{{ route('contacts.edit', $contact->id) }}" id="editModalButton" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-red-900">
                                <p id="editModalButton">Edit</p>
                               
                            </a>

                            <!-- Delete option -->
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="post" class="block px-4 py-2 text-red-900 hover:bg-red-100 hover:text-red-500">
                                @csrf
                                @method('delete')
                                <button type="submit" class="focus:outline-none">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Display -->
                    <img src="{{ asset('storage/' . $contact->image) }}" alt="Contact Image" class="rounded-full h-20 w-20 mx-auto mb-4">
                    <h3 class="text-lg font-semibold mb-5" style="font-family:'Cairo'; text-align:center">{{ $contact->name }}</h3>
                    <div class="text-gray-600 flex items-center" style="font-family: 'Open Sans'">
                        <i class="fas fa-envelope ml-4 mb-3 p-2" style="background-color: #CCCCCC; border-radius: 10px"></i>
                        <p class="mb-3 ml-4">{{ $contact->email }}</p>
                    </div>
                    <div class="text-gray-600 flex items-center" style="font-family: 'Open Sans'">
                        <i class="fas fa-phone ml-4 mb-3 p-2" style="background-color: #CCCCCC; border-radius: 10px"></i>
                        <p class="mb-3 ml-4">{{ $contact->phone }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('modal/contactModal')   
    
</x-dashboard-layout>

<!-- JS for dropdown Menu -->
<script>
    // Loop through each contact
    @foreach($contacts as $contact)
        const optionsButton{{ $contact->id }} = document.getElementById('optionsButton{{ $contact->id }}');
        const optionsDropdown{{ $contact->id }} = document.getElementById('optionsDropdown{{ $contact->id }}');

        optionsButton{{ $contact->id }}.addEventListener('click', () => {
            optionsDropdown{{ $contact->id }}.classList.toggle('hidden');
        });

        // Close the dropdown when clicking outside of it
        document.addEventListener('click', (event) => {
            if (!optionsButton{{ $contact->id }}.contains(event.target) && !optionsDropdown{{ $contact->id }}.contains(event.target)) {
                optionsDropdown{{ $contact->id }}.classList.add('hidden');
            }
        });
    @endforeach
</script>