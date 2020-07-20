<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{


    public function create()
    {
        return view('dashboard.service.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'img' => 'required',
        ]);

        $service = new Service();
        $service->title = $request->input('title');
        $service->text = $request->input('text');

        if($request->hasFile('img')){

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/service/', $filename);
            $service->img = $filename;
        }

        $service->save();

        return redirect()->back()->with('success', 'služba bola úspešne pridaná');
    }




    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('dashboard/service/edit')->with('service',$service);
    }


    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        $service->title = $request->input('title');
        $service->text = $request->input('text');

        if($request->hasFile('img')){

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/service/', $filename);
            $service->img = $filename;
        }

        $service->save();

        return redirect()->back()->with('success', 'Služba bola úspešne upravená');
    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->back()->with('success', 'Služba bola zmazaná');
    }
}
