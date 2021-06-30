(function($){
    "use-strict"

    jQuery(document).ready(function(){

        if ($('.datepicker').length > 0) {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true,
                autocomplete: false,
            });
        }

    });

}(jQuery))