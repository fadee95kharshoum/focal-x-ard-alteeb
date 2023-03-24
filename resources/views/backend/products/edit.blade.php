@extends('backend.layout.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                <h2>Welcome back,</h2>
                <p class="mb-md-0">Your Products dashboard Mangment.</p>
                </div>
                <div class="d-flex">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor"><a style="text-decoration:none" href="{{ route('products.index') }}">Products </a>/ Edit Product : {{ $product->name }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                <i class="mdi mdi-download text-muted"></i>
                </button>
                <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                <i class="mdi mdi-clock-outline text-muted"></i>
                </button>
                <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                <i class="mdi mdi-plus text-muted"></i>
                </button>
                <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Product / تعديل منتج
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">


                <form action="
                {{ route('products.update',$product->id) }}
                " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" />
                        </div>
                        @error('product_name')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror

                        <div class="col-md-6 mb-4">
                            <label for="product_type">Product Type</label> <br>
                            <select class="form-control" name="product_type" id="">
                                <option value="{{$product->product_type}}" style="color :chartreuse">{{ $product->product_type }}</option>

                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Unisex">Unisex</option>
                            </select>
                        </div>
                        @error('product_type')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror

                        <div class="col-md-12 mb-4">
                            <label for="component">Component</label>
                            <textarea name="component" id="" rows="3" class="form-control" > {{ $product->component }}</textarea>
                        </div>
                        @error('component')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror

                        <div class="col-md-6 mb-4">
                            <label for="name">Image</label>
                            <input type="file" name="images" class="form-control" value="{{$product->images}}" />
                        </div>
                        @error('image')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror

                        <div class="col-md-12 mb-4">
                            <label for="first_smell">First Smell / افتتاحية العطر</label>
                            <input type="text" name="first_smell" class="form-control" value="{{$product->first_smell}}"/>
                        </div>
                        @error('first_smell')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror

                        <div class="col-md-12 mb-4">
                            <label for="second_smell">Second Smell / قلب العطر</label>
                            <input type="text" name="second_smell" class="form-control" value="{{$product->second_smell}}" />
                        </div>
                        @error('second_smell')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror

                        <div class="col-md-12 mb-4">
                            <label for="last_smell">Last Smell / قاعدة العطر</label>
                            <input type="text" name="last_smell" class="form-control" value="{{$product->last_smell}}" />
                        </div>
                        @error('last_smell')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror

                        <div class="col-md-12 mb-4">
                            <label for="last_smell">Price</label>
                            <input type="text" name="price" class="form-control" value="{{$product->price}}" />
                        </div>
                        @error('price')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror


                        <div class="col-md-12 mb-4">
                            <label for="last_smell">Discount</label>
                            <select class="form-control" name="discount_id" id="">
                                {{-- <option value="{{ $product->discount->id }}"> {{ $product->discount->discount_title }}</option>

                                <option value="1"> لا يوجد خصم مطبق </option>
                                @foreach ($discounts as $discount)
                                    <option value="{{ $discount->id }}"> {{ $discount->discount_title }} </option>
                                @endforeach --}}
                            </select>
                        </div>
                        @error('discount')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror

                        <div class="col-md-12 mb-4">
                            <button class="btn btn-primary float-end" type="submit">
                                Save
                            </button>
                        </div>
                    </div>



                </form>


            </div>
        </div>
    </div>
</div>

@endsection()
