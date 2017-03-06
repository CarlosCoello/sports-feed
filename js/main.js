jQuery(document).ready(function($) {

  /*
  Nav Drodpown Effect
  ____________________________
  */
  
  $('.dropdown-menu').addClass('animated fadeIn');

  /*
  Sidebar Toggle Open or Close
  _______________________________________
  */
  
  $(document).on('click', '.js-toggleSidebar', function() {
         $('.sports-feed-sidebar').toggleClass('sidebar-closed');
         $('html').toggleClass('no-scroll');
         $('.sidebar-overlay').fadeToggle(500);
     });

  /*
  Contact Form Submission
  _____________________________________
  */

  $('.contactForm').on('submit', function(e) {
       e.preventDefault();

       $('.has-error').removeClass('has-error');

       var form = $(this);

       var name = form.find('#name').val();
       var email = form.find('#email').val();
       var message = form.find('#message').val();
       var ajaxurl = form.data('url');
       var sports_feed_nonce_field = form.find('#sports_feed_nonce_field').val();

       if (name === '') {
           $('#name').parent('.form-group').addClass('has-error');
           return;
       }
       if (email === '') {
           $('#email').parent('.form-group').addClass('has-error');
           return;
       }
       if (message === '') {
           $('#message').parent('.form-group').addClass('has-error');
           return;
       }
       form.find('input, textarea, button').attr('disabled', 'disabled');
       $('.js-form-submission').addClass('js-show-feedback');


       $.ajax({

           url: ajaxurl,
           type: 'post',
           data: {
               sports_feed_nonce_field: sports_feed_nonce_field,
               name: name,
               email: email,
               message: message,
               action: 'sports_feed_save_user_contact_form'

           },
           error: function(response) {
               $('.js-show-feedback').removeClass('js-show-feedback');
               $('.js-form-error').addClass('js-show-feedback');
               form.find('input, textarea, button').removeAttr('disabled');
           },
           success: function(response) {
               $('#name').val('');
               $('#email').val('');
               $('#message').val('');
               $('.js-show-feedback').removeClass('js-show-feedback');
               $('.js-form-success').addClass('js-show-feedback');
           }
       });


   });

  /*
  Single Post Link Navigation
  ___________________________________
  */
     $('.post-link-nav-left > a').hover(function(){
      $('.dashicons-arrow-left-alt2').addClass('animated infinite flash');
      $('.dashicons-arrow-left-alt2').css('color', '#43c0f6');
      }, function(){
      $('.dashicons-arrow-left-alt2').removeClass('animated infinite flash');
      $('.dashicons-arrow-left-alt2').css('color', '#1f1f1f');
    });

     $('.post-link-nav-right > a').hover(function(){
      $('.dashicons-arrow-right-alt2').addClass('animated infinite flash');
      $('.dashicons-arrow-right-alt2').css('color', '#43c0f6');
      }, function(){
      $('.dashicons-arrow-right-alt2').removeClass('animated infinite flash');
      $('.dashicons-arrow-right-alt2').css('color', '#1f1f1f');
    });


});
