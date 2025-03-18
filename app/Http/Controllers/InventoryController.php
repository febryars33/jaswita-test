<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inventories\MutationRequest;
use App\Http\Requests\Inventories\StoreRequest;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Mutation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Takielias\TablarKit\Facades\TablarKit;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::with(['branch', 'category']);

        $branch_id = $this->getCurrentBranch();

        if ($this->isManager()) {
            $inventories->whereRelation('branch', 'id', '=', $branch_id);
        }

        return view('inventories.index', [
            'inventories'   =>  $inventories->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::query();

        if ($this->isManager()) {
            $categories->where('branch_id', $request->user()->userable->branch->id);
        }

        return view('inventories.create', [
            'categories'    =>  $categories->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        try {
            $folder = 'inventories';
            $path = TablarKit::moveFile($validated['image'], $folder);

            Inventory::create([
                'branch_id' =>  $this->getCurrentBranch(),
                'category_id' =>  $validated['category_id'],
                'name' =>  $validated['name'],
                'description' =>  $validated['description'],
                'image' =>  $path,
            ]);

            return back()->with('success', 'Data inventori berhasil dibuat.');
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'name'  =>  $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventory = Inventory::with(['category', 'mutations'])->findOrFail($id);

        return view('inventories.show', [
            'inventory' =>  $inventory,
            'branches'  =>  Branch::all()
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

    public function mutation(MutationRequest $request, $id)
    {
        $validated = $request->validated();

        $inventory = Inventory::with(['branch'])->findOrFail($id);

        Mutation::create([
            'inventory_id'  =>  $inventory->id,
            'first_branch_id'   =>  $inventory->branch_id,
            'last_branch_id'    =>  $validated['branch_id'],
            'reason'    =>  $validated['reason']
        ]);

        $inventory->update([
            'branch_id' =>  $validated['branch_id']
        ]);

        return redirect()->route('inventories.index')->with('success', 'Inventori berhasil dimutasikan.');
    }
}
