<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-100 leading-tight">
            {{ __('iNotify: Emergency Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-semibold mb-4">{{ __("Urgent Reports/Messages") }}</h3>

                    <!-- Display Urgent Reports/Messages Here -->
                    <div class="mb-4">
                        <!-- Replace this with actual data from your database -->
                         <div class="bg-gray-100 p-3 mb-2 rounded-lg">
                               
                                <div class="mt-2">
                                    <button class="bg-green-500 text-white px-3 py-1 rounded-md mr-2">
                                        Mark as Resolved
                                    </button>
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded-md mr-2">
                                        Mark as Priority
                                    </button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded-md mr-2">
                                        False Report
                                    </button>
                                </div>
                            </div>
                        
                    </div>

                    <!-- Compose Button to Create New Report/Message -->
                    <button class="bg-red-900 text-white px-4 py-2 rounded-md">
                        Compose
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
