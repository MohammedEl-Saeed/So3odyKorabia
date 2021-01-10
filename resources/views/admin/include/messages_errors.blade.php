@if($errors->any())
    <div class="alert-2 alert-danger" role="alert">
        @foreach($errors->all() as $error)
             <li class="p-2">{{$error}}</li>
        @endforeach
    </div>
@endif


