<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with(['user' => function($query) {
            $query->select('id', 'name', 'email');
        }])->latest()->paginate(9);
        
        \Debugbar::info('Stores Query', $stores);
        
        return view('stores.index', compact('stores'));
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }

        $validated['user_id'] = auth()->id();
        
        Store::create($validated);
        
        return redirect()->route('stores.index')
            ->with('success', 'Store created successfully.');
    }

    public function edit(Store $store)
    {
        if ($store->user_id !== auth()->id()) {
            abort(403);
        }

        return view('stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, Store $store)
    {
        if ($store->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            if ($store->logo) {
                Storage::disk('public')->delete($store->logo);
            }
            
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }

        $store->update($validated);

        return redirect()->route('stores.index')
            ->with('success', 'Store updated successfully.');
    }

    public function destroy(Store $store)
    {
        if ($store->user_id !== auth()->id()) {
            abort(403);
        }

        if ($store->logo) {
            Storage::disk('public')->delete($store->logo);
        }

        $store->delete();

        return redirect()->route('stores.index')
            ->with('success', 'Store deleted successfully.');
    }

    public function approve(Store $store)
    {
        $store->update(['status' => 'approved']);
        SendStoreApprovalEmail::dispatch($store, 'approved');
        return back()->with('success', 'Store has been approved.');
    }

    public function reject(Store $store)
    {
        $store->update(['status' => 'rejected']);
        SendStoreApprovalEmail::dispatch($store, 'rejected');
        return back()->with('success', 'Store has been rejected.');
    }

    public function myStores()
    {
        $stores = Store::with(['user' => function($query) {
            $query->select('id', 'name', 'email');
        }])
        ->where('user_id', auth()->id())
        ->latest()
        ->paginate(9);
        
        \Debugbar::info('My Stores Query', $stores);
        
        return view('stores.my-stores', compact('stores'));
    }

    public function show(Store $store)
    {
        $store->load(['user' => function($query) {
            $query->select('id', 'name', 'email');
        }, 'products']);
    
        return view('stores.show', compact('store'));
    }
}