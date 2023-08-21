jQuery(document).ready(function($){
    $('#zend_st_ajax_title').blur(function(e){
        let dataObj = {
            'action' : 'zend_check_form',
            'value'  : $(this).val()
        }
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: dataObj,
            dataType: 'html',
            success: function(data, status, jsXHR) {
                console.log(data);
            
            }

        })
    })
})