@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Sous Categories</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{url('/admin/categories')}}"> Sous Categories</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row ">
            <div class="col-xl-9 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Les sous categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('admin/categories/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                    @foreach ($category->childrencategories as $child)
                                        <div class="row">
                                            <div class="col-4 mt-3">
                                            <input type="text"  class="form-control input-default " value="{{$child->designation}}" name="categories[]" >
                                            </div>

                                            <div class="col-4 mt-3">
                                                <a href="{{ asset('edit-children-category/'.$child->id)}}" type="button" class="btn btn-primary shadow btn-xs sharp "><i class="fa fa-pencil"></i></a>
                                                <a href="{{ asset('delete-children-category/'.$child->id) }}"  class="btn btn-danger shadow btn-xs sharp delete-category"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    @endforeach

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
@endsection

