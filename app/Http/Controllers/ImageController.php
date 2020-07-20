<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function show($id){
        return Image::find($id);
    }

    public function update(Request $request, $id){

        $image = Image::findOrFail($id);
        $this->validate($request, ['img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|required',]);
        if($request->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/images/', $filename);
            $image->img = $filename;
        }

        $image->save();

        return redirect()->back()->with('success', 'Obrázok úspešne zmenený');
    }
}
