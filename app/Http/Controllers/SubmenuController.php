<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmenuController extends Controller
{

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
        ]);
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
        $submenu = Submenu::findOrFail($id);
        $submenu->delete();
        return redirect()->back()->with('success', 'Podmenu bolo úspešne zmazané');
    }

}
