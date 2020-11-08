@extends('admin.layout.base')

@section('title', 'family doctor')

@section('content')

@section('main_header', 'Doctor Section')
@section('sub_header', 'Insert Doctor')

<!-- ========================== start new form to add doctor ============================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Add New Doctor</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}" alt="profile-pic">
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">Add image</a>
                                    <input class="file-upload" required form="main-form-to-add-doctor" type="file" accept="image/*" name="image">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                <img id ="blah" class="profile-pic2 img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}" alt="profile-pic">
                                <div class="p-image2" id="change-doctor-logo">
                                    <a href="#" class="upload-button2 btn iq-bg-primary">Add logo</a>
                                    <input class="file-upload2" type="file" accept="image/*" form="main-form-to-add-doctor" name="logo">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">New doctor Information</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('admin.doctor.store')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="fname">First Name:</label>
                                        <input type="text" class="form-control" id="fname" name="first_name" value="{{old('first_name')}}" required min="3" required max="100" placeholder="Enter first name">
                                        <span class="form-text text-muted">Please enter your first name</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" required name="last_name" value="{{old('last_name')}}" required min="3" max="100" class="form-control" placeholder="Enter last name" />
                                        <span class="form-text text-muted">Please enter your Last name</span>
                                    </div>
                                    <input type="hidden" name="type" value="Doctor">
                                    <div class="form-group col-md-6">
                                        <label for="mobno">Mobile Number:</label>
                                        <input type="Phone" name="phone" value="{{old('phone')}}" required min="9" max="100" class="form-control" placeholder="Enter Phone" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" required name="email" value="{{old('email')}}" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Medical Category</label>
                                            <select class="form-control" required name="department_id" value="{{old('department_id')}}">
                                                <option value="">Select</option>
                                                @if(count($departments) > 0)
                                                @foreach($departments as $department)

                                                <option value="{{$department->id}}" @if(old('department_id') == $department->id) selected @endif>{{$department->name}}</option>

                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div id="kt_repeater_1">
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Services:</label>
                                                <div data-repeater-list="user_services" class="col-md-10">
                                                    <div data-repeater-item="" class="form-group row align-items-center">
                                                        <div class="row w-100">
                                                            <div class="col-md-4">
                                                                <label>Service:</label>
                                                                <select required class="form-control "
                                                                    name="service_id" value="{{old('service_id')}}">
                                                                    @if(count($services) > 0)
                                                                    @foreach($services as $service)
                                                                    <option value="{{$service->id}}" @if(old('service_id') == $service->id) selected @endif>{{$service->name}}</option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                                <div class="d-md-none mb-2"></div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Price:</label>
                                                                <input type="number" name="price" value="{{old('price')}}" class="form-control" min="0" required
                                                                    placeholder="Enter Price" />
                                                                <div class="d-md-none mb-2"></div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>System Percentage:</label>
                                                                <input type="number" name="system_percentage" value="{{old('system_percentage')}}" class="form-control" min="0" required
                                                                    placeholder="System Percentage" />
                                                                <div class="d-md-none mb-2"></div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <a href="javascript:;" data-repeater-delete=""
                                                                    class="btn btn-sm font-weight-bolder btn-light-danger mt-5">
                                                                    <i class="la la-trash-o"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label text-right"></label>
                                                <div class="col-lg-4">
                                                    <a href="javascript:;" data-repeater-create=""
                                                        class="btn btn-sm font-weight-bolder btn-light-primary">
                                                        <i class="la la-plus"></i>Add</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>birth date *</label>
                                            <input class="form-control" required type="date" name="birth_date" value="{{old('birth_date')}}"
                                                id="example-date-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Gender *</label>
                                        <div class="col-sm-12">
                                            <div class="form-check radio-inline">
                                                <label class="radio radio-outline">
                                                    <input type="radio" required name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : ''}}/> Male
                                                </label>
                                                <label class="radio radio-outline">
                                                    <input type="radio" required name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : ''}}/> Female
                                                </label>

                                            </div>
                                            <span class="form-text text-muted">Please select an option</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>description *</label>
                                        <textarea class="form-control"  required name="description" placeholder="Enter a Description"
                                            rows="3">{{old('description')}}</textarea>
                                        <span class="form-text text-muted">Please enter a menu within text length range 50 and 100.</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success ml-2 pull-right">Add New Doctor</button>
                                    <button type="reset" class="btn btn-secondary pull-right">Cancel</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- ========================== end new form to add doctor ================================ -->


@endsection
