<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         @include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
        @include('home.slider')
      <!-- end banner -->
      <!-- about -->
        @include('home.about')
      <!-- end about -->
      <!-- our_room -->
        @include('home.room')
      <!-- end our_room -->
      <!-- gallery -->
        @include('home.gallery')
      <!-- end gallery -->
      <!-- blog -->
        @include('home.blog')
      <!-- end blog -->
      <!--  contact -->
        @include('home.contact')
      <!-- end contact -->
      <!--  footer -->
        @include('home.footer')
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
       $(window).scroll(function() {
            sessionStorage.scrolltop = $(this).scrolltop();
          });

          $(document).ready(function(){
            if(sessionStorage.scrolltop != "undefined"){
                $(window).scrolltop(sessionStorage.scrolltop);
            }
          });
       </script>
   </body>
</html>