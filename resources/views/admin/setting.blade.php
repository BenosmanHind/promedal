@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Setting</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{url('/admin/setting')}}">Setting</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row ">

            <div class="col-xl-9 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Setting</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('admin/setting/'.$setting->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label>Nom*:</label>
                                        <input type="text"  class="form-control input-default " value="{{$setting->name}}" name="name" placeholder="nom" required>

                                    </div>
                                    <div class="col-6">
                                        <label>Date*:</label>
                                        <input type="date"  class="form-control input-default" value="{{$setting->value}}" name="value" required>
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
