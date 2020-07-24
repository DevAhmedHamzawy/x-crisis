<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ $settings->title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {!! SEO::generate() !!}
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('main') }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('main') }}/css/animate.css">
    
    <link rel="stylesheet" href="{{ asset('main') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('main') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('main') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('main') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('main') }}/css/ionicons.min.css">
    
    <link rel="stylesheet" href="{{ asset('main') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('main') }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('main') }}/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" defer></script>
      
  </head>

  
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    @include('layouts.includes.nav')

    @yield('content')
  </body>


  
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#2c2c2c"/></svg></div>


<script src="{{ asset('main') }}/js/jquery.min.js"></script>
<script src="{{ asset('main') }}/js/jquery-migrate-3.0.1.min.js"></script>
<script src="{{ asset('main') }}/js/popper.min.js"></script>
<script src="{{ asset('main') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('main') }}/js/jquery.easing.1.3.js"></script>
<script src="{{ asset('main') }}/js/jquery.waypoints.min.js"></script>
<script src="{{ asset('main') }}/js/jquery.stellar.min.js"></script>
<script src="{{ asset('main') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('main') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('main') }}/js/aos.js"></script>
<script src="{{ asset('main') }}/js/jquery.animateNumber.min.js"></script>
<script src="{{ asset('main') }}/js/scrollax.min.js"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
--}}
{{--<script src="{{ asset('main') }}/js/google-map.js"></script>--}}



<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="{{ asset('main') }}/js/main.js"></script>
  <script>
    $(document).ready(function(){
  $('.customer-logos').slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 1500,
      arrows: false,
      dots: false,
      pauseOnHover: false,
      responsive: [{
          breakpoint: 768,
          settings: {
              slidesToShow: 4
          }
      }, {
          breakpoint: 520,
          settings: {
              slidesToShow: 3
          }
      }]
  });
});
    </script>




<script>
  window.form_data = new FormData();



function sendContact(){
    form_data.append('name', $("#name").val())
    form_data.append('email', $("#email").val())
    form_data.append('subject', $("#subject").val())
    form_data.append('message', $("#message").val())

    axios.post('../sendcontact', form_data)
                .then((data) => {

                    $("#name").val('');
                    $("#email").val('');
                    $("#subject").val('');
                    $("#message").val('');

                    $("#name").removeClass('is-invalid');
                    $("#email").removeClass('is-invalid');
                    $("#subject").removeClass('is-invalid');
                    $("#message").removeClass('is-invalid');


                    $('.name-contact-error').empty();
                    $('.email-contact-error').empty();
                    $('.subject-contact-error').empty();
                    $('.message-contact-error').empty();


                    $('#success-message').append('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Message Sent!</strong> Message Sent Successfully!</div></div>');
                    setTimeout(() => {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove() 
                        });
                    }, 2000);
                }).catch((error) => {

                    $('.name-contact-error').empty();
                    $('.email-contact-error').empty();
                    $('.subject-contact-error').empty();
                    $('.message-contact-error').empty();

                   
                if(error.response.data.errors.name){
                    $('.name-contact-error').append('<strong>'+error.response.data.errors.name+'</strong>');
                    $('.name').addClass('is-invalid')
                }
                if(error.response.data.errors.email){
                    $('.email-contact-error').append('<strong>'+error.response.data.errors.email+'</strong>');
                    $('.email').addClass('is-invalid')
                }
                if(error.response.data.errors.subject){
                    $('.subject-contact-error').append('<strong>'+error.response.data.errors.subject+'</strong>');
                    $('.subject').addClass('is-invalid')
                }
                if(error.response.data.errors.message){
                    $('.message-contact-error').append('<strong>'+error.response.data.errors.message+'</strong>');
                    $('.message').addClass('is-invalid')
                }
                });

}

 
 
 </script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e6cc0038d24fc2265879014/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
