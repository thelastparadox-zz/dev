<script>
<?php if ($this->uri->segment(3) == "room_assignments") { ?>
$(document).ready(function () 
{
    // -------------------------------
    // Ajax Control for adding new rooms 
    // -------------------------------

    $('#addNewRoom').click(function () {
    	$('#dialog').html('<div><form id="newRoomForm"><div class="form-group"><input name="roomName" placeholder="Enter Room Name" class="form-control"></div><div class="form-group"><input name="roomDescription" placeholder="Enter Room Description" class="form-control"></div><button id="newRoomFormSubmit" type="submit" class="btn btn-default">Add Room</button>');
        $("#dialog").dialog(
		{
			height: 200,
			modal: true,
			width: 400,
			title: "Add New Room"
		});
        $('#dialog').dialog('open');

        $('#newRoomFormSubmit').click(function () {
        	$.ajax({
		        type: 'POST',
		        url: '<?=site_url('smartthings/ajax/add_room')?>',
		        data: {
		        	roomName: $("[name='roomName']").val()
		        },
		        dataType: 'json',
		        success: function (data) {
		            console.log( "Smartthings App: New Room Ajax call successfull. Data Returned - ["+data+"]" );    
		        },
		        complete: function (data) 
		        {
		        	console.log( "Smartthings App: New Room Ajax call complete. JSON data = ["+data.responseJSON+"]"); 
		        	
		        	if (typeof data.responseJSON !== undefined)
		        	{
		        		console.log( "Smartthings App: New Room Ajax call returned null"); 
		        	}
		        }
		    });
		    return false;
        });

        return false;
    });
	// -------------------------------
    // Ajax Control for Deleting Room
    // -------------------------------

	$('#deleteRoom').click(function () 
	{
	 	console.log( "Smartthings App: Delete Room event registered."); 
	 	$.ajax({
	        type: 'POST',
	        url: '<?=site_url('smartthings/ajax/delete_room')?>',
	        data: {
	        	roomName: $('#deleteRoom').data('roomname')
	        },
	        dataType: 'json',
	        success: function (data) {
	            console.log( "Smartthings App: Room delete ajax call successfull. Data Returned - ["+data+"]" );    
	        },
	        complete: function (data) 
	        {
	        	console.log( "Smartthings App: Room delete ajax call complete. JSON data = ["+data.responseJSON+"]"); 
	        	if (typeof data.responseJSON !== undefined)
	        	{
	        		console.log( "Smartthings App: Deleting table row of room."); 
	        		var rowName = $('#deleteRoom').data('roomname');
	        		console.log( "Smartthings App: Row name ID = "+rowName);
	        		$('#'+rowName.replace(/\s+/g, '')).fadeOut(1000);
	        	}
	        }
	    });
	   	return false;
	});
	
	// -------------------------------
	// Ajax Control for Deleting Devices
	// -------------------------------

	$('#deleteDevice').click(function () 
	{
	 	console.log( "Smartthings App: Delete event registered."); 
	 	$.ajax({
	        type: 'POST',
	        url: '<?=site_url('smartthings/ajax/delete_device')?>',
	        data: {
	        	deviceName: $('#deleteDevice').data('devicename')
	        },
	        dataType: 'json',
	        success: function (data) {
	            console.log( "Smartthings App: Ajax call successfull. Data Returned - ["+data+"]" );    
	        },
	        complete: function (data) 
	        {
	        	console.log( "Smartthings App: Ajax call complete. JSON data = ["+data.responseJSON+"]"); 
	        	if (typeof data.responseJSON !== undefined)
	        	{
	        		console.log( "Smartthings App: Deleting table row of device."); 
	        		var rowName = $('#deleteDevice').data('devicename');
	        		console.log( "Smartthings App: Row name ID = "+rowName);
	        		$('#'+rowName.replace(/\s+/g, '')).fadeOut(1000);
	        	}
	        }
	    });
	   	return false;
	});

	// -------------------------------
	// Ajax control for editing rooms
	// -------------------------------
	$('.editDevice').click(function () 
	{
		$('#dialog').html('<form class="form-inline"><div class="form-group"><select id="roomID" name="roomID" placeholder="Select Room" class="form-control"><?php foreach ($rooms as $no => $room) { ?><option value="<?=$room['room_id']?>"><?=$room['room_name']?></option><?php } ?></select></div><button id="newRoomAssignmentFormSubmit" type="submit" class="btn btn-default">Submit</button></form>');
        $('#dialog').dialog({
        	title: "Room Assignment",
        	height: 150,
        	width: 350,
        });
        $('#dialog').dialog('open');

        $('#newRoomAssignmentFormSubmit').click(function () {
        	$.ajax({
		        type: 'POST',
		        url: '<?=site_url('smartthings/ajax/add_room_assignment')?>',
		        data: {
		        	roomID: $("#roomID").val(),
		        	deviceName: $(this).data('devicename')
		        },
		        dataType: 'json',
		        success: function (data) {
		            console.log( "Smartthings App: New Room Assignment Ajax call successfull. Data Returned - ["+data+"]" );    
		        },
		        complete: function (data) 
		        {
		        	console.log( "Smartthings App: New Room Assignment Ajax call complete. JSON data = ["+data.responseJSON+"]"); 
		        	
		        	if (typeof data.responseJSON !== undefined)
		        	{
		        		console.log( "Smartthings App: New Room Assignment Ajax call returned null"); 
		        	}
		        }
		    });
		    return false;
        });
	});
});



<?php } ?>

</script>