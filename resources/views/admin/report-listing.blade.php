@extends('layouts.dashboard-admin')
@section('content')

<style>
    .category{
        text-align: center;
        background-color:#009EE2!important;
        font-weight: bold;
        color: #fff;
        font-size: 20px;
    }

    .child-category{
        text-align: center;
        background-color:#94D4F0!important;
        font-weight: bold;
        color: #fff;
        font-size: 18px;
    }

    .iv{
        background-color: #E6EDF4;
        font-size: 12px;
        max-width: 50px;
        text-align: center;
    }
    .image-product{
        background-color: #fff;
        width: 150px!important;
    }
    .header-titles{
        background-color: #064797;
        color: #fff;
    }
    .print-content{
    width: 100%;
    height: auto;
    background-image: url('/pg-promedal.jpg');
    background-repeat: no-repeat;
    background-position: top left;
    background-size: cover;
    }

  
  

</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Générer le listing</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Listing</a></li>
                </ol>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
              <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0  printMe">
                <i class="btn-icon-prepend " data-feather="printer"></i>
                Imprimer
              </button>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body print-section" id="printable">

                        <div class="print-page">
                            <div class="print-content">
                              <!-- Your content for the first page -->
                            </div>
                          </div>

                       

                        <table class="table table-striped">
                                <thead >
                                    <tr class="header-titles" >
                                        <th class="header-title" scope="col">code</th>
                                        <th  class="header-title"  scope="col"> Désignation</th>
                                        <th  class="header-title"  scope="col"> Cond.</th>
                                        <th  class="header-title"  scope="col"> P.U/HT</th>
                                        <th  class="header-title"  scope="col"> Dispo.</th>
                                        <th  class="header-title"  scope="col"> I.V</th>
                                        <th  class="header-title" scope="col"> Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $categorie)
                                            <tr>
                                                <td scope="row" colspan="7" class="category print-bg-blue" >{{$categorie->designation}}</td>
                                            </tr>
                                            @foreach ($categorie->products as $product)
                                                <tr>
                                                    <td>{{$product->code}}</td>
                                                    <td>{{$product->designation}}</td>
                                                    <td>{{$product->conditionnement}}</td>
                                                    <td>{{$product->pu}}</td>
                                                    <td>@if($product->disponibilite == 1)<i class="fa-solid fa-check"></i> @else <i class="fa fa-xmark"></i> @endif</td>
                                                    @if($categorie->IV)
                                                        @if($loop->first)
                                                            <td class="iv" rowspan="{{count($categorie->products)}}">{{$categorie->IV}}</td>
                                                        @endif
                                                    @else
                                                        <td class="iv" >{{$product->IV}}</td>
                                                    @endif

                                                    @if($loop->first)
                                                        <td class="image-product" rowspan="{{count($categorie->products)}}">
                                                           <img width="120px" src="{{asset('storage/images/categories/'.$categorie->link_image)}}" alt="">
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @foreach ($categorie->childrenCategories as $child)
                                            <tr>
                                                <td scope="row" colspan="7" class="child-category" >{{$child->designation}}</td>
                                            </tr>
                                            @foreach ($child->products as $product)
                                                <tr>
                                                    <td>{{$product->code}}</td>
                                                    <td>{{$product->designation}}</td>
                                                    <td>{{$product->conditionnement}}</td>
                                                    <td>{{$product->pu}}</td>
                                                    <td>@if($product->disponibilite == 1)D</i> @else Ind @endif</td>
                                                    @if($child->IV)
                                                        @if($loop->first)
                                                            <td class="iv" rowspan="{{count($child->products)}}">{{$child->IV}}</td>
                                                        @endif
                                                    @else
                                                        <td class="iv" >{{$product->IV}}</td>
                                                    @endif
                                                    @if($loop->first)
                                                        <td class="image-product" rowspan="{{count($child->products)}}">
                                                           <img width="120px" src="{{asset('storage/images/categories/'.$child->link_image)}}" alt="">
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endforeach

                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('listing-scripts')

<script>
$('.printMe').click(function(){
    $('#printable').printThis();
});
</script>

@endpush
