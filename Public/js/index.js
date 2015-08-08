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
var GLOBAL = {
    dataArray : new Array()
};
$(document).ready(function () {
    loadData();
    $('.search-return').click(function(){
        $('.header-search').hide();
    })
})
function loadData(){
    $.post(window.ajaxAddress+'/Question/queryUser',{page:1},function(data){
        var result = data.content;
        GLOBAL.dataArray = GLOBAL.dataArray.concat(result);
        var html = '';
        for(var i = 0 ; i < result.length ; i++){
            html += questionTemp(result[i]);
        }
        $('.container').append(html);
    })
}
function questionTemp(item){
    if(!item.tag){
        var tag = '没有标签';
    }else{
        var tag = item.tag.join('/');
    }
    return '<div class="personItem" onclick="showDialog('+item.uid+')">\
        <div class="personItem-headshot">\
        <img src="'+(item.logoPic||("../img/headshot-example.png"))+'" width="100%" height="100%"/>\
        </div>\
    <div class="personItem-content">\
        <div class="personItem-content-column1">\
            <p>'+item.realName+'</p>\
            <h3>'+tag+'</h3>\
        </div>\
        <div class="personItem-content-column2">\
            <div class="more">\
            i\
            </div>\
        </div>\
    </div>\
    </div>'
}
function showDialog(uid){
    var item;
    for(var i = 0 ; i < GLOBAL.dataArray.length ; i++){
        if(GLOBAL.dataArray[i].uid = uid){
            item = GLOBAL.dataArray[i];
            break;
        }
    }
    if(!item.tag){
        var tag = '没有标签';
    }else{
        var tag = item.tag.join('/');
    }
    for(var i in item){
        $('.dialog [data-template="'+i+'"]').html(item[i]);
    }
    $('.dialog').show()
}