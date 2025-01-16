<x-app-layout title="Products">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products - {{ $store->name }}
            </h2>
            <x-button as="a" href="{{ route('stores.products.create', $store) }}">
                Add Product
            </x-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="h-48 bg-gray-200">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" 
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                            <p class="text-gray-600 mt-1">{{ Str::limit($product->description, 100) }}</p>
                            <p class="text-lg font-bold mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            
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
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>