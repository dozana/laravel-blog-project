<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Article::all('ka');

        return view('admin.articles.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'translates.ka.title' => 'required|max:100',
            'translates.ka.description' => 'required|max:255',
            'translates.ka.text' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $store = Article::store($request); // true or false

        $request->session()->flash('result', $store);

        return redirect()->route('articles.index');
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
        $items_with_translates = Article::itemByIdWithTranslates($id);

//        echo '<pre>';
//        print_r($items_with_translates>toArray());
//        echo '</pre>';
//        die;

        if($items_with_translates->count() != 2) {
            redirect()->route('articles.index');
        }

        return view('admin.articles.edit', compact('items_with_translates')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'translates.ka.title' => 'required|max:100',
            'translates.ka.description' => 'required|max:255',
            'translates.ka.text' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $item = Article::findOrFail($id);
        $update = Article::updateItem($request, $item); // true ან false
        $request->session()->flash('result', $update);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $delete = Article::find($id)->delete();
        $request->session()->flash('result', $delete);

        return redirect()->back();
    }
}
