$(document).ready(function () {
    $("#btn").click(function () { 
        var pass1=$("#pass1").val();
        var pass2=$("#pass2").val();
        if(pass1!=pass2){
            alert("Mật khẩu xác nhận không khớp");
        }  
    });
});