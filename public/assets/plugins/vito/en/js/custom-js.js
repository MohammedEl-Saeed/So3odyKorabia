$(document).ready(function(){
    /*========================================== start sidebar ======================================== */
    $('.iq-sidebar #sidebar-scrollbar .iq-sidebar-menu ').on("click" , ".iq-menu > li" , function(){
        $(this).siblings('li.menu-open').children('.iq-submenu').slideUp(300);
        $(this).siblings('li.menu-open').children('.iq-submenu').removeClass('menu-open');
        $(this).siblings('li.menu-open').removeClass('menu-open');
    });
    /*========================================== end sidebar ========================================== */

    /*========================================== start add doctor ======================================== */
    $('#change-doctor-logo').on("click" ,".upload-button2", function(){
        $(this).next(".file-upload2").click();
        var inputVal =  $(this).next(".file-upload2").val();
        console.log(inputVal);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }
    $('#change-doctor-logo').on("change" ,".file-upload2", function(){
        readURL(this);
    });
    /*========================================== end add doctor ========================================== */
    $('#changeforminputs').on("change" , function(){
        var name = $(this).find("option:selected").data('name');
        if(name=="video chat"){
            $('#setperiodrow').removeClass('d-none');
            $('#setaddressrow').addClass('d-none');
        }else if(name=="Home visit"){
            $('#setperiodrow').addClass('d-none');
            $('#setaddressrow').removeClass('d-none');
        }else if(name=="medical"){
            $('#setperiodrow').removeClass('d-none');
            $('#setaddressrow').removeClass('d-none');
        }else{
            // $('#setperiodrow').removeClass('d-none');
            $('#setaddressrow').removeClass('d-none');
        }
    });
});