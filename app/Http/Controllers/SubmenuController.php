<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{

    public function create($id){
        return view('dashboard.submenu.create')->with('id',$id);
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
        ]);

        $id = $request->input('id');
        $menu = Menu::findOrFail($id);
        $submenu = new Submenu();
        $submenu->title = $request->input('title');
        $submenu->url = $request->input('url');
        $submenu->order = count($menu->submenus) + 1;
        $submenu->parent = $id;
        $submenu->save();

        return redirect()->back()->with('success', 'Podmenu bolo úspešne pridané');
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
        ]);

        $submenu = Submenu::findOrFail($id);
        $submenu->title = $request->input('title');
        $submenu->url = $request->input('url');
        $submenu->order = $request->input('order');
        $submenu->parent = $request->input('parent');
        $submenu->save();

        return redirect()->back()->with('success', 'Podmenu bolo úspešne upravené');
    }

    public function destroy($id){
        $submenu = Submenu::findOrFail($id);
        $submenu->delete();
        return redirect()->back()->with('success', 'Podmenu bolo úspešne zmazané');
    }

    public function up($order,$id){
        return Submenu::where('order', $order)->where('parent', $id)->get();
    }

    public function down($order){

    }

}
