@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Produits</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{url('/admin/products')}}">Produits</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row ">

            <div class="col-xl-9 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter produit</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label>Désignation*:</label>
                                        <input type="text"  class="form-control input-default @error('designation') is-invalid @enderror" value="{{old('designation')}}" name="designation" placeholder="designation" required>
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Code*:</label>
                                        <input type="text"  class="form-control input-default @error('code') is-invalid @enderror" value="{{old('code')}}" name="code" placeholder="code"required>
                                            @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label>Conditionnement*:</label>
                                        <input type="text"  class="form-control input-default @error('conditionnement') is-invalid @enderror" value="{{old('conditionnement')}}" name="conditionnement" placeholder="conditionnement" required>
                                            @error('conditionnement')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label>PU/HT*:</label>
                                        <input type="text"  class="form-control input-default @error('pu') is-invalid @enderror" value="{{old('pu')}}" name="pu" placeholder="PU" required>
                                            @error('pu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <label>Catégorie parente* :</label>
                                            <select class="selectpicker form-control  @error('category') is-invalid @enderror" id="sel1"  data-live-search="true" name="category" required>
                                                <option  disabled selected>selectionner...</option>
                                                @foreach($categories as $category)
                                                <option  value="{{$category->id}}" > {{$category->designation}}</option>
                                                    @foreach($category->childrenCategories as $children_category)
                                                    <option  value="c_{{$children_category->id}}"> &nbsp &nbsp &nbsp{{$children_category->designation}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label >Informations de vente : </label>
                                        <input class="form-control" name="IV" type="text" placeholder="informations de vente">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <label >Photo : </label>
                                        <input class="form-control" name="image" type="file">
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label>Disponible ?</label><br>
                                        <div class="form-group mb-0">
                                            <label class="radio-inline mr-3"><input type="radio" name="disponibilite" value="1" checked> Oui</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="disponibilite" value="0"> Non</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <label > Numéro d'ordre : </label>
                                        <input class="form-control" name="flag" type="text" placeholder="numéro d'ordre">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <label >Description : </label>
                                        <textarea class="form-control" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary mt-3">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
@endsection
