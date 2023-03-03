<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signature;

class SignatureController extends Controller
{
    //
    public function create(Request $request){
        if ($request->hasFile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName."_". time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        }else {
            $nameStore = "noImagem.png";
        }

        $s = new Signature;
        $s->payament_type = $request->payament_type;
        $s->icon = 'senai/' . $nameStore;
        $s->description = $request->description;
        $s->price = $request->price;
        $s->type = $request->type;
        $s->save();

        return view('dashboard', ['x'=>'','msg'=>"Assinatura cadastrado com sucesso!"]);
    }

    public function getSignatureAll(){
        $x = Signature::all();
        return view('dashboard',['x'=>'list', 'type'=>'signature', 'list'=>$x]);
    }

    public function getSignature(Request $request){
        $z = Signature::find($request->id);
        return view('editSignature', ['list'=>$z]);
    }

    public function updateSignature(Request $request){
        if ($request->hasFile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName."_". time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
            $nameStore = 'senai/'. $nameStore;
        }else {
            $nameStore = $request->patch;
        }

        $x= Signature::find($request->id); 
        $s->payament_type = $request->payament_type;
        $s->icon = 'senai/' . $nameStore;
        $s->description = $request->description;
        $s->price = $request->price;
        $s->type = $request->type;
        $s->save();
        return $this->getSignatureAll();

    }

    
    public function deleteSignature(Request $request){
        $fg = Portfolio::find($request->id);
        $fg->delete();
        return $this->getSignatureAll();
    }
}
