$(document).on('click', '.btn-button', function (e) {
  e.preventDefault();
  var approvalId = $(this).attr('id');
  var url = $(this).attr('href');
  var approvalStatus = $(this).data('approvalstatus');

  jQuery.ajax({
    url: url,
    type: 'POST',
    dataType: 'json',
    data: {
      approvalId: approvalId,
      approvalStatus: approvalStatus
    },
    success: function (response) {
      approvalId = approvalId.replace(/\D/g, "");
      var btnTarget = $('#approval_button' + approvalId);
      var spanTarget = $('#span' + approvalId);
      var green = 'focus:ring-green-500 bg-green-700';
      var red = 'focus:ring-red-500 bg-red-500';

      console.log(response.approval_status);

      if (response.approval_status) {
        // Update button to declined state
        btnTarget.removeClass(green).addClass(red);
        btnTarget.text('Decline');

        // Update span to approved state
        spanTarget.removeClass('bg-yellow-100 text-yellow-800');
        spanTarget.addClass('bg-green-100 text-green-800');
        spanTarget.text('Approved');
      } else {
        // Update button to approved state
        btnTarget.removeClass(red).addClass(green);
        btnTarget.text('Approve');

        // Update span to declined state
        spanTarget.removeClass('bg-green-100 text-green-800');
        spanTarget.addClass('bg-red-100 text-red-800');
        spanTarget.text('Declined');
      }

    },
    error: function (jqXHR, exception) {
      var msg = '';
      if (jqXHR.status === 0) {
        msg = 'Not connect.\n Verify Network.';
      } else if (jqXHR.status === 404) {
        msg = 'Requested page not found. [404]';
      } else if (jqXHR.status === 500) {
        msg = 'Internal Server Error [500].';
      } else if (exception === 'parsererror') {
        msg = 'function deleteImage Requested JSON parse failed.';
      } else if (exception === 'timeout') {
        msg = 'Time out error.';
      } else if (exception === 'abort') {
        msg = 'Ajax request aborted.';
      } else {
        msg = 'Uncaught Error.\n' + jqXHR.responseText;
      }
      alert(msg);
    }
  });
});