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

   .th-iv{
    width: 150px;

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
                            <div class="text-listing" style="font-size: 12px; display:none;">{{$listing_name->value}} <br> {{$listing_date}}</div>
                            <div class="no-print" style="font-size: 12px;">{{$listing_name->value}}  {{$listing_date}}</div>
                        </div>



                        <table class="table table-striped">
                                <thead >
                                    <tr class="header-titles" >
                                        <th class="header-title" scope="col">code</th>
                                        <th  class="header-title"  scope="col"> Désignation</th>
                                        <th  class="header-title"  scope="col"> Cond.</th>
                                        <th  class="header-title"  scope="col"> P.U/HT</th>
                                        @if($disponibilite == 1)
                                        <th  class="header-title"  scope="col"> Dispo.</th>
                                        @endif
                                        @if($IV == 1)
                                        <th  class="header-title th-iv"  scope="col"> I.V</th>
                                        @endif
                                        <th  class="header-title" scope="col"> Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $categorie)
                                            <tr class="category-row">
                                                <td scope="row" colspan="7" class="category print-bg-blue" >{{$categorie->designation}}</td>
                                            </tr>
                                            @foreach ($categorie->products as $product)
                                                @if($product->visible == 1)
                                                    <tr>
                                                        <td>{{$product->code}}</td>
                                                        <td>{{$product->designation}}</td>
                                                        <td>{{$product->conditionnement}}</td>
                                                        <td>{{$product->pu}}</td>
                                                        @if($disponibilite == 1)
                                                        <td>@if($product->disponibilite == 1)D @else N/D @endif</td>
                                                        @endif
                                                        @if($IV == 1)
                                                            @if($categorie->IV)
                                                                @if($loop->first)
                                                                <td class="iv" rowspan="{{count($categorie->products)}}">{{$categorie->IV}}</td>
                                                                @endif
                                                            @else

                                                                <td class="iv" >{{$product->IV}}</td>
                                                            @endif
                                                        @endif
                                                        @if($categorie->link_image)
                                                            @if($loop->first)
                                                                <td class="image-product" rowspan="{{count($categorie->products)}}">
                                                                <img width="120px" src="{{asset('storage/images/categories/'.$categorie->link_image)}}" alt="">
                                                                </td>
                                                            @endif
                                                        @else
                                                        <td class="image-product" >
                                                            <img width="120px" src="{{asset('storage/images/products/'.$product->link_image)}}" alt="">
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @foreach ($categorie->childrenCategories as $child)
                                            <tr>
                                                <td scope="row" colspan="7" class="child-category" >{{$child->designation}}</td>
                                            </tr>
                                            @foreach ($child->products as $product)
                                                @if($product->visible == 1)
                                                    <tr class="child-category-row">
                                                        <td>{{$product->code}}</td>
                                                        <td>{{$product->designation}}</td>
                                                        <td>{{$product->conditionnement}}</td>
                                                        <td>{{$product->pu}}</td>
                                                        @if($disponibilite == 1)
                                                        <td>@if($product->disponibilite == 1)D</i> @else N/D @endif</td>
                                                        @endif
                                                        @if($IV == 1)
                                                            @if($child->IV)
                                                                @if($loop->first)
                                                                <td class="iv" rowspan="{{count($child->products)}}">{{$child->IV}}</td>
                                                                @endif
                                                            @else
                                                               <td class="iv" >{{$product->IV}}</td>
                                                            @endif
                                                        @endif
                                                        @if($child->link_image)
                                                            @if($loop->first)
                                                                <td class="image-product" rowspan="{{count($child->products)}}">
                                                                <img width="120px" src="{{asset('storage/images/categories/'.$child->link_image)}}" alt="">
                                                                </td>
                                                            @endif
                                                        @else

                                                            <td class="image-product">
                                                            <img width="120px" src="{{asset('storage/images/products/'.$product->link_image)}}" alt="">
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
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

<script>
    $(document).ready(function() {
        // Sélectionnez l'élément avec la classe "iv" (ou ajustez le sélecteur selon vos besoins)
        $(".iv").each(function() {
            // Récupérez le texte de l'élément
            var texte = $(this).text();

            // Remplacez les virgules par des virgules suivies de <br>
            texte = texte.replace(/,/g, ',<br>');

            // Réinsérez le texte modifié dans l'élément
            $(this).html(texte);
        });
    });
</script>
@endpush
