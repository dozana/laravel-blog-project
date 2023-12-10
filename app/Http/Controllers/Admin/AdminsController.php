<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminsController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Admin::all();

        return view('admin.admins.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255',
            'email' => 'required|email|max:255|unique:admins',
        ]);

        $store = Admin::store($request);
        $request->session()->flash('result', $store);

        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Admin::findOrFail($id);

        return view('admin.admins.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $id,
        ]);

        $item = Admin::findOrFail($id);
        $update = Admin::updateItem($request, $item);
        $request->session()->flash('result', $update);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if($id == 1) {
            return redirect()->back();
        }

        $delete = Admin::find($id)->delete();
        $request->session()->flash('result', $delete);

        return redirect()->back();
    }
}
