@extends('admin.layout.base')

@section('title', 'Create user')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<form id="main-form-to-add-doctor" class="form" method="post" action="{{route('users.update', $item->id)}}" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Edit New User</h4>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                @if($item->image)
                                    <img class="profile-pic img-fluid" src="{{$item->image}}" alt="profile-pic">
                                @else
                                    <img class="profile-pic img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}" alt="profile-pic">
                                @endif
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">Edit Image</a>
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
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $item->name)}}"  min="3"  max="100" placeholder="Enter a name">
                                    <span class="form-text text-muted">Please enter user name</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone', $item->phone)}}"  min="10"  placeholder="Enter a phone">
                                    <span class="form-text text-muted">Please enter phone</span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email', $item->email)}}"  placeholder="Enter an email">
                                    <span class="form-text text-muted">Please enter e-mail</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" min="6" placeholder="Enter a password">
                                    <span class="form-text text-muted">Please enter password</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Password Confirmation:</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" min="6" placeholder="Enter a password">
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
<!-- ========================== end new form to add doctor ================================ -->
@endsection
@section('script')
<script>
    $('.add-user-option').on('click' , function(){
        var copy = $('#repeated-user .repeated-users:last-of-type'),
            clone = copy.clone(true);
        $('#repeated-user').append(clone);
        $('#repeated-user .repeated-users:last-of-type').find('.price').val(null);
    });
    $('.delete-user-option').on('click' , function(){
        var len = $('#repeated-user .repeated-users').length;
        if(len > 1){
            $(this).parents('.repeated-users').remove();
        }
    });

</script>
@endsection
