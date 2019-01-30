
var SPEED_DOWN = 800;
var SPEED_UP = 500;



$('.lanyardFont li a').live('click', function () {
    $('.lanyardFont li').removeClass('selected');
    $(this).parent('li').addClass('selected');
    $('.drpFontHolder').slideUp(SPEED_UP);
    setLanyardFont();
});



function setLanyardFont() {
    var li = $('.lanyardFont li.selected');
    var img = li.find('img');
    var a = li.find('a');
    $('.drpFont a.currentFont').html('<img src="' + img.attr('src') + '" alt="' + img.attr('alt') + '" />');
//    lanyard.font.id = a.attr('ref_id');
//    lanyard.font.name = a.attr('title');
//    lanyard.font.src = img.attr('src');
//    lanyard.font.image = a.attr('ref_image');
//    lanyard.font.custom = (lanyard.font.name == 'Use Custom Font') ? true : false;
    //setCustomFont();
    //generatePreview();
}

function getLanyardFont() {
    var html = '<ul class="lanyardFont">';
    if (ajaxData.lanyardFont) {
        $.each(ajaxData.lanyardFont, function (i, e) {
            html += '<li';
            html += (lanyard.font.name == e.title) ? ' class="selected" ' : '';
            html += '><a href="javascript:void(0);" title="' + e.title + '" ref_id="' + e.font_id + '" ref_image="' + e.image + '" ><span></span><img src="' + HTTP_FONTS + '&name=' + e.image + '&text=' + e.title + '" alt="' + e.title + '" /></a></li>';
        });
    }
    html += '</ul>';
    $('.drpFontHolder').html(html);
}

$('.drpFont a.currentFont').live('click', function () {
    closeAllDropdowns();
    if ($('.drpFontHolder').html() == '') {
        //getLanyardFont();
    }
    if ($('.drpFontHolder').css('display') == 'none') {
        $('.drpFontHolder').slideDown(SPEED_DOWN);
    } else {
        $('.drpFontHolder').slideUp(SPEED_UP);
    }
});




function closeAllDropdowns() {
    $('.drpFontHolder').slideUp(SPEED_UP);   
}


