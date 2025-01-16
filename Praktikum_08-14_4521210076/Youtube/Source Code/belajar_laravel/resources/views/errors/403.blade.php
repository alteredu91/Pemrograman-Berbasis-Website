<x-app-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-red-600 mb-4">403</h1>
            <p class="text-xl text-gray-600 mb-4">Unauthorized Access</p>
            <p class="text-gray-500 mb-8">Sorry, you are not authorized to access this page.</p>
            <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to Home
            </a>
        </div>
    </div>
</x-app-layout>