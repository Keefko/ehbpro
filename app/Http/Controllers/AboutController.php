<?php

namespace App\Http\Controllers;


use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::all();
        return view('about')->with('about', $about);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $about = About::findOrFail($id);
        return view('about.show')->with('about', $about);
    }


    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('dashboard.about.edit')->with('about', $about);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'button_text' => 'required',
            'button_url' => 'required',
        ]);

        $about = About::findOrFail($id);
        $about->title = $request->input('title');
        $about->sub_title = $request->input('sub_title');
        $about->button_text = $request->input('button_text');
        $about->button_url = $request->input('button_url');

        if($request->hasFile('img1')){

            $file = $request->file('img1');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/about/', $filename);
            $about->img1 = $filename;
        }

        if($request->hasFile('img2')){

            $file = $request->file('img2');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/about/', $filename);
            $about->img2 = $filename;
        }


        $about->save();

        return redirect()->back()->with('success', 'Položka úspešne zmenená');
    }


    public function destroy($id)
    {
    }
}
