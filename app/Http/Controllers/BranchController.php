<?php

namespace App\Http\Controllers;

use App\Http\Requests\Branches\StoreRequest;
use App\Models\Branch;
use App\Models\Manager;
use Illuminate\Http\Request;
use Snairbef\Regional\Models\Province;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('branches.index', [
            'branches'  =>  Branch::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branches.create', [
            'provinces' =>  Province::all(['id', 'name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        try {
            $manager = Manager::create([
                'nik' => $validated['manager_nik'],
                'address'   =>  $validated['manager_address']
            ]);

            $user = $manager->user()->create([
                'name' => $validated['manager_name'],
                'email' => $validated['manager_email'],
                'password' => Hash::make($validated['manager_password']),
            ]);

            $branch = $manager->branch()->create(Arr::only($validated, [
                'province_id', 'regency_id', 'district_id', 'sub_district_id',
                'code', 'name', 'address', 'phone', 'email'
            ]));

        } catch (RuntimeException $th) {
            return redirect()->back()->withErrors('errors', 'Terjadi kesalahan. Silahkan coba lagi nanti.');
        }

        return redirect()->route('branches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::with(['manager.user', 'province', 'regency', 'district', 'sub_district'])->findOrFail($id);

        return view('branches.show', [
            'branch'    =>  $branch
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
