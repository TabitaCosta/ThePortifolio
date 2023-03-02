@extends('layouts.layout')
@section('title','Editar About')
@section('content')

<x-dashboard.navbar/>


<div class="card w-75">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="{{Storage::url($list->patch)}}" alt="about" width="200px" height="200px" >
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">About</h5>
                <form action="/update/about" method="post" enctype="multiparti/formdata">
                    @csrf 
                    <input type="hidden" name="id" value="{{$list->id}}">
                    <textarea name="description" id="" cols="25" rows="4">{{$list->description}}</textarea>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAdd01" >Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="hidden" name="patch" value="{{$list->patch}}">
                            <input type="file" class="custom-file-input" id="inputGroupFileAdd01" name="imagem" aria-describedby="inputGroupFileAdd01" > 
                            <label class="custom-file-label" for="inputGroupFileAdd01">Choose File</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-succes">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>