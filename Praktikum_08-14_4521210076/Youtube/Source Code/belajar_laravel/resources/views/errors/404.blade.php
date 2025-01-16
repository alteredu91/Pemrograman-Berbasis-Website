<x-app-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-gray-800 mb-4">404</h1>
            <p class="text-2xl text-gray-600 mb-8">Page not found</p>
            <p class="text-gray-500 mb-8">Sorry, we couldn't find the page you're looking for.</p>
            <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to Home
            </a>
        </div>
    </div>
</x-app-layout>