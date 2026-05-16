<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Navigation;

class NavigationController extends Controller
{
    public function index()
    {
        $navigations = Navigation::orderBy('position')->orderBy('order')->paginate(10);
        return view('admin.navigations.index', compact('navigations'));
    }

    public function create()
    {
        return view('admin.navigations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
            'position' => 'required|in:header,footer',
        ]);

        Navigation::create($request->all());

        return redirect()->route('navigations.index')->with('success', 'Navigation item created successfully.');
    }

    public function edit(Navigation $navigation)
    {
        return view('admin.navigations.edit', compact('navigation'));
    }

    public function update(Request $request, Navigation $navigation)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
            'position' => 'required|in:header,footer',
        ]);

        $navigation->update($request->all());

        return redirect()->route('navigations.index')->with('success', 'Navigation item updated successfully.');
    }

    public function destroy(Navigation $navigation)
    {
        $navigation->delete();

        return redirect()->route('navigations.index')->with('success', 'Navigation item deleted successfully.');
    }
}
