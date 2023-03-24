@extends('backend.layout.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                <h2>Welcome back,</h2>
                <p class="mb-md-0">Your Users dashboard Mangment.</p>
                </div>
                <div class="d-flex">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor"><a href="{{ route('users.index') }}">Users</a></p>
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

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        <div class="card">
            <div class="card-header">
                <h4>users / المستخدمين
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-end">Add User</a>
                </h4>
            </div>

            <div class="card-body">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>
                                  Product name
                                </th>
                                <th>
                                  Email
                                </th>
                                <th>
                                    Handle
                                  </th>

                            </thead>
                            <tbody>
                                @foreach ($users as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->email }}</td>
                                        <td>
                                          <a href="{{route('users.edit', $product->id)}}" class="mdi mdi-table-edit"></a>
                                        </td>
                                        <td>
                                          <div>
                                            <form action="{{ route('users.destroy', $product->id) }}" method="POST" class="form-check form-check-danger">
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
    </div>
</div>

@endsection()
