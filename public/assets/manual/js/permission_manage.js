
$(document).ready(function() {

    var applying = false;
    
    // set ajax request header with csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('div.custom-switch label').click(function() {
        if(!applying) {
            // set value to submit and 
            var setValue = !!$(this).prev().prop('checked') ? 0 : 1
            
            $.ajax({
                type: 'PATCH',
                url: '/panel/admin/permission',
                data: {
                    id: $(this).attr('data-id'),
                    permission: $(this).attr('data-permission'),
                    value: setValue
                },
                success: function(data) {
                    if(!!data.result) 
                        $('#toast_applied').toast('show');
                    else 
                        $('#toast_fnot_applied').toast('show');
                    applying = false;
                },
                error: function() {
                    return alert('Error Occured !')
                }
            })
        }
    })
})  