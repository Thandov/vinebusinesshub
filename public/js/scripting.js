// Function to set the active tab
function setActiveTab(tab) {
  // Remove the active class from all nav-links
  const navLinks = document.querySelectorAll('.nav-link');
  navLinks.forEach(link => link.classList.remove('active'));

  // Remove the active and show classes from all tab-panes
  const tabPanes = document.querySelectorAll('.tab-pane');
  tabPanes.forEach(pane => {
    pane.classList.remove('active');
    pane.classList.remove('show');
  });

  // Set the clicked tab as active
  tab.classList.add('active');

  // Get the target tab-pane
  const targetId = tab.getAttribute('data-bs-target').substring(1); // Remove the leading '#'
  const targetPane = document.getElementById(targetId);
  if (targetPane) {
    targetPane.classList.add('active');
    targetPane.classList.add('show');
  }

  // Store the active tab ID in localStorage
  localStorage.setItem('activeTab', tab.textContent);

}

// Function to handle nav-link click
function handleNavLinkClick(event) {
  event.preventDefault();

  const clickedTab = event.target;
  setActiveTab(clickedTab);
}

// Attach click event listener to nav-links
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => link.addEventListener('click', handleNavLinkClick));

// Get the active tab on page load
const activeTab = localStorage.getItem('activeTab');
if (activeTab) {
  const tabToActivate = Array.from(navLinks).find(link => link.textContent === activeTab);
  if (tabToActivate) {
    setActiveTab(tabToActivate);
  }
}

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

      if (response.approval_status) {
        $(this).classList.remove("bg-green-700", "bg-red-500", "text-white");

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