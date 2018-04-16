//Загржуаем наши данные, исходя из переданного GET параметра
function loader(page) {
    var offset = page || 1 ;

    $("#target-content").load("pagination.php?page="+offset);
    $("#pagination li").on('click',function(e){
        e.preventDefault();
        $("#target-content").html('loading...');
        $("#pagination li").removeClass('active');
        $(this).addClass('active');
        var pageNum = page || this.id;

        $("#target-content").load("pagination.php?page=" + pageNum);
        var page = false;
    });

}
//Добавляем новое значение
function add_new(){
    var array = $(".readonly").val();
    var page = $(".active").attr("id");
    $.ajax({
        url: 'obr.php',
        data: {array: array,page: page},
        type: 'POST',
        dataType: 'html',
        success: function(data){
            console.log(data);
            $("#pagination").html(data);
            loader(page);
        }
    })
}
//Изменяем значение
function change(array,id){
    var page = $(".active").attr("id");

    $.ajax({
        url: 'obr.php',
        data: {array: array,change: 1,id: id},
        type: 'POST',
        dataType: 'html',
        success: function(data){
            console.log(data);
            loader(page);
        }
    })
}

//Активируем поля для добавления
function input() {
    $('.readonly').prop('readonly',false);
    $("<button onclick=''>Сохраниь</button>").insertAfter('.readonly');
    $("button").on('click',function(){
        $("input").prop('readonly',true);
        $("button").remove();
        add_new();
    })
}
//Активируем поля для редактирования
$("#target-content").on('dblclick','.change',function(){
    var id = $(this).attr("data_id");
    $("button").remove();
    $("input").prop('readonly', true);
    $(this).prop('readonly',false);
    $("<button class='change_btn'>Сохраниь</button>").insertAfter(this);
    $('.change_btn').on('click',function() {
        $("input").prop('readonly', true);
        $("button").remove();
        var array = $("input[data_id="+ id +"]").val();
        id ++;//Если 1й элемент массива,нужно для проверки в обработчике,там преобразуем назад

        change(array,id);
    });
    $(document).mouseup(function (e) {
        if (check.has(e.target).length === 0){
            $("input").prop('readonly', true);
            $("button").remove();
        }
    });
});


var page = false; //Обнуляем страницу для вывода в случае обновления страницы

$(document).ready(loader(page));


