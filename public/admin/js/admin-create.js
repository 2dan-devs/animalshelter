"use strict";

$(document).ready(function(){

	// Populate breed list based on specie slected.
	$('#specie').on('change', function(e){
		var specie_id = e.target.value
		// Ajax
		$.get("/admin/breed-based-on-specie", {specie_id: specie_id}, function(data){
			// success data
			$('#breed').empty()
			$.each(data, function(index, breedObj){
				$('#breed').append('<option value="' +breedObj.id +'">'+breedObj.name+'</option>')
			})
		})
	})// End populate breed list

	// Date pickers.
	$('#datepicker_dob').datepicker()
	$('#datepicker_date-in').datepicker()
	$('#datepicker_date-out').datepicker()
	// End date pickers

	// Upload image preview.
	function imgPreview(input) {
    	if (input.files && input.files[0]) {
        	var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview-holder').attr('src', e.target.result);
            }
        	reader.readAsDataURL(input.files[0]);
    	}
	}

    $("#img-input").change(function(){
        imgPreview(this);
    });
    // End Upload image preview.

    // Remove image preview and breed when reset button is clicked.
    $('#reset-form').on('click', function(){
    	$('#preview-holder').attr('src', '')

    	// Clear breeds
    	$('#breed').empty()
    	$('#breed').append('<option value="">-</option>')

    	// Remove errors
    	$('.alert-box').remove();
    })
})