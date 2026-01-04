<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\CampusVoting;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function index(Request $request)
    {
        $query = Campus::withCount('votes');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name_campus', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%");
        }

        $campuses = $query->orderBy('votes_count', 'desc')->paginate(10)->withQueryString();
        return view('admin.campus.index', compact('campuses'));
    }

    public function create()
    {
        return view('admin.campus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_campus' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'logo_campus' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name_campus', 'location']);

        if ($request->hasFile('logo_campus')) {
            $path = $request->file('logo_campus')->store('campus', 'public');
            $data['logo_campus'] = $path;
        }

        Campus::create($data);

        return redirect()->route('admin.campus.index')->with('success', 'Campus created successfully');
    }

    public function edit($id)
    {
        $campus = Campus::findOrFail($id);
        return view('admin.campus.edit', compact('campus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_campus' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'logo_campus' => 'nullable|image|max:2048',
        ]);

        $campus = Campus::findOrFail($id);
        $data = $request->only(['name_campus', 'location']);

        if ($request->hasFile('logo_campus')) {
            $path = $request->file('logo_campus')->store('campus', 'public');
            $data['logo_campus'] = $path;
        }

        $campus->update($data);

        return redirect()->route('admin.campus.index')->with('success', 'Campus updated successfully');
    }

    public function destroy($id)
    {
        $campus = Campus::findOrFail($id);

        // Delete related votes first
        CampusVoting::where('id_campus', $id)->delete();

        $campus->delete();

        return redirect()->route('admin.campus.index')->with('success', 'Campus deleted successfully');
    }

    public function votes($id)
    {
        $campus = Campus::with(['votes.user'])->findOrFail($id);
        return view('admin.campus.votes', compact('campus'));
    }
}
