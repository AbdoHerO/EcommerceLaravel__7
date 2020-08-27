@extends('website.backend.layouts.main')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2><small>Users</small></h2>
            <!-- Message Ajoute -->
            <h4>
                @if(Session::has('messageAdd'))
            <div class="alert alert-primary" role="alert">
                {{Session::get('messageAdd')}}
            </div>
            @endif
            </h4>

            <!-- Message Update -->
            <h4>
                @if(Session::has('messageUpdate'))
            <div class="alert alert-warning" role="alert">
                {{Session::get('messageUpdate')}}
            </div>
            @endif
            </h4>


            <!-- Message Delete -->
            <h4>
                @if(Session::has('messageDelete'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('messageDelete')}}
            </div>
            @endif
            </h4>


            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="datatable_length"><label>Show <select
                                                name="datatable_length" aria-controls="datatable"
                                                class="form-control input-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="datatable_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control input-sm" placeholder=""
                                                aria-controls="datatable"></label></div>
                                    <div><a href="{{URL('dashboard/product/create ')}}"
                                            class="btn btn-success text-center">Add
                                            Product</a></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer"
                                        style="width:100%" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 132px;">
                                                    ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 215px;">Image Product</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 96px;">Product Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 44px;">Product Mark</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 44px;">Product Price </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 44px;">Product Quantity</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 44px;">Product Category</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 88px;">Product Desc</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 73px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 73px;">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr role="row" class="odd">
                                                <td class="sorting_1">00</td>
                                                <td>R</td>
                                                <td>RR</td>
                                                <td>RRR</td>
                                                <td>RRRR</td>
                                                <td>RRRRR</td>
                                                <td>RRRRRR</td>
                                            </tr> --}}
                                            @foreach ($product as $prod)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $prod->id }}</td>
                                                <td>
                                                    @foreach ($productImage as $prodimg)
                                                    @if ($prodimg->product->id == $prod->id)
                                                    <img src="{{ asset('images/'.$prodimg->image_product) }}" style="width: 50px;height: 50px;" alt="">
                                                    @break
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $prod->product_name }}</td>
                                                <td>{{ $prod->product_mark }}</td>
                                                <td>{{ $prod->price }}</td>
                                                <td>{{ $prod->quantity }}</td>
                                                <td>{{ $prod->category->brand_name }}</td>
                                                <td>{{ $prod->product_desc }}</td>
                                                <td>{{ $prod->status }}</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <div class="btn-group">
                                                            <form
                                                                action="{{URL('dashboard/product/' . $prod->id . '/edit')}}"
                                                                method="get">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-secondary ml-1 mr-1">Edit</button>
                                                            </form>
                                                            {{--action="{{ route('product.destroy', $prod->id) }}" --}}
                                                            <form  method="post" action="{{URL('dashboard/product/' . $prod->id)}}">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                    class="btn btn-secondary ml-1 mr-1">Remove</button>
                                                            </form>
                                                            <form
                                                                action="{{URL('dashboard/product/' . $prod->id)}}"
                                                                method="get">

                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-secondary ml-1 mr-1">Show</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" id="datatable_previous"><a
                                                    href="#" aria-controls="datatable" data-dt-idx="0"
                                                    tabindex="0">Previous</a></li>
                                            <li class="paginate_button active"><a href="#" aria-controls="datatable"
                                                    data-dt-idx="1" tabindex="0">1</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="datatable"
                                                    data-dt-idx="2" tabindex="0">2</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="datatable"
                                                    data-dt-idx="3" tabindex="0">3</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="datatable"
                                                    data-dt-idx="4" tabindex="0">4</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="datatable"
                                                    data-dt-idx="5" tabindex="0">5</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="datatable"
                                                    data-dt-idx="6" tabindex="0">6</a></li>
                                            <li class="paginate_button next" id="datatable_next"><a href="#"
                                                    aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
