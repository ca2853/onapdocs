$('#image-map area').hover(
        function () { 
                var offset = +0
                var coords = $(this).attr('coords').split(',');
                var width = $('.image-map-container').width() + offset;
                var height = $('.image-map-container').height() + offset;
	   console.log(width);

                $('.image-map-container .map-selector').addClass('hover').css({
                        'left': ((coords[0])-0) + 'px',
                        'top': ((coords[1])-= 0) + 'px',
                        'right': width - coords[2],
                        'bottom': height - coords[3]
                })
         },
        function () { 
                $('.image-map-container .map-selector').removeClass('hover').attr('style','');
        }
)

