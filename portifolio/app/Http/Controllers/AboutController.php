<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    //
    public function create(Request $request)
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

        $about= new About;
        $about->description = $request->description;
        $about->patch=$nameStore;
        $about->save();

        return view('dashboard',['msg'=>"Item cadstrado com sucesso!!"]);
    }

    public function getAboutAll()
    {
       return About::all();     
    }

    public function getAbout(Request $request)
    {
        return About::find($request->id);
    }

    public function updateAbout(Request $request)
    {
        if ($request->hasfile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName."_". time() ."." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        }else {
            $nameStore = $request->patch;
        }

        $about = About::find($request->id);
        $about->description = $request->$description;
        $about->patch="";
        $about->save();
    }

    public function deleteAbout(Request $request)
    {
        $about = About::find($request->id);
        $about->delete();
    }

    public function search(Request $request)
    {
        About::where('description','LIKE','%'.$request->search.'%')
        ->get();
    }









}
