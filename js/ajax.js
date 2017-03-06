jQuery(document).ready(function($) {

      $(document).on('click', '.ajax-load-posts', function ( event ) {

        event.preventDefault();

        var that = $(this);
        var page = that.data('page');
        var newPage = page + 1;
        var ajaxurl = that.data('url');
        var post = that.data('post-type');

           $.ajax({
             url: ajaxurl,
             type: 'post',
             data: {
               page: page,
               post: post,
               action: 'load_the_posts'
             },
             error: function (response) {
               console.log(response);
             },
             success: function (response) {

               if ($.trim(response).length == 0) {


                   that.attr('disabled', 'disabled');
                   that.html('No more post');
                   that.css('background-color', 'rgba(31,31,31,.2)');


                 } else {


                  $('.ajax-load-posts').addClass('hide');
                  $('.svgcircle').removeClass('hide');
                  $('.svgcircle').addClass('animated infinite bounce');


                   setTimeout(function(){
                     $('.ajax-load-posts').removeClass('hide');
                     $('.svgcircle').addClass('hide');
                     $('.svgcircle').removeClass('animated infinite bounce');
                    }, 2000);

                   setTimeout(function(){
                     that.data('page', newPage);
                     $('.ajax-container').append(response).find('#post-gallery-24').carousel();
                     $('.ajax-container > article').addClass('animated fadeIn');
                   }, 2000);


             }
           }

        });



    });

});
