@extends('layouts.main')

@section('title', 'View & edit employee data')

@section('stylesheet')
        <!-- select2 -->
{!! Html::style('assets/vendors/select2/dist/css/select2.min.css') !!}
        <!-- facancybox -->
{!! Html::style('assets/vendors/fancybox/jquery.fancybox.css') !!}
@endsection

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View & edit employee data</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Employee data<small>{{$employee->name}}</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{url('assets/images/users/'.$employee->foto)}}" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h2>{{$employee->name}}</h2>
                            <hr>
                            <a class="btn btn-success btn-dark btn-block" href="{{route('employee.index')}}"><i class="fa fa-undo"> Back</i></a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#personal_information" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal Info</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#settings" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Edit data</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#attachment" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Attachment</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="personal_information" aria-labelledby="home-tab">
                                        <span class="section">Personal Info</span>
                                        <ul class="list-unstyled user_data">
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">Nip</label>
                                                {{$employee->nip}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name</label>
                                                {{$employee->name}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                                                <i class="fa fa-envelope-o user-profile-icon"></i> {{$employee->email}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender</label>
                                                <i class="fa fa-venus-mars user-profile-icon"></i> {{ucfirst($employee->gender)}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="religion">Religion</label>
                                                {{ucfirst($employee->religion)}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pob">Place of birth</label>
                                                <i class="fa fa-map-o user-profile-icon"></i> {{$employee->pob}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date of birth</label>
                                                <i class="fa fa-calendar-o user-profile-icon"></i> {{tgl_indo($employee->dob)}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="age">Age</label>
                                                {{age($employee->dob)}} years old
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marital_status">Marital Status</label>
                                                {{ucfirst($employee->marital_status)}}
                                            </li>
                                            <span class="section"></span>
                                            @if($employee->marital_status=='married' ||  $employee->marital_status=='divorce')
                                                <li>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_of_children">Number of children</label>
                                                    <i class="fa fa-child user-profile-icon"></i> {{ucfirst($employee->number_of_children)}}
                                                </li>
                                                <span class="section"></span>
                                            @endif
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address</label>
                                                <i class="fa fa-map-marker user-profile-icon"></i> {{$employee->address}}
                                            </li>
                                            <span class="section"></span>
                                            <li class="m-top-xs">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_number">Phone Number</label>
                                                <i class="fa fa-phone user-profile-icon"></i> {{$employee->phone_number}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_education">Last Education</label>
                                                <i class="fa fa-graduation-cap user-profile-icon"></i> {{$employee->last_education}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appointment_date">Appointment Date</label>
                                                <i class="fa fa-briefcase user-profile-icon"></i> {{tgl_indo($employee->appointment_date)}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_no">Id Number</label>
                                                <i class="fa fa-credit-card user-profile-icon"></i> {{$employee->id_no}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_no">Tax Number</label>
                                                <i class="fa fa-credit-card-alt user-profile-icon"></i> {{$employee->tax_no}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position</label>
                                                {{$employee->position}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">Salary</label>
                                                <i class="fa fa-money user-profile-icon"></i> {{currency($employee->salary,'IDR')}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employment_status">Employment Status</label>
                                                {{ucfirst($employee->employment_status)}}
                                            </li>
                                            <span class="section"></span>
                                            <li>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="active">Active User</label>
                                                {!!$employee->active==1 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>'!!}
                                            </li>
                                            <span class="section"></span>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="settings" aria-labelledby="profile-tab">
                                        <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('employee.update', $employee->id) }}">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <span class="section">Edit data</span>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="nip" class="form-control col-md-7 col-xs-12" name="nip" minlength="6" type="text" value="{{$employee->nip}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="name" class="form-control col-md-7 col-xs-12" name="name" type="text" value="{{$employee->name}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" value="{{$employee->email}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pob">Place of Birth <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="pob" name="pob" class="form-control col-md-7 col-xs-12" value="{{$employee->pob}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date Of Birth <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="dob" class="form-control col-md-7 col-xs-12" id="dob" value="{{$employee->dob}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Religion <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class="religion form-control col-md-7 col-xs-12" name="religion" tabindex="-1">
                                                        <option></option>
                                                        {!! $employee->religion=='islam' ? '<option value="islam" selected="selected">Islam</option>' : '<option value="islam">Islam</option>' !!}
                                                        {!! $employee->religion=='katolik' ? '<option value="katolik" selected="selected">Katolik</option>' : '<option value="katolik">Katolik</option>' !!}
                                                        {!! $employee->religion=='protestan' ? '<option value="protestan" selected="selected">Protestan</option>' : '<option value="protestan">Protestan</option>' !!}
                                                        {!! $employee->religion=='hindu' ? '<option value="hindu" selected="selected">Hindu</option>' : '<option value="hindu">Hindu</option>' !!}
                                                        {!! $employee->religion=='budha' ? '<option value="budha" selected="selected">Budha</option>' : '<option value="budha">Budha</option>' !!}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <p>
                                                        <input type="radio" class="flat" name="gender" id="genderM" value="male" {!! $employee->gender=='male' ? 'checked="checked"' : '' !!}> Male
                                                    </p>
                                                    <p>
                                                        <input type="radio" class="flat" name="gender" id="genderF" value="female" {!! $employee->gender=='female' ? 'checked="checked"' : '' !!}> Female
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Marital Status <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class="marital_status form-control col-md-7 col-xs-12" name="marital_status" tabindex="-1">
                                                        <option></option>
                                                        {!! $employee->marital_status=='single' ? '<option value="single" selected="selected">Single</option>' : '<option value="single">Single</option>' !!}
                                                        {!! $employee->marital_status=='relationship' ? '<option value="relationship" selected="selected">In Relationship</option>' : '<option value="relationship">In Relationship</option>' !!}
                                                        {!! $employee->marital_status=='married' ? '<option value="married" selected="selected">Married</option>' : '<option value="married">Married</option>' !!}
                                                        {!! $employee->marital_status=='divorce' ? '<option value="divorce" selected="selected">Divorce</option>' : '<option value="divorce">Divorce</option>' !!}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label for="number_of_children" class="control-label col-md-3">Number of Child</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="number_of_children" type="number" name="number_of_children" min="0" max="100" class="form-control col-md-7 col-xs-12" value="{{$employee->number_of_children}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea id="address" name="address" class="form-control col-md-7 col-xs-12" rows="5">{{$employee->address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_number">Phone Number <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="tel" id="phone_number" name="phone_number" class="form-control col-md-7 col-xs-12" value="{{$employee->phone_number}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_education">Last Education <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="last_education" name="last_education" class="form-control col-md-7 col-xs-12" value="{{$employee->last_education}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appointment_date">Appointment Date <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="appointment_date" class="form-control col-md-7 col-xs-12" id="appointment_date" value="{{$employee->appointment_date}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="position" name="position" class="form-control col-md-7 col-xs-12" value="{{$employee->position}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_no">ID Number
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="id_no" name="id_no" class="form-control col-md-7 col-xs-12" value="{{$employee->id_no}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_no">Tax Number
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="tax_no" name="tax_no" class="form-control col-md-7 col-xs-12" value="{{$employee->tax_no}}">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">Salary <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="salary" name="salary" class="form-control col-md-7 col-xs-12" value="{{$employee->salary}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Employment Status <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class="employment_status form-control col-md-7 col-xs-12" name="employment_status" tabindex="-1">
                                                        <option></option>
                                                        {!! $employee->employment_status=='permanent' ? '<option value="permanent" selected="selected">Permanent</option>' : '<option value="permanent">Permanent</option>' !!}
                                                        {!! $employee->employment_status=='trial' ? '<option value="trial" selected="selected">Trial</option>' : '<option value="trial">Trial</option>' !!}
                                                        {!! $employee->employment_status=='apprentice' ? '<option value="apprentice" selected="selected">Apprentice</option>' : '<option value="apprentice">Apprentice</option>' !!}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Active</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <p>
                                                        <input type="radio" class="flat" name="active" id="active" value="1" {!! $employee->active==1 ? 'checked="checked"' : '' !!}> Active
                                                    </p>
                                                    <p>
                                                        <input type="radio" class="flat" name="active" id="inactive" value="0" {!! $employee->active==0 ? 'checked="checked"' : '' !!}> In Active
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <button id="send" type="submit" class="btn btn-success">Update data</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="attachment" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Data attachment</h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">

                                                        <div class="row">
                                                            @if(count($employee->attachments) == 0)
                                                                <h3>No attachment found.</h3>
                                                            @else
                                                                @foreach($employee->attachments as $attachment)
                                                                    <div class="col-md-4">
                                                                        <div class="thumbnail">
                                                                            <div class="image view view-first">
                                                                                <img style="width: 100%; display: block;" src="{{url('assets/images/attachments/'.$attachment->file)}}" alt="image" />
                                                                                <div class="mask">
                                                                                    <p>{{$attachment->title}}</p>
                                                                                    <div class="tools tools-bottom">
                                                                                        <a data-toggle="tooltip" data-placement="top" title="View" id="attachment_img" href="{{url('assets/images/attachments/'.$attachment->file)}}" title="{{$attachment->title}}"><i class="fa fa-search"></i></a>
                                                                                        <a data-toggle="tooltip" data-placement="top" title="Download" href="{{route('profile.downloadattachment', $attachment->file)}}"><i class="fa fa-download"></i></a>
                                                                                        <a data-toggle="tooltip" data-placement="top" title="Delete" href="{{route('profile.deleteattachment',$attachment->id)}}" onclick="return confirm('Are you sure to delete this attachment?')"><i class="fa fa-times"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="caption">
                                                                                <p>{{$attachment->file}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    {!! Html::script('assets/js/fileinput/show_password_onfocus.js') !!}
    {!! Html::script('assets/js/fileinput/bootstrap-filestyle.min.js') !!}
            <!-- facancybox -->
    {!! Html::script('assets/vendors/fancybox/jquery.fancybox.pack.js') !!}
    @endsection
    @section('scripts')
            <!-- validator -->
    <script>
        $(document).ready(function() {
            $('#dob').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_2",
                format: 'YYYY-MM-DD'
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });

            $('#appointment_date').daterangepicker({
                singleDatePicker: true,
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

            $("#attachment_img").fancybox({
                helpers: {
                    title : {
                        type : 'float'
                    }
                }
            });

            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".hasawao"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div>'+
                            '<div class="item form-group">'+
                            '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Title <span class="required">*</span></label>'+
                            '<div class="col-md-6 col-sm-6 col-xs-12">'+
                            '<input type="text" id="title" name="title_attachment[]" class="form-control col-md-7 col-xs-12">'+
                            '</div>'+
                            '</div>'+
                            '<div class="item form-group">'+
                            '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="attachment">Attachment <span class="required">*</span></label>'+
                            '<div class="col-md-6 col-sm-6 col-xs-12">'+
                            '<input type="file" class="filestyle" data-buttonName="btn-success" name="attachment_file[]" data-iconName="fa fa-file-image-o" data-size="sm" data-buttonText="Choose a attachment" data-placeholder="No attachment">'+
                            '</div>'+
                            '</div>'+
                            '<a href="#" class="remove_field btn btn-danger btn-sm" style="margin-left: 475px; margin-bottom: 10px"><i class="fa fa-minus"></i> Remove</a>'+
                            '</div>');
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            });

        });
    </script>
    <!-- /validator -->
@endsection