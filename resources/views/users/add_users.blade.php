@extends('dashboard.layout.layout')
@section('body')
@section('title')
    ADD USER
@stop
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
<div class="d-flex flex-column-fluid">
    
    
<div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
			
			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
	            <h5 class="text-dark font-weight-bold my-1 mr-5">
	                Add User	                	            </h5>
				<!--end::Page Title-->

	            					<!--begin::Breadcrumb-->
	                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
	                    							<li class="breadcrumb-item text-muted">
	                        	<a href="" class="text-muted">
	                            	Home	                        	</a>
							</li>
	                    							<li class="breadcrumb-item text-muted">
	                        	<a href="" class="text-muted">
	                            	Users	                        	</a>
							</li>
	                    							<li class="breadcrumb-item text-muted">
	                        	<a href="" class="text-muted">
	                            	Add User	                        	</a>
							</li>
	                    	                </ul>
					<!--end::Breadcrumb-->
	            			</div>
			<!--end::Page Heading-->
        </div>
		<!--end::Info-->

    </div>
</div>
     <!---start Dashbord-->
    <div class="container">
        <!--begin::Notice-->
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">

                        <div class="card-header flex-wrap border-0 pt-6 pb-0">

                            <div class="card-toolbar">
                                <div class="card-title">
                                    <a href="{{ route('users.index') }}" class="btn btn-danger font-weight-bolder">
                                        <span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                    <path
                                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>BACK</a>
                                    <!--end::Button-->
                                </div>
                            </div>
                            <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="">

                                    <div class="row mg-b-20">
                                        <div class="parsley-input col-md-6" id="fnWrapper">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Name..." value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="Email..." value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row mg-b-20">

                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label for="phone">phone</label>
                                        <input type="phone" name="phone" class="form-control" id="phone"
                                            placeholder="phone..." value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password..." minlength="8">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        @php
                                            $usertypes = ['ADMIN', 'TEAMLEADR', 'SALES'];
                                        @endphp
                                        <label for="user_type" class="control-label"> User Type</label>
                                        <select name="user_type" id="user_type" class="form-control"
                                            onchange="inputData()">
                                            <!--placeholder-->
                                            <option value="" selected disabled> USERTYPE </option>
                                            @foreach ($usertypes as $usertype)
                                                <option value="{{ $usertype }}">{{ $usertype }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('user_type'))
                                            <span class="text-danger">{{ $errors->first('user_type') }}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="role">Select Role</label>
                                        <select class="role form-control" name="role" id="role">
                                            <option value="">Select Role...</option>
                                            @foreach ($roles as $role)
                                                <option data-role-id="{{ $role->id }}"
                                                    data-role-slug="{{ $role->slug }}" value="{{ $role->id }}">
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role'))
                                            <span class="text-danger">{{ $errors->first('role') }}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="parent_id">Leadeer Name</label>
                                        <select class="role form-control" name="parent_id" id="parent_id">
                                            <option value="">Leader Name...</option>
                                            @foreach ($teamLeaders as $leader)
                                                <option value="{{ $leader->id }}">
                                                    {{ $leader->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="unit">Select Units</label>
                                        <select class="form-select" multiple aria-label="Multiple select example"
                                            name="unit">
                                            <option value="">Select unit...</option>
                                            @foreach ($units as $unit)
                                                <option data-role-id="{{ $unit->id }}"
                                                    value="{{ $unit->id }}">
                                                    {{ $unit->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role'))
                                            <span class="text-danger">{{ $errors->first('role') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-header flex-wrap border-0 pt-6 pb-0 text-center">
                                    <div class="card-toolbar">
                                        <div class="card-title">
                                            <button class="btn btn-primary font-weight-bolder"
                                                type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
</div>
@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
@endsection
