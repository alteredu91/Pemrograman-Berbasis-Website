<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['roles' => function($query) {
            $query->select('id', 'name');
        }])
        ->select('id', 'name', 'email', 'created_at')
        ->latest()
        ->paginate(9);
        \Debugbar::info('Users Query', $users);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        
        \Debugbar::info('User Created', $user);
        
        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function show(User $user)
    {
        $user->load(['roles' => function($query) {
            $query->select('id', 'name');
        }]);
        
        \Debugbar::info('User Details', $user);

        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        $user->load(['roles' => function($query) {
            $query->select('id', 'name');
        }]);
        
        \Debugbar::info('Edit User', $user);

        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();
        
        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $user->update($validated);
        
        \Debugbar::info('User Updated', $user);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        \Debugbar::info('User Deleted', $user);

        $user->delete();
        
        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}