@extends('admin-dashboard.main')
@section('title', 'Products')

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @if( session('addSuccess') )
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Success</span>
                                {{ session('addSuccess') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif( session('updateSuccess') )
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Success</span>
                                {{ session('updateSuccess') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif( session('deleteSuccess') )
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Success</span>
                                {{ session('deleteSuccess') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">All Products</h3>
                        <hr>
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Reminder</h4>
                            <hr>
                            <p>
                                If you're creating new product and it returns an error "<code>The name is already been taken</code>" then it might be stored in <strong>Recycle Bin</strong>. You may restore that item in recycle bin and edit the information, thank you!
                            </p>
                        </div>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <a href="#" class="au-btn-filter">
                                        <i class="fa fa-trash"></i>Recycle Bin
                                    </a>
                                </div>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{ route('products.create') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add item
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Slug</th>
                                        <th>Date Modified</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( count($products) < 1 )
                                        <tr class="tr-shadow">
                                            <td colspan="7" class="bg-warning text-center">No items found</td>
                                        </tr>
                                    @else
                                        @foreach( $products as $product )
                                            <tr class="tr-shadow">
                                                <td>{{ $product->name }}</td>
                                                <td>
                                                    <span class="status--process">{{ $product->item_category->name }}</span>
                                                </td>
                                                <td class="desc">{{ $product->price }}.00</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->slug }}</td>
                                                <td>{{ $product->updated_at }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('products.edit', $product->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit this item">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="item" title="Delete this product">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    
                                    <tr class="spacer"></tr>
                                </tbody>
                            </table>
                            <div class="container">
                                <div class="row">
                                    <div class="ml-auto">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection