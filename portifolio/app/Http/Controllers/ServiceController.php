<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function createService(Request $request)
    {
        if ($request->hasfile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName."_". time() ."." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        }else {
            $nameStore = "noImagem.png";
        }

        $service= new Service;
        $service->description = $request->description;
        $service->title = $request->title;
        $service->patch='senai/'. $nameStore;
        $service->save();

        return view('dashboard',['x'=>"",'msg'=>"Item cadstrado com sucesso!!"]);
    }

    public function getServiceAll()
    {
        return view('dashboard',['x'=>'list','type'=>'service','list'=>Service::all()]);
    }

    public function getService(Request $request)
    {
        return view('editar/service',['list'=>Service::find($request->id)]);
    }

    public function updateService(Request $request)
    {
        if ($request->hasfile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName."_". time() ."." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        }else {
            $nameStore=$request->patch;
        }
        $service = Service::find($request->id);
        $service->description = $request->description;
        $service->title = $request->title;
        $service->patch=$nameStore;
        $service->save();
        return $this->getServiceAll();
    }

    public function deleteService(Request $request)
    {
        $about = Service::find($request->id);
        $about->delete();
        return $this->getAboutAll();
    }

    public function searchService(Request $request)
    {
        Service::where('description','LIKE','%'.$request->search.'%')
        ->get();
        return view('dashboard',['x'=>"list",'list'=>$db]);
    }


}