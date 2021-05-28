<script src="{{asset('assets/js/app-dist.js')}}"></script>
<script src="https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script>

    (function($){
        $(window).on("load",function(){
            $(".content").mCustomScrollbar();
        });
    })(jQuery);

</script>
@yield('js')

</body>
</html>
