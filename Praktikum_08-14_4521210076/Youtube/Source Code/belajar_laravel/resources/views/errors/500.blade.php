
<x-app-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-gray-800 mb-4">500</h1>
            <p class="text-2xl text-gray-600 mb-8">Server Error</p>
            <p class="text-gray-500 mb-8">Oops! Something went wrong on our servers.</p>
            <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to Home
            </a>
        </div>
    </div>
</x-app-layout>