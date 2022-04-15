<script src='https://www.google.com/recaptcha/api.js?render=6LfVwW8UAAAAAMAqyFice4pgxRNh57XovXa7mNi7'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="{{ asset('wp-content/themes/ydzn/assets/js/main.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124906840-1"></script>


<script>
  // $(document).ready(function(){
    var categoryProducts = '{{route("categoryProducts",":cat_name")}}'
  // })
  </script>
  @stack('frontend_scripts')
<script>

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-124906840-1');

</script>
</body>
</html>