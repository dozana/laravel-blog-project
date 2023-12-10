<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = DB::table('contacts')->first();

        return view('admin.contact.edit', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
//        echo '<pre>';
//        print_r(Cache::get('contacts'));
//        echo '</pre>';
//        die;

        $item = DB::table('contacts')->first();

        return view('admin.contacts.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $update = $update = DB::table('contacts')->where('id', $id)->update([
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        $request->session()->flash('result', true);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cache(Request $request)
    {
        if(Cache::has('contacts')) {
            Cache::forget('contacts');
        } else {
            Cache::remember('contacts', 3600, function () {
                return DB::table('contacts')->first();
            });
        }

        $request->session()->flash('result', true);

        return redirect()->back();
    }
}
