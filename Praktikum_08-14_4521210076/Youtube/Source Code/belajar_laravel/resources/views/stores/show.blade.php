<x-app-layout title="{{ $store->name }}">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $store->name }}
            </h2>
            @if(auth()->id() === $store->user_id)
                <div class="flex space-x-4">
                    <x-button as="a" href="{{ route('stores.products.create', $store) }}">
                        Add Product
                    </x-button>
                    <x-button as="a" href="{{ route('stores.edit', $store) }}">
                        Edit Store
                    </x-button>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <!-- Store Details -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Store Logo -->
                        <div class="md:col-span-1">
                            @if($store->logo)
                                <img src="{{ Storage::url($store->logo) }}" 
                                     alt="{{ $store->name }}" 
                                     class="w-full h-48 object-cover rounded-lg">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded-lg">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Store Info -->
                        <div class="md:col-span-2">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900">{{ $store->name }}</h3>
                                    <p class="mt-2 text-gray-600">{{ $store->description }}</p>
                                </div>
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium
                                    {{ $store->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                       ($store->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                       'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($store->status) }}
                                </span>
                            </div>

                            <div class="mt-4">
                                <h4 class="text-lg font-semibold text-gray-900">Address</h4>
                                <p class="mt-1 text-gray-600">{{ $store->address }}</p>
                            </div>

                            <div class="mt-4">
                                <h4 class="text-lg font-semibold text-gray-900">Owner</h4>
                                <p class="mt-1 text-gray-600">{{ $store->user->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Products</h3>
                    
                    @if($store->products->isEmpty())
                        <p class="text-gray-600">No products available yet.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($store->products as $product)
                                <div class="bg-white rounded-lg shadow overflow-hidden">
                                    @if($product->image)
                                        <img src="{{ Storage::url($product->image) }}" 
                                             alt="{{ $product->name }}"
                                             class="w-full h-48 object-cover">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif

                                    <div class="p-4">
                                        <h4 class="text-lg font-semibold">{{ $product->name }}</h4>
                                        <p class="mt-1 text-gray-600">{{ Str::limit($product->description, 100) }}</p>
                                        <p class="mt-2 text-xl font-bold text-gray-900">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>

                                        @if(auth()->id() === $store->user_id)
                                            <div class="mt-4 flex justify-end space-x-2">
                                                <a href="{{ route('stores.products.edit', [$store, $product]) }}" 
                                                   class="text-blue-600 hover:text-blue-900">Edit</a>
                                                <form action="{{ route('stores.products.destroy', [$store, $product]) }}" 
                                                      method="POST" 
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-900"
                                                            onclick="return confirm('Are you sure?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>