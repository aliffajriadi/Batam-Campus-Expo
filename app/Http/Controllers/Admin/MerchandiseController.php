<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MerchandiseProduct;
use App\Models\MerchandiseBuyer;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    // Products
    public function index(Request $request)
    {
        $query = MerchandiseProduct::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name_product', 'like', "%{$search}%");
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        return view('admin.merchandise.index', compact('products'));
    }

    public function create()
    {
        return view('admin.merchandise.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name_product', 'price', 'description', 'stock']);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('merchandise', 'public');
            $data['photo'] = $path;
        }

        MerchandiseProduct::create($data);

        return redirect()->route('admin.merchandise.index')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = MerchandiseProduct::findOrFail($id);
        return view('admin.merchandise.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_product' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|max:2048',
        ]);

        $product = MerchandiseProduct::findOrFail($id);
        $data = $request->only(['name_product', 'price', 'description', 'stock']);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('merchandise', 'public');
            $data['photo'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.merchandise.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = MerchandiseProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.merchandise.index')->with('success', 'Product deleted successfully');
    }

    // Buyers
    public function buyers(Request $request)
    {
        $query = MerchandiseBuyer::with(['user', 'product']);

        // Search by user name, email, or product name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })->orWhereHas('product', function ($q2) use ($search) {
                    $q2->where('name_product', 'like', "%{$search}%");
                });
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'pending') {
                $query->where('status_acc', false);
            } elseif ($request->status === 'approved') {
                $query->where('status_acc', true);
            }
        }

        $buyers = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.merchandise.buyers', compact('buyers'));
    }

    public function showBuyer($id)
    {
        $buyer = MerchandiseBuyer::with(['user', 'product'])->findOrFail($id);
        return view('admin.merchandise.show-buyer', compact('buyer'));
    }

    public function approveBuyer($id)
    {
        $buyer = MerchandiseBuyer::findOrFail($id);
        $buyer->update(['status_acc' => true]);

        return redirect()->route('admin.merchandise.buyers')->with('success', 'Purchase approved');
    }

    public function rejectBuyer($id)
    {
        $buyer = MerchandiseBuyer::findOrFail($id);
        $buyer->update(['status_acc' => false]);

        return redirect()->route('admin.merchandise.buyers')->with('success', 'Purchase rejected');
    }
}
