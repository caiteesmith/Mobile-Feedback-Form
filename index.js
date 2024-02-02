// JavaScript Document

// Accordion function
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

// Handle subcheckbox display upon click
document.addEventListener('DOMContentLoaded', function() {
    // First block of code
    var errorOption1 = document.getElementById('genErrorCb');
    var errorSelection1 = document.getElementById('errorSelection');

    // Function to handle checkbox change for the first block
    function handleCheckboxChange1() {
        // Show or hide the errorSelection div based on the state of the checkbox
        errorSelection1.style.display = errorOption1.checked ? 'block' : 'none';
    }

    // Add event listener for checkbox change for the first block
    errorOption1.addEventListener('change', handleCheckboxChange1);

    // Initial execution to handle initial state for the first block
    handleCheckboxChange1();

    // Second block of code
    var errorOption2 = document.getElementById('genInACalcCb');
    var errorSelection2 = document.getElementById('subErrorSelection');

    // Function to handle checkbox change for the second block
    function handleCheckboxChange2() {
        // Show or hide the errorSelection div based on the state of the checkbox
        errorSelection2.style.display = errorOption2.checked ? 'block' : 'none';
    }

    // Add event listener for checkbox change for the second block
    errorOption2.addEventListener('change', handleCheckboxChange2);

    // Initial execution to handle initial state for the second block
    handleCheckboxChange2();
});