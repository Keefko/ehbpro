<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use Illuminate\Http\Request;


class MenuController extends Controller
{

    public function index()
    {
        return Menu::all();
    }


    public function create()
    {
        return view('menu.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
        ]);

        $menu = new Menu();
        $menu->text = $request->input('title');
        $menu->url = $request->input('url');
        $menu->save();

        return redirect()->back()->with('success', 'Položka úspešne pridaná');
    }


    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.show')->with('menu', $menu);
    }


    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('dashboard.menu.edit')->with('menu', $menu);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
        ]);

        $menu =  Menu::findOrFail($id);
        $menu->text = $request->input('title');
        $menu->url = $request->input('url');
        $menu->save();

        return redirect()->back()->with('success', 'Položka úspešne upravená');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->back()->with('success', 'Položka úspešne zmazaná');
    }


    public function getSubmenu($id){
       $submenus = Submenu::where('parent', $id)->orderBy('order', 'DESC');
       return json_encode($submenus);
    }

}
