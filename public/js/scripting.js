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
  