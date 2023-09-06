@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Sous Categories</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{url('/admin/categories')}}">Sous Categories</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row ">

            <div class="col-xl-9 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier sous categorie</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('update-children-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label>Désignation*:</label>
                                        <input type="text"  class="form-control input-default @error('designation') is-invalid @enderror" value="{{$category->designation}}" name="designation" placeholder="designation">
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Informations de vente*:</label>
                                        <input type="text"  class="form-control input-default @error('IV') is-invalid @enderror" value="{{$category->IV}}" name="IV" placeholder="information de vente">
                                            @error('IV')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-6 mt-3">
                                    <label>Photo*:</label>
                                        <input type="file"  class="form-control input-default " name="image" >
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label>Numéro d'ordre:</label>
                                            <input type="text"  class="form-control input-default " name="flag" value="{{ $category->flag }}">
                                    </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-12 mt-3">
                                       <label >Description : </label>
                                       <textarea class="form-control" name="description" rows="3">{{ $category->description }}</textarea>
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

