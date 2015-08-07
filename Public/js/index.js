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
$(document).ready(function () {
    loadData();
})
function loadData(){
    $.post(window.ajaxAddress+'/Question/queryAll',{page:1},function(data){
        var result = data.content;
        var html = '';
        for(var i = 0 ; i < result.length ; i++){
            html += questionTemp(result[i]);
        }
        $('.container').append(html);
    })
}
function questionTemp(item){
    return '<a href="question_detail.html?id='+item.qid+'"><div class="personItem">\
        <div class="personItem-headshot">\
        <img src=""/>\
        </div>\
    <div class="personItem-content">\
        <div class="personItem-content-column1">\
            <p>'+item.title+'</p>\
            <h3>'+item.tag.join('/')+'</h3>\
        </div>\
        <div class="personItem-content-column2">\
            <div class="more">\
            i\
            </div>\
        </div>\
    </div>\
    </div></a>'
}