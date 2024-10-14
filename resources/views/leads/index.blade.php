@extends('dashboard.layout.layout')
@section('body')
@section('title')
    LEADS List
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
@endsection
<input id="my_route" value={{ route('leads.destroy', '') }} class="d-none">
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->

    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid"> <!---start Dashbord-->
        <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">

                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            View Leads </h5>
                        <!--end::Page Title-->

                        <!--begin::Breadcrumb-->
                        <ul
                            class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">
                                    Home </a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">
                                    Leads </a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">
                                    View Leads </a>
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

                                @if (session()->has('add'))
                                    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show"
                                        role="alert">
                                        <strong>{{ session()->get('add') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if (session()->has('edit'))
                                    <div class="alert alert-info alert-dismissible d-flex align-items-center fade show"
                                        role="alert">
                                        <strong>{{ session()->get('edit') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if (session()->has('delete'))
                                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"
                                        role="alert">
                                        <strong>{{ session()->get('delete') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="card-toolbar">
                                    <div class="card-title">
                                        <a href="{{ route('leads.create') }}"
                                            class="btn btn-primary font-weight-bolder">
                                            <span class="svg-icon svg-icon-md">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                                        <path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>ADD LEADS</a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive hoverable-table">
                                <table class="table table-bordered" id="myTable" data-page-length='50'
                                    style=" text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p border-bottom-0">Id</th>
                                            <th class="wd-15p border-bottom-0">Name</th>
                                            <th class="wd-20p border-bottom-0"> Phone</th>
                                            <th class="wd-20p border-bottom-0"> Channel</th>
                                            <th class="wd-20p border-bottom-0"> Status</th>
                                            <th class="wd-20p border-bottom-0"> Unit Name</th>
                                            <th class="wd-20p border-bottom-0"> User name</th>
                                            <th class="wd-20p border-bottom-0"> Note</th>
                                            <th class="wd-20p border-bottom-0"> action</th>
                                            <th class="wd-20p border-bottom-0"> </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($leads as $lead)
                                            <tr>
                                                <td>{{ $lead->id }}</td>
                                                <td>{{ $lead->name }}</td>
                                                <td>{{ $lead->phone }}</td>
                                                <td>{{ $lead->channel }}</td>
                                                <td>{{ $lead->status }}</td>
                                                <td>
                                                    <span class="badge badge-secondary">
                                                        {{ $lead->unit->title }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-secondary">
                                                        {{ $lead->sales_id }}
                                                    </span>
                                                </td>
                                                <td>{{ $lead->note }}</td>
                                                <td>{{ $lead->action }}</td>

                                                <td>
                                                    <a href="{{ route('leads.edit', $lead->id) }}"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal"
                                                        data-leadsid="{{ $lead['id'] }}"><i
                                                            class="fas fa-trash-alt"></i></a>

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
            <!--end::Card-->
        </div>
    </div>

    <!--/div-->
    <!--model delete-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "delete" If you realy want to delete this .</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('leads.destroy', $lead['id']) }}">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            ('#deleteModal').on('show.bs.modal', function(event) {
                var button = (event.relatedTarget)
                var leads_id = button.data('leadsid')

                var modal = $(this)
                modal.find('form').attr('action', $("#my_route").val() + "/" + leads_id);
            })
        </script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>

    @endsection
@endsection
