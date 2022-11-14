$(document).ready(function () {
    $("#btn1").click(function () { 
        var username=$("#username").val();
        var pass=$("#pass").val();
        if(username=="admin"&&pass=="12345"){
            alert("chào");
        }
        else{
            alert("Sai tên đăng nhập hoặc mật khẩu");
        }
        
    });
});