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
                <p class="text-primary mb-0 hover-cursor"><a style="text-decoration:none" href="{{ route('users.index') }}">Users </a>/ Edit User : {{ $user->name }}</p>
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
                    <h4>Edit User / تعديل مستخدم
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">User Name:</label>
                                <input value="{{ $user->name }}" type="text" name="name" class="form-control" />
                            </div>
                            @error('name')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                            <div class="col-md-12 mb-4">
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" />
                            </div>
                            @error('email')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                            <div class="col-md-12 mb-4">
                                <label for="password">Password:</label>
                                <input type="password" name="password" value="{{ $user->password }}" class="form-control" />
                            </div>
                            @error('password')
                                <small class="text-danger"> {{ $message }} </small>
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
