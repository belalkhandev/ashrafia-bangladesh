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

        //responsive menu
        const menus = $('.navbar').html();
        $('.responsive-menu').append(menus);

        $(document).on('click', '#rs-menu-bar', function() {
            $('.responsive-menu').toggleClass('show');
        });

    });

}(jQuery))