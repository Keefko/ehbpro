<?php

namespace App\Http\Controllers;

use App\Lists;
use Illuminate\Http\Request;

class ListController extends Controller
{




    public function create()
    {
        return view('dashboard.list.create');
    }


    public function store(Request $request)
    {
        $list = new Lists();
        $list->title = $request->input('title');
        $list->save();

        return redirect()->back()->with('success', 'Služba úspešne pridaná');

    }

    public function show($id)
    {
        $list = Lists::findOrFail($id);
        return $list;
    }

    public function edit($id)
    {
        $list = Lists::findOrFail($id);
        return view('dashboard.list.edit')->with('list', $list);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $list = Lists::findOrFail($id);
        $list->title = $request->input('title');
        $list->save();

        return redirect()->back()->with('success', 'Služba úspešne pridaná');
    }


    public function destroy($id)
    {
        $list = Lists::find($id);
        $list->delete();
        return redirect()->back()->with('success', 'Služba úspešne zmazaná');
    }
}
