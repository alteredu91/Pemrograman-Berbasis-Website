<x-app-layout title="Users">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-base font-semibold leading-7 text-gray-900">Users List</h3>
                            <p class="mt-1 text-sm leading-6 text-gray-600">A list of all users in your account.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0">
                            <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Add User
                            </a>
                        </div>
                    </div>
                    
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">#</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created At</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-900">
                                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $user->name }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $user->email }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $user->created_at->format('d F Y') }}</td>
                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                    <div class="flex gap-4 justify-end">
                                                        <a href="{{ route('users.show', $user) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                                        <a href="{{ route('users.edit', $user) }}" class="text-green-600 hover:text-green-900">Edit</a>
                                                        <form action="{{ route('users.destroy', $user) }}" method="post" class="inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- Pagination Information --}}
                    <div class="mt-4 text-gray-600 text-sm">
                        Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} 
                        of {{ $users->total() }} entries
                    </div>

                    {{-- Pagination Links --}}
                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>