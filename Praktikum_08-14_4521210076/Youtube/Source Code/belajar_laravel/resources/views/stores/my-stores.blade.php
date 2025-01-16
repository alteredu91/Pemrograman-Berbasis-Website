<x-app-layout title="My Stores">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Stores') }}
            </h2>
            <div>
                <x-button as="a" href="{{ route('stores.create') }}">
                    {{ __('Create Store') }}
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($stores->isEmpty())
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <p class="text-gray-600 mb-4">You don't have any stores yet.</p>
                    <x-button as="a" href="{{ route('stores.create') }}">
                        {{ __('Create Your First Store') }}
                    </x-button>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    @foreach($stores as $store)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="w-full h-48 bg-gray-200 overflow-hidden">
                                @if($store->logo)
                                    <img src="{{ Storage::url($store->logo) }}" 
                                         alt="{{ $store->name }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-xl font-semibold text-gray-800">{{ $store->name }}</h3>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                        {{ $store->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                           ($store->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                           'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($store->status) }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-4 line-clamp-3">{{ $store->description }}</p>
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $store->address }}
                                </div>
                                <div class="mt-4 flex justify-end space-x-2">
                                    <a href="{{ route('stores.edit', $store) }}" class="text-green-600 hover:text-green-900 text-sm">Edit</a>
                                    <form action="{{ route('stores.destroy', $store) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 text-sm"
                                                onclick="return confirm('Are you sure you want to delete this store?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $stores->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>