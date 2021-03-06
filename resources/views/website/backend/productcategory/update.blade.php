@extends('website.backend.layouts.main')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Product Category</small></h2>
            {{-- <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="#">Settings 1</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul> --}}
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="demo-form2" data-parsley-validate="" method="POST" class="form-horizontal form-label-left" novalidate="" action="{{URL('dashboard/productcategory/'. $productcategory->id ) }}" >
                {{-- <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="{{action('ProductCategoryController@update', $productcategory->id) }}" > --}}
            {{-- <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="{{URL('dashboard/productcategory/'. $productcategory->id) }}" > --}}
            {{-- <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="{{ route('productcategory.update', $productcategory->id) }}" > --}}
                @csrf
                @method('PUT')

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="brand_name" >Brand Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="brand_name" name="brand_name" required="required" value="{{ $productcategory->brand_name }}" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantity_ctrl" >Quantity Controle <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="number" id="quantity_ctrl" name="quantity_ctrl" value="{{ $productcategory->quantity_ctrl }}" required="required" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label for="image_category" class="col-form-label col-md-3 col-sm-3 label-align">Image Category</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input id="image_category_" class="form-control" type="file" name="image_category_">
                        <input id="image_category" class="form-control" type="hidden" value="{{ $productcategory->image_category }}" name="image_category">
                        <input id="slug" class="form-control" type="hidden" value="{{ $productcategory->slug }}" name="slug">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
