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
})
$('.search').click(function(){
    $('.header-search').show();
})
window.ajaxAddress = "/duk/index.php";