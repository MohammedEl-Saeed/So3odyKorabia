@extends('admin.layout.base')

@section('title', 'Create user')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<div class="container-fluid">
    <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('users.update')}}" enctype="multipart/form-data">
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
                                <img class="profile-pic img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}" alt="profile-pic">
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">Edit Logo</a>
                                    <input class="file-upload" required form="main-form-to-add-doctor" type="file" accept="image/*" name="logo">
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
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$item->name)}}"  min="3"  max="100" placeholder="Enter a name">
                                        <span class="form-text text-muted">Please enter user name</span>
                                    </div>
                                    <input type="hidden" value="User" name="type">
                                    <div class="form-group col-md-12">
                                        <label>description *</label>
                                        <textarea class="form-control"   name="description" placeholder="Enter a Description"
                                            rows="3">{{old('description',$item->description)}}</textarea>
                                        <span class="form-text text-muted">Please enter a menu within text length range 50 and 100.</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success ml-2 pull-right">Edit New User</button>
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
