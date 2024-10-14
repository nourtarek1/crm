@extends('dashboard.layout.layout')
@section('body')
@section('title')
    ADD LIST
@stop
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
<div class="d-flex flex-column-fluid"> <!---start Dashbord-->


<div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
			
			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
	            <h5 class="text-dark font-weight-bold my-1 mr-5">
	                Add List	                	            </h5>
				<!--end::Page Title-->

	            					<!--begin::Breadcrumb-->
	                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
	                    							<li class="breadcrumb-item text-muted">
	                        	<a href="" class="text-muted">
	                            	Home	                        	</a>
							</li>
	                    							<li class="breadcrumb-item text-muted">
	                        	<a href="" class="text-muted">
	                            	Lists	                        	</a>
							</li>
	                    							<li class="breadcrumb-item text-muted">
	                        	<a href="" class="text-muted">
	                            	Add List	                        	</a>
							</li>
	                    	                </ul>
					<!--end::Breadcrumb-->
	            			</div>
			<!--end::Page Heading-->
        </div>
		<!--end::Info-->

    </div>
</div>
    <div class="container">
        <!--begin::Notice-->
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">

                        <div class="card-header flex-wrap border-0 pt-6 pb-0">

                            <div class="card-toolbar">
                                <div class="card-title">
                                    <a href="{{ route('select.index') }}" class="btn btn-danger font-weight-bolder">
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

                            <form method="POST" action="{{ route('select.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row mg-b-20">
                                    <div class="parsley-input col-md-6" id="fnWrapper">
                                        @php
                                            $typs = ['channel', 'status', 'action'];
                                        @endphp
                                        <label for="type">TYPE</label>
                                        <select class="form-select" aria-label="Default select example" name="type">
                                            <option selected>Open this select menu</option>
                                            @foreach ($typs as $typ)
                                                <option value="{{ $typ }}">{{ $typ }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label for="title">Key</label>
                                    <input type="text" name="key" class="form-control" id="key"
                                        placeholder="Key..." value="">
                                    </div>
                                    <div class="parsley-input col-md-6" id="fnWrapper">
                                        <label for="title">values</label>
                                        <input type="text" name="values" class="form-control" id="values"
                                            placeholder="values..." value="">

                                    </div>
                                </div>
                                <div class="form-group pt-2">
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#role').on('change', function() {
        console.log('#role');
        var role = $(this).find(':selected');
        var role_id = role.data('role-id');
        var role_slug = role.data('role-slug');
        var role_slug = role.data('user_type');




        $.ajax({
            url: "{{ URL::to('users') }}/create/",
            method: 'get',
            dataType: 'json',
            data: {
                role_id: role_id,
                role_slug: role_slug,
                user_type: user_type,
            }
        }).done(function(data) {

            console.log(data);



        });
    });
</script>





@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
@endsection
