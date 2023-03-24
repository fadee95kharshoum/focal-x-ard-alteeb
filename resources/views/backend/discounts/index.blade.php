@extends('backend.layout.admin')

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
                <h4>Discount / إضافة كود خصم
                    <a href="{{ route('discounts.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">


                <form action="{{ route('discounts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="discount_title">Discount Title / عنوان الخصم</label>
                            <input type="text" name="discount_title" class="form-control" />
                        </div>
                        @error('discount_title')
                            <small class="text-danger"> {{$message}} </small>
                        @enderror



                        <div class="col-md-6 mb-3">
                            <label for="amount">Amount / قيمة الخصم</label>
                            <input type="text" name="amount" class="form-control" />
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

<div class="card">
    <div class="card-body">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                            Discounts Title
                        </th>
                        <th>
                            Discounts Amount
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($discounts as $discount)
                            <tr>
                                <td class="py-1">
                                    {{$discount->discount_title}}
                                </td>
                                <td>
                                    {{$discount->amount}}
                                </td>
                                <td>
                                        <a href="{{route('discounts.edit', $discount->id)}}" class=" mdi mdi-table-edit "> </a>
                                </td>
                                <td>
                                    <div>
                                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" class="form-check form-check-danger">
                                            @csrf
                                            @method('DELETE')
                                            <button class="danger">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection()
