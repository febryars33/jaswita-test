<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\StoreRequest;
use App\Models\Category;
use App\Models\Manager;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::query();

        if ($this->isManager()) {
            $categories->where('branch_id', $request->user()->userable->branch->id);
        }

        return view('categories.index', [
            'categories'    =>  $categories->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $branch_id = (int) $this->getCurrentBranch();

        $category = Category::create([
            'branch_id' =>  $branch_id,
            'code'  =>  strtoupper($validated['code']),
            'name'  =>  strtoupper($validated['name'])
        ]);

        return redirect()->back()->with('success', 'Kategori ' . $category->name . ' Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with(['branch', 'inventories'])->findOrFail($id);

        return view('categories.show', [
            'category'  =>  $category,
            'inventories'   =>  $category->inventories()->paginate()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
