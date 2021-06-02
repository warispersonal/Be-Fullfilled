<script src="{{asset('assets/js/app-dist.js')}}"></script>
<script src="https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.tr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

<script>
    (function ($) {
        $(window).on("load", function () {
            $(".content").mCustomScrollbar();
        });
    })(jQuery);
</script>
<script>
    (function () {
        'use strict';
        $('.input-file').each(function () {
            var $input = $(this),
                $label = $input.next('.js-labelFile'),
                labelVal = $label.html();
            $input.on('change', function (element) {
                var fileName = '';
                if (element.target.value) fileName = element.target.value.split('\\').pop();
                fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
            });
        });
    })();
</script>

<script>

    $('#file-upload').change(function() {
       var i = $(this).prev('label').clone();
       var file = $('#file-upload')[0].files[0].name;
       $(this).prev('label').text(file);
    });

   </script>

<script>
    $(document).ready(function () {
        moment.locale('en');
        var date = new Date();
        bugun = moment(date).format("DD/MM/YYYY");
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            container: container,
            todayHighlight: true,
            autoclose: true,
            format: 'dd/mm/yyyy',
            language: 'en',
        };
        date_input.val(bugun);
        date_input.datepicker(options).on('focus', function (date_input) {
            $("h3").html("focus event");
        });
        ;
        date_input.change(function () {
            var deger = $(this).val();
            $("h3").html("<font color=green>" + deger + "</font>");
            document.getElementsByName("date").value = deger;

        });
        $('.input-group').find('.icon-calendar').on('click', function () {
            if (!date_input.data('datepicker').picker.is(":visible")) {
                date_input.trigger('focus');
                $("h3").html("Ok");
            } else {
            }
        });


    });
</script>

@yield('js')

</body>
</html>
