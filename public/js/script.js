
$(document).ready(function() {
  $('.toggle-btn').on('click', function() {
    var $hiddenBtn = $(this).next('.hidden-button');

    // Toggle the visibility of the hidden button
    $hiddenBtn.slideToggle();

    // Toggle plus-circle and minus-circle icons
    var icon = $(this).find('i');
    icon.toggleClass('fa-plus-circle fa-minus-circle');

    // Change button color to red when minus-circle icon is active
    if (icon.hasClass('fa-minus-circle')) {
      $(this).css('color', 'red');
    } else {
      $(this).css('color', ''); // Reset color to default
    }
  });
});

// end of button script


document.getElementById('last_name').addEventListener('change', function() {
    document.getElementById('password').value = this.value; // Copy last name to password field
});






$(document).ready(function() {
  $('.toggle-btn').on('click', function() {
      var $hiddenBtn = $(this).next('.hidden-button');

      // Toggle the visibility of the hidden button
      $hiddenBtn.slideToggle();

      // Toggle plus-circle and minus-circle icons
      var icon = $(this).find('i');
      icon.toggleClass('fa-plus-circle fa-minus-circle');

      // Change button color to red when minus-circle icon is active
      if (icon.hasClass('fa-minus-circle')) {
          $(this).css('color', 'red');
      } else {
          $(this).css('color', ''); // Reset color to default
      }
  });
});





  $('.select-place').click(function(e) {
    const placeId = $(this).data('place-id');
  
    $.ajax({
      url: '/select-place',
      method: 'POST',
      data: {
        place_id: placeId
      },
      success: function(response) {
        // Update UI to indicate selected product (e.g., highlight row)
        $(e.target).closest('tr').addClass('selected');
        console.log('Product selected successfully!');
      },
      error: function(error) {
        console.error('Error selecting product:', error);
      }
    });
  });