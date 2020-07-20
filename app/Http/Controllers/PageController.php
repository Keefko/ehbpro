<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('dashboard.page.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'img' => 'required',
        ]);

        $page = new Page();
        $page->title = $request->input('title');
        $page->slug = str_replace(" ", '-', $request->input('title'));
        $page->text = $request->input('text');

        if($request->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/page/', $filename);
            $page->img = $filename;
        }

        $page->save();

        return redirect()->back()->with('success', 'Stránka bola úspešne vytvorená');
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('page.show')->with('page',$page);
    }


    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('dashboard.page.edit')->with('page',$page);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->input('title');
        $page->slug = str_replace(" ", '-', $request->input('title'));
        $page->text = $request->input('text');


        if($request->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/page/', $filename);
            $page->img = $filename;
        }

        $page->save();

        return redirect()->back()->with('success', 'Stránka bola úspešne upravená');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->back()->with('success', 'Stránka bola zmazaná');
    }
}
