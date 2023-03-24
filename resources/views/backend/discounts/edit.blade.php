@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif


            <div class="card-header">
                <h4>Discount / تعديل كود خصم
                    <a href="{{ route('discounts') }}" class="btn btn-primary btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">


                <form action="{{ route('discounts.update',$discount->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="discount_title">Discount Title / عنوان الخصم</label>
                            <input type="text" name="discount_title" class="form-control" value="{{ $discount->discount_title}}" />
                        </div>
                        @error('discount_title')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror



                        <div class="col-md-6 mb-3">
                            <label for="amount">Amount / قيمة الخصم</label>
                            <input type="text" name="amount" class="form-control" value="{{ $discount->amount }}" />
                        </div>
                        @error('amount')
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
</div>   <br><br>


@endsection()
