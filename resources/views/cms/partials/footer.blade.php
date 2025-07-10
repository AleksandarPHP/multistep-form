  <!-- javascripts -->
  <script type="text/javascript">
    var home = "{{ url('/') }}";
    document.addEventListener("DOMContentLoaded", function() {
    const loader = document.getElementById('loader');

    // Proverite da li je loaderHidden postavljen u sesiji
    const loaderHidden = {{ session('loaderHidden', 'false') ? 'true' : 'false' }};

    if (loaderHidden) {
        loader.style.display = 'none'; // Sakrij loader
    }
});
  </script>
  @yield('variables')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('cmsfiles/vendor/popper/popper.min.js') }}"></script>
  <script src="{{ asset('cmsfiles/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('cmsfiles/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('cmsfiles/vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('cmsfiles/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('cmsfiles/js/sb-admin.js?v=2') }}"></script>
  <!-- Custom scripts for this page-->
  <script src="{{ asset('cmsfiles/js/sb-admin-datatables.js') }}"></script>
  <script src="{{ asset('cmsfiles/js/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('cmsfiles/js/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('cmsfiles/js/jquery.sortable.min.js') }}"></script>
  <script src="{{ asset('cmsfiles/js/jquery.datetimepicker.full.min.js') }}"></script>
  <script src="{{ asset('cmsfiles/js/jquery.multi-select.js') }}"></script>
  <script src="{{ asset('cmsfiles/vendor/select2-4.0.13/js/select2.min.js') }}"></script>
  <script src="{{ asset('cmsfiles/vendor/select2-4.0.13/js/i18n/sr.js') }}"></script>
  <script src="{{ asset('cmsfiles/vendor/tagEditor/jquery.caret.min.js') }}"></script>
  <script src="{{ asset('cmsfiles/vendor/tagEditor/jquery.tag-editor.min.js') }}"></script>
  @yield('scripts')
</body>

</html>