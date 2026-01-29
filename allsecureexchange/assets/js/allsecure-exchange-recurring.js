(function($){
    $(document).ready(function(){
        // Show a confirmation dialog before canceling a recurring donations
        var cancelButtons = $('.allsecure_cancel_recurring');

        cancelButtons.on('click', function(){
            return confirm(allsecureStrings.confirmation_message);
        });
    });
})(jQuery);
