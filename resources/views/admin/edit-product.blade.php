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
                        <h4 class="card-title">Modifier produit</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label>Désignation*:</label>
                                        <input type="text"  class="form-control input-default @error('designation') is-invalid @enderror" value="{{$product->designation}}" name="designation" placeholder="designation">
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Code*:</label>
                                        <input type="text"  class="form-control input-default @error('code') is-invalid @enderror" value="{{$product->code}}" name="code" placeholder="code">
                                            @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label>Conditionnement*:</label>
                                        <input type="text"  class="form-control input-default @error('conditionnement') is-invalid @enderror" value="{{$product->conditionnement}}" name="conditionnement" placeholder="conditionnement">
                                            @error('conditionnement')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label>PU/HT*:</label>
                                        <input type="text"  class="form-control input-default @error('pu') is-invalid @enderror" value="{{$product->pu}}" name="pu" placeholder="PU">
                                            @error('pu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <label>Liste des catégories :</label>
                                            <select class="form-control  @error('category') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="category">
                                                <option value=0>Nothing selected</option>
                                                @foreach($categories as $category)
                                                <option  value="{{$category->id}}" @if($product->productable_type == "App\Models\Category" && $product->productable_id == $category->id) selected @endif > {{$category->designation}}</option>
                                                    @foreach($category->childrenCategories as $children_category)
                                                    <option  value="c_{{$children_category->id}}" @if($product->productable_type == "App\Models\Childrencategory" && $product->productable_id == $children_category->id) selected @endif> &nbsp &nbsp &nbsp{{$children_category->designation}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label >IV : </label>
                                        <input class="form-control" name="IV" value="{{ $product->IV }}" type="text">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <label >Photo : </label>
                                        <input class="form-control" name="image" type="file">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <label >Description : </label>
                                        <textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary mt-3">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
@endsection
