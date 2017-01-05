// Toggles between if room reservation details input can be selected
		function allowInput(id)
		{
			var isRoomReserved = $('#roomIsReserved').prop('checked');
			var setBool = true;
			if (isRoomReserved === false)
				setBool = false;
			$('#' + id + ' input').each(function(){
				$(this).prop('disabled', setBool);
			});
			$('#' + id + ' select').each(function(){
				$(this).prop('disabled', setBool);
			});
			$('select').material_select(); // needed to update materialize selects ugh
		}
		$(document).ready(function() {
			$('select').material_select(); //needed for materialize to show selects
		});