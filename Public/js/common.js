/**
 * Created by ss on 15/7/21.
 */
$('html').css('font-size',$(window).width()/1500*16+'px');
$('body').css('font-size',$(window).width()/1500*16+'px');
$('.personItem-content-column2 .more').click(function(){
    $('.dialog').show();
})
$('.dialog-bottom-btn').click(function(){
    $('.dialog').hide();
})
$('.more.left').click(function(){
    $('.sidebar').show();
    $('body').append('<div class="black" onclick="hideSideBar()" style="position: absolute;top: 0;left: 0;background: rgba(0,0,0,0.3);width: 100%;height: '+$(document).height()+'px"></div>')
})
function hideSideBar(){
    $('.sidebar').hide();
    $('.black').remove();
}
$('.search').click(function(){
    $('.header-search').show();
})
$('body').click(function (e) {
    console.log(e.target);
})
function hackDate(str){
    var reg = new RegExp('-',"g");
    try{
        var date = new Date(str.replace(reg,'/'));
        return date;
    }catch(e){
        alert(123);
        var ymd = (str.split(' '))[0];
        var hms = (str.split(' '))[1];
        var ymdArray = ymd.split('-');
        var hmsArray = hms.split(':');
        var year = parseInt(ymdArray[0]);
        var month = parseInt(ymdArray[1])-1;
        var day = parseInt(ymdArray[2]);
        var hour = parseInt(hmsArray[0]);
        var minute = parseInt(hmsArray[1]);
        var second = parseInt(hmsArray[2]);
        return new Date(year,month,day,hour,minute,second);
    }
}
//时间格式化
Date.prototype.format =function(format)
{
    var o = {
        "M+" : this.getMonth()+1, //month
        "d+" : this.getDate(),    //day
        "h+" : this.getHours(),   //hour
        "m+" : this.getMinutes(), //minute
        "s+" : this.getSeconds(), //second
        "q+" : Math.floor((this.getMonth()+3)/3),  //quarter
        "S+" : this.getMilliseconds()
    }
    if(/(y+)/.test(format)) format=format.replace(RegExp.$1,
        (this.getFullYear()+"").substr(4- RegExp.$1.length));
    if(new RegExp("(S+)").test(format)){
        format=format.replace(RegExp.$1,
                RegExp.$1.length==1? o["S+"] :
                ("000"+ o["S+"]).substr((""+ o["S+"]).length));
    }
    for(var k in o)if(new RegExp("("+ k +")").test(format))
        format = format.replace(RegExp.$1,
                RegExp.$1.length==1? o[k] :
                ("00"+ o[k]).substr((""+ o[k]).length));

    return format;
}
function getFormatTime(date){
    return date.format('yyyy-MM-dd hh:mm:ss');
}
window.ajaxAddress = "/duk/index.php";
$(document).ready(function () {
    $('.return.left').click(function () {
        history.back(-1);
    })
    $.post(window.ajaxAddress+'/User/getUid',{}, function (userInfo) {
        $.post(window.ajaxAddress+'/User/getUserInfo',{uid:userInfo}, function (userInfo) {
            var picStr = '';
            if(userInfo.logoPic){
                picStr = userInfo.logoPic;
            }else{
                picStr = '../img/headshot-example.png';
            }
            if(userInfo.tag){
                var tag = item.tag.join('/');
            }else{
                var tag = '没有标签';
            }
            $('.sidebar-title-headshot img').attr('src',picStr);
            $('.sidebar-content-name').html(userInfo.name);
            $('.sidebar-content-tag').html(tag);
        })
    })

})