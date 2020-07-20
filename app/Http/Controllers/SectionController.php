<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{


    public function show($id)
    {
        $section = Section::find($id);
        return view('section.show')->with('section',$section);
    }


    public function edit($id)
    {
        $section = Section::find($id);
        return view('dashboard.section.edit')->with('section',$section);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'text' => 'required',
        ]);

        $section = Section::findOrFail($id);
        $section->title = $request->input('title');
        $section->sub_title = $request->input('sub_title');
        $section->text = $request->input('text');

        $section->save();

        return redirect()->back()->with('succes', 'Položka úspešne pridaná');
    }


}
