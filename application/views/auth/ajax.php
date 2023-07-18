<script>
   $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
         theme: 'bootstrap4'
      })
   })
</script>


<script>
   $(document).ready(function() {
      window.setTimeout(function() {
         $(".preloader").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
         });
      }, 2000)
   })
</script>