//
// $('#carType li a').click(function () {
//     var str = $(this).attr('data-my');
//     var obg_str = {'id_cat': str};
//     $.ajax({
//         type: "POST",
//         url: "ajaxcat",
//         data: obg_str,
//         success: function(html){
//             $('.count').html(html);
//             //$('#content_p').html(html);
//         }
//     });
// });



type_auto = 0;
$('#carType li a').click(function () {
    type_auto = $(this).attr('data-my');
    found($('.diam').val(), $('.width').val(), $('.height').val(), $('.my_hidden_seacon').val(),$('.producer').val(), type_auto);
});


$('.diam').change(function () {

    if ($( ".diam" ).val() == 0){

        $('.send-calc').addClass('disabled');

    }else {
        $('.send-calc').removeClass('disabled');
    }

    found($('.diam').val(), $('.width').val(), $('.height').val(), $('.my_hidden_seacon').val(),$('.producer').val(),type_auto);
});

$('.width').change(function () {
    found($('.diam').val(), $('.width').val(), $('.height').val(), $('.my_hidden_seacon').val(),$('.producer').val(), type_auto);
});
$('.height').change(function () {
    found($('.diam').val(), $('.width').val(), $('.height').val(), $('.my_hidden_seacon').val(),$('.producer').val(), type_auto);
});
$('.seasonClick').click(function(){

    $('.seasonClick').removeClass('active');
    $(this).addClass('active');

    var id_data = $(this).attr('data-id');
    $('.my_hidden_seacon').val(id_data);
    found($('.diam').val(), $('.width').val(), $('.height').val(), id_data,$('.producer').val(), type_auto);
});

$('.producer').click(function () {
    var my_producer = $('.producer').val();

    found($('.diam').val(), $('.width').val(), $('.height').val(), $('.my_hidden_seacon').val(), my_producer, type_auto);
});

function found(diam, width, height, season, my_producer, type_auto) {
    $.ajax({
        type: "POST",
        url: "ajaxtype",
        data : {'diam' :diam, 'width' :width, 'height' :height, 'season' : season, 'my_producer' : my_producer, 'type_auto': type_auto},
        success: function (typeshin) {
            $('.count_shin').html(typeshin);
        }
    });
}

// $('.sortSelect1').change(function () {
//     alert(4343);
//    type_sort = $(this).val();
//
//    $.ajax({
//        type: "POST",
//        url: "sort",
//        data: {'sort' :type_sort},
//        success: function (sort) {
//            $('.goods').html(sort);
//
//
//        }
//    });
//
// });


//
// $('.seasonClick').click(function () {
//
//     var id_data = $(this).attr('data-id');
//     var my_width = $('.width').val();
//     var my_diam = $('.diam').val();
//     var my_height = $('.height').val();
//     found($('.diam').val(), $('.width').val(), $('.height').val(), id_data);
// });


// $('.send-calc').click(function () {
//     var diam = $('.diam').val();
//     var width = $('.width').val();
//     var height = $('.height').val();
//     alert(diam);
//         $.ajax({
//             type: "POST",
//             url: "ajaxtype",
//             data : {'diam' :diam, 'width' :width, 'height' :height },
//             success: function (typeshin) {
//                 $('.count_shin').html(typeshin);
//             }
//         });
// });


$(function(){

    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1000,
        values: [ 75, 300 ],
        slide: function( event, ui ) {
            $( "#price_slider" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#price_slider" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );

});