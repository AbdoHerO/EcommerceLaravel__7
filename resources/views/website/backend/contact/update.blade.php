@extends('website.backend.layouts.main')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Product</small></h2>
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
            <form id="demo-form2" data-parsley-validate="" method="POST" class="form-horizontal form-label-left" novalidate="" action="{{URL('dashboard/product/'. $product->id ) }}" >
                @csrf
                @method('PUT')
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="product_name" >Product Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="product_name" name="product_name" required="required" class="form-control " value="{{ $product->product_name }}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="product_mark">Product Mark <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="product_mark" name="product_mark" required="required" value="{{ $product->product_mark }}" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="product_desc">Product Description <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea id="product_desc" required="required" class="form-control" name="product_desc" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">
                            {{ $product->product_desc }}
                        </textarea>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="price">Product price<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="number" id="price" name="price" required="required" value="{{ $product->price }}" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantity">Product Quantiy<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="number" id="quantity" name="quantity" required="required" value="{{ $product->quantity }}" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label for="category_id" class="col-form-label col-md-3 col-sm-3 label-align">Category</label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($productcategory as $procat)
                            @if ($procat->id == $product->category_id)
                            <option value="{{ $procat->id }}" selected="selected">{{ $procat->brand_name }}</option>
                            @else
                            <option value="{{ $procat->id }}">{{ $procat->brand_name }}</option>
                            @endif

                            @endforeach
                        </select>
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
