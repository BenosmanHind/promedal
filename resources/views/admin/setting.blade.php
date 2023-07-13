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
                            <form action="{{url('/admin/update-setting/'.$setting_one->id.'/'.$setting_two->id)}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Nom*:</label>
                                            <input type="text"  class="form-control input-default " value="{{$setting_one->name}}" name="name_one" placeholder="nom" required>

                                        </div>
                                        <div class="col-6">
                                            <label>Valeur*:</label>
                                            <input type="date"  class="form-control input-default" value="{{$setting_one->value}}" name="value_one" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Nom*:</label>
                                            <input type="text"  class="form-control input-default " value="{{$setting_two->name}}" name="name_two" placeholder="nom" required>

                                        </div>
                                        <div class="col-6">
                                            <label>Valeur*:</label>
                                            <input type="text"  class="form-control input-default" value="{{$setting_two->value}}" name="value_two" required>
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
