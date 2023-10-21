@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Générer listing</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{url('/generate-listing')}}">Générer listing</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
       
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Générer listing</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <form action="{{url('/generate-listing')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Catégories :</label>
                                        <div id="accordion-four" class="accordion accordion-no-gutter accordion-bordered">
                                            @foreach ($categories as $category)
                                            <div class="accordion__item">
                                                <div class="accordion__header collapsed " data-toggle="collapse" data-target="{{'#bordered_no-gutter_collapse'.$loop->iteration}}">
                                                    <span class="accordion__header--text ml-4">
                                                        <input type="checkbox" class="form-check-input parent-checkbox"  value="{{ $category->id }}" name="categories[]">
                                                        <label class="form-check-label" for="check1">{{ $category->designation }}</label>
                                                    </span>
                                                    <span class="accordion__header--indicator style_two"></span>
                                                </div>
                                                <div id="{{'bordered_no-gutter_collapse'.$loop->iteration}}" class="collapse accordion__body " data-parent="#accordion-four">
                                                    <div class="accordion__body--text">
                                                        @foreach ($category->childrenCategories as $childrenCategorie)
                                                            <div class="ml-3 ">
                                                                <input type="checkbox" class="form-check-input {{'checkbox'.$category->id}}"  value="{{$childrenCategorie->id }}" name="childrencategories[]">
                                                                <label class="form-check-label" for="check1">{{ $childrenCategorie->designation }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="form-group col-md-6">
                                        <label>Information generale de vente:</label>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="check56" value="1" name="IV">
                                                <label class="form-check-label" for="check56">Visible</label>
                                            </div>
                                     </div>
                                     <div class="form-group col-md-6">
                                            <label>Disponibilité :</label>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="check57" value="1" name="disponibilite">
                                                <label class="form-check-label" for="check57">Visible</label>
                                            </div>
                                     </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Générer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('listing-scripts')
<script>
    $( ".parent-checkbox" ).click(function() {
        if($(this).is(':checked') ){
            $('.checkbox' + $(this).val()).prop('checked', true);
        }
        else{
            $('.checkbox' + $(this).val()).prop('checked', false);
        }
    });
</script>

@endpush

