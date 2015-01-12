"use strict"

$(document).ready(function(){

	// Populate breed list based on specie slected.
	$('#species').on('change', function(e){
		var species_id = e.target.value
		// Ajax
		$.get("/admin/breed-based-on-specie", {species_id: species_id}, function(data){
			// success data
			$('#breed').empty()
			$.each(data, function(index, breedObj){
				$('#breed').append('<option value="' +breedObj.id +'">'+breedObj.name+'</option>')
			})
		})
	})// End populate breed list

	// Date pickers.
	$('#datepicker_dob').datepicker({ maxDate: 0 })
	$('#datepicker_date-in').datepicker({ maxDate: 0 })
	$('#datepicker_date-out').datepicker({ maxDate: 0 })
	// End date pickers

	// Profile photo preview.
	function imgPreview(input) {
    	if (input.files && input.files[0]) {
        	var reader = new FileReader()

            reader.onload = function (e) {
                $('#preview-holder').attr('src', e.target.result)
            }
        	reader.readAsDataURL(input.files[0])
    	}
	}

    $("#img-input").change(function(){
        imgPreview(this)
    });
    // End profile photo preview.

    // // Remove image preview and breed when reset button is clicked.
    // $('#reset-form').on('click', function(){
    // 	$('#preview-holder').attr('src', '')

    // 	// Remove errors
    // 	$('.alert-box').remove()
    // 	$('.input-error-label').remove()
    // })
})