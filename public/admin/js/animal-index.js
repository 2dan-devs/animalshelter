"use strict"

$(document).ready(function(){

	// Populate breed list based on specie slected.
	$('#species').on('change', function(e){
		var species_id = e.target.value
		// Ajax
		$.get("/admin/breed-based-on-specie", {species_id: species_id}, function(data){
			// success data
			$('#breed').empty()
			$('#breed').append('<option value="0">All Breeds</option>')
			$.each(data, function(index, breedObj){
				$('#breed').append('<option value="' +breedObj.id +'">'+breedObj.name+'</option>')
			})
		})
	})// End populate breed list

})