
<!DOCTYPE html>
<html lang="en">
  <head>
    <!----------- head ----------->
      @include('backend.includes.head')

    <!----------- css ----------->
     @include('backend.includes.css')

    
  </head>

  <body>
    <!----------- leftbar ----------->
    @include('backend.includes.leftbar')

    <!----------- topbar ----------->
    @include('backend.includes.topbar')


    <!----------- rightbar ----------->
    @include('backend.includes.rightbar')
    

    

   

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      

      <div class="br-pagebody">
        @yield('contant')

      </div><!-- br-pagebody -->
      <!-- ------footer---------- -->
    @include('backend.includes.footer')

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- ---script---- -->

    @include('backend.includes.script')

    @include('sweetalert::alert')

    
  </body>
</html>
