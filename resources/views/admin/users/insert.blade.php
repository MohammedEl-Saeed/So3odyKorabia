@extends('admin.layout.base')

@section('title', 'Create User')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<div class="container-fluid">
    <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Add New User</h4>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}" alt="profile-pic">
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">Add Logo</a>
                                    <input class="file-upload" form="main-form-to-add-doctor" type="file" accept="image/*" name="image">
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
                            <h4 class="card-title">New User Information</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"  min="3"  max="100" placeholder="Enter a name">
                                        <span class="form-text text-muted">Please enter user name</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}"  min="10"  placeholder="Enter a phone">
                                        <span class="form-text text-muted">Please enter phone</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"  placeholder="Enter an email">
                                        <span class="form-text text-muted">Please enter e-mail</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}"  min="6"  placeholder="Enter a password">
                                        <span class="form-text text-muted">Please enter password</span>
                                    </div>
                                    <input type="hidden" value="User" name="type">

                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success ml-2 pull-right">Add New User</button>
                                    <button type="reset" class="btn btn-secondary pull-right">Cancel</button>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>
<!-- ========================== end new form to add doctor ================================ -->
@endsection
@section('script')
<script>
    $('.add-product-option').on('click' , function(){
        var copy = $('#repeated-product .repeated-products:last-of-type'),
            clone = copy.clone(true);
        $('#repeated-product').append(clone);
        $('#repeated-product .repeated-products:last-of-type').find('.price').val(null);
    });
    $('.delete-product-option').on('click' , function(){
        var len = $('#repeated-product .repeated-products').length;
        if(len > 1){
            $(this).parents('.repeated-products').remove();
        }
    });

</script>
@endsection
