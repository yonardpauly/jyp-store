@extends('admin-dashboard.main')
@section('title', 'Edit')

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-md-1">
                        <h3 class="title-5 m-b-35">Edit Item</h3>
                        <hr>
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Reminder</h4>
                            <hr>
                            <p>
                                If you're creating new product and it returns an error "<code>The name is already been taken</code>" then it might be stored in <strong>Recycle Bin</strong>. You may restore that item in recycle bin and edit the information, thank you!
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-10 offset-md-1">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="text-center">EDIT {{ $product->name }}</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('products.update', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">

                                        <label for="name" class="control-label mb-1">{{ __('Name') }}</label>
                                        <input id="name" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" aria-required="true" aria-invalid="false" value="{{ $product->name }}">

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="select" class=" form-control-label">{{ __('Product Type') }}</label>
                                        <select name="product_type" id="product_type" class="form-control{{ $errors->has('product_type') ? ' is-invalid' : '' }}">
                                            @foreach( $cats as $cat )
                                                <option value="{{ $cat->id }}" {{ ($product->item_category->id == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('product_type'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('product_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group has-success">
                                        <label for="description" class="control-label mb-1">{{ __('Description') }}</label>
                                        <textarea name="description" id="description" rows="3" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $product->description }}</textarea>

                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="row form-group">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">{{ __('Price') }}</label>
                                                <input id="price" name="price" type="number" class="form-control cc-exp{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ $product->price }}"></span>
                                            </div>

                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <label for="quantity" class="control-label mb-1">{{ __('Quantity') }}</label>
                                            <div class="input-group">
                                                <input id="quantity" name="quantity" type="number" class="form-control cc-cvc{{ $errors->has('quantity') ? ' is-invalid' : '' }}" value="{{ $product->quantity }}">
                                            </div>

                                            @if ($errors->has('quantity'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('quantity') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">
                                            <i class="fa fa-dot-circle-o fa-lg"></i> Submit
                                        </button>
                                        <a href="{{ route('products.index') }}" class="btn btn-lg btn-danger btn-block">
                                            <i class="fa fa-dot-circle-o fa-lg"></i> Cancel
                                        </a>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection