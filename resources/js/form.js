jQuery(document).on('change', '#industryId', function(e) {
    e.preventDefault();

    var otherOption = $(this).find(":selected").val();
    if (otherOption === "other") {
        $('#newIndustry').modal('show');
    }
});

    jQuery(document).on('click', '#newbtn', function(e) {
        e.preventDefault();
        var serviceArray = new Array(),
            id, target, refreshTarget;


        jQuery.map($("input[name='service_name[]']"), function(obj, index) {
            if ($(obj).val()) {
                serviceArray.push($(obj).val());
            }
        });
        id = $(this).find('.serviceId').val();

        jQuery.ajax({
            url: "/business/businessdashboard/insertIndustry",
            type: 'post',
            data: {
                'service_name': serviceArray,
                'id': id
            },
            dataType: 'JSON',
            success: function(response) {
                console.log(response);

            },
            error: function(jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status === 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status === 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'function Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
            }
        });
    }
);