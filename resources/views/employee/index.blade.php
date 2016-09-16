@extends('layouts.main')

@section('title', 'List Employees')

@section('stylesheet')
    <!-- Datatables -->
    {!! Html::style('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') !!}
    {!! Html::style('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') !!}
    {!! Html::style('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') !!}
    {!! Html::style('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') !!}
@endsection

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>List Employees</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List data <small>Employees</small></h2>
                        <a href="{{route('employee.create')}}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Add new</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nip</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Position</th>
                                <th>Role Access</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                {!! Form::open(array('route' => ['employee.asignrole'])) !!}
                                <td>{{$employee->nip}}<input type="hidden" name="nip" value="{{$employee->nip}}"></td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone_number}}</td>
                                <td>{{$employee->position}}</td>
                                <td>
                                    <div class="btn-group btn-group-xs" data-toggle="buttons">
                                        <label class="btn btn-default {{$employee->hasRole('user') ? 'active' : ''}}">
                                            <input type="radio" class="sr-only" id="role_user" name="role" value="User" {{$employee->hasRole('user') ? 'checked' : ''}}>
                                                User
                                        </label>
                                        <label class="btn btn-default" {{$employee->hasRole('author') ? 'active' : ''}}>
                                            <input type="radio" class="sr-only" id="role_author" name="role" value="Author" {{$employee->hasRole('author') ? 'checked' : ''}}>
                                                Author
                                        </label>
                                        <label class="btn btn-default {{$employee->hasRole('admin') ? 'active' : ''}}">
                                            <input type="radio" class="sr-only" id="role_admin" name="role" value="Admin" {{$employee->hasRole('admin') ? 'checked' : ''}}>
                                                Admin
                                        </label>
                                    </div>
                                </td>
                                <td><a class="btn {{$employee->active==1 ? 'btn-primary' : 'btn-danger'}} btn-xs">{{$employee->active==1 ? 'Active' : 'Inactive'}}</a></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="btn btn-info btn-xs" href="{{route('employee.edit',$employee->id)}}" data-toggle="tooltip" data-placement="top" title="View Or Edit">
                                            <i class="fa fa-search-plus"></i>
                                        </a>

                                        <button type="submit" class="btn btn-warning btn-xs" href="" data-toggle="tooltip" data-placement="top" title="Assign Role">
                                            <i class="fa fa-check-square-o"></i>
                                        </button>

                                        <a class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete" onclick="(new PNotify({title: 'Confirmation deleted',text: 'Are you sure to delete this data?',icon: 'glyphicon glyphicon-question-sign',hide: false,confirm: {confirm: true},buttons: {closer: false,sticker: false},history: {history: false},addclass: 'stack-modal',stack: {'dir1': 'down', 'dir2': 'right', 'modal': true}})).get().on('pnotify.confirm', function(){window.location.href = '{{route('employee.destroyemployee', $employee->id)}}';}).on('pnotify.cancel', function(){close();});">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>
                                    </div>
                                </td>
                                {!! Form::close() !!}
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Datatables -->
    {!! Html::script('assets/vendors/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') !!}
    {!! Html::script('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') !!}
    {!! Html::script('assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js') !!}
    {!! Html::script('assets/vendors/jszip/dist/jszip.min.js') !!}
    {!! Html::script('assets/vendors/pdfmake/build/pdfmake.min.js') !!}
    {!! Html::script('assets/vendors/pdfmake/build/vfs_fonts.js') !!}
@endsection
@section('scripts')
    <!-- Datatables -->
    <script>
        $(document).ready(function() {
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            {
                                extend: "copy",
                                className: "btn-sm"
                            },
                            {
                                extend: "csv",
                                className: "btn-sm"
                            },
                            {
                                extend: "excel",
                                className: "btn-sm"
                            },
                            {
                                extend: "pdfHtml5",
                                className: "btn-sm"
                            },
                            {
                                extend: "print",
                                className: "btn-sm"
                            },
                        ],
                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            $('#datatable').dataTable();

            $('#datatable-keytable').DataTable({
                keys: true
            });

            $('#datatable-responsive').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });

            $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });

            var $datatable = $('#datatable-checkbox');

            $datatable.dataTable({
                'order': [[ 1, 'asc' ]],
                'columnDefs': [
                    { orderable: false, targets: [0] }
                ]
            });
            $datatable.on('draw.dt', function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green'
                });
            });

            TableManageButtons.init();
        });
    </script>
    <!-- /Datatables -->
@endsection