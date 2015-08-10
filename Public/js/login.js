//function Person(name){
//    this.getName = function(){
//        return name;
//    }
//    this.setName = function(value){
//        name = value
//    }
//}
//var person = new Person('Nicholas');
//alert(person.getName());
//console.log(person);
function login(){
    var post = {};
    post.username = $('input[name="username"]').val();
    post.password = $('input[name="password"]').val();
    if(post.username||post.password){
        $.post(window.ajaxAddress+'/User/login.html',post, function (data) {
            if(data=='true'){
                window.location.href="index.html";
            }else{
                alert('密码不正确');
            }
        })
    }else{
        alert('登陆信息还未填写完整');
    }
}
function register(){
    window.location.href="register.html";
}
$(document).ready(function(){

})