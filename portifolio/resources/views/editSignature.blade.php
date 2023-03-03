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
                <h5 class="card-title">Signature</h5>
                <form action="/add/signature" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" value="{{$list->description}}" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Preço</label>
            <input type="text" name="price" value="{{$list->price}}" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo de pagamento</label>
            <select class="form-control" name="payament_type" id="exampleFormControlSelect1">
            <option value="{{$list->payament_type}}">
            @if ($list->type == 'credito')
               Credito
            @elseif($list->type == 'debito')
                 Debito
            @elseif ($list->type == 'boleto')
                Boleto
            @endif
            </option>  
            <option value="cr">Credito</option>
              <option value="de">Debito</option>
              <option value="Bo">Boleto</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo de assinatura</label>
            <select class="form-control" name="type" id="exampleFormControlSelect1">
            <option value="{{$list->type}}">
            @if ($list->type == 'basica')
               Basica
            @elseif($list->type == 'medium')
                 Madium
            @elseif ($list->type == 'premium')
                Premium
            @endif
            </option>   
            <option value="ba">Basica</option>
              <option value="me">Medium</option>
              <option value="pr">Premium</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
            <input type="hidden" name="patch" value="{{$list->icon}}">
              <input type="file" class="custom-file-input" id="inputGroupFile01" name="icon" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
        </div>
            </div>
        </div>
    </div>
</div>