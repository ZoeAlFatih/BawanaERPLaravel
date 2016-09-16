@extends('layouts.main')

@section('title', 'Add new employee')

@section('stylesheet')
    <!-- select2 -->
    {!! Html::style('assets/vendors/select2/dist/css/select2.min.css') !!}
@endsection

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add new employee</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form<small>add new employee</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('employee.store') }}">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="nip" class="form-control col-md-7 col-xs-12" name="nip" minlength="6" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="name" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pob">Place of Birth <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="pob" name="pob" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date Of Birth <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="dob" class="form-control col-md-7 col-xs-12" id="dob">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Religion <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="religion form-control col-md-7 col-xs-12" name="religion" tabindex="-1">
                                        <option></option>
                                        <option value="islam">Islam</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="protestan">Protestan</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <p>
                                        <input type="radio" class="flat" name="gender" id="genderM" value="male"> Male
                                    </p>
                                    <p>
                                        <input type="radio" class="flat" name="gender" id="genderF" value="female"> Female
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Marital Status <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="marital_status form-control col-md-7 col-xs-12" name="marital_status" tabindex="-1">
                                        <option></option>
                                        <option value="single">Single</option>
                                        <option value="relationship">In Relationship</option>
                                        <option value="married">Married</option>
                                        <option value="divorce">Divorce</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" id="child_no">
                                <label for="number_of_children" class="control-label col-md-3">Number of Child</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="number_of_children" type="number" name="number_of_children" min="0" max="100" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="address" name="address" class="form-control col-md-7 col-xs-12" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_number">Phone Number <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="tel" id="phone_number" name="phone_number" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_education">Last Education <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last_education" name="last_education" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appointment_date">Appointment Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="appointment_date" class="form-control col-md-7 col-xs-12" id="appointment_date">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="position" name="position" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_no">ID Number
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="id_no" name="id_no" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_no">Tax Number
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="tax_no" name="tax_no" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">Salary <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="salary" name="salary" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Employment Status <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="employment_status form-control col-md-7 col-xs-12" name="employment_status" tabindex="-1">
                                        <option></option>
                                        <option value="permanent">Permanent</option>
                                        <option value="trial">Trial</option>
                                        <option value="apprentice">Apprentice</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Active <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <p>
                                        <input type="radio" class="flat" name="active" id="active" value="1"> Active
                                    </p>
                                    <p>
                                        <input type="radio" class="flat" name="active" id="inactive" value="0"> In Active
                                    </p>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Save</button>
                                    <a href="{{route('employee.index')}}" class="btn btn-warning">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <!-- bootstrap-progressbar -->
    {!! Html::script('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}
    <!-- bootstrap-daterangepicker -->
    {!! Html::script('assets/js/moment/moment.min.js') !!}
    {!! Html::script('assets/js/datepicker/daterangepicker.js') !!}
    <!-- select2 -->
    {!! Html::script('assets/vendors/select2/dist/js/select2.full.min.js') !!}
    @endsection
    @section('scripts')
    <script>
        $(document).ready(function() {
            $('#dob').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                calender_style: "picker_2",
                format: 'YYYY-MM-DD'
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });

            $('#appointment_date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                calender_style: "picker_2",
                format: 'YYYY-MM-DD'
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });

            $(".religion").select2({
                placeholder: "Select a religion",
                allowClear: true
            });
            $(".marital_status").select2({
                placeholder: "Select a Marital Status",
                allowClear: true
            });
            $(".employment_status").select2({
                placeholder: "Select a Employment Status",
                allowClear: true
            });

            $('#child_no').hide();
            $('.marital_status').change(function(){
                if($('.marital_status').val() == 'married' || $('.marital_status').val() == 'divorce' ) {
                    $('#child_no').show();
                } else {
                    $('#child_no').hide();
                }
            });

        });
    </script>
    @endsection