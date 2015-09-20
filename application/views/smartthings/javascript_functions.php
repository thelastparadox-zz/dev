<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">

// ---* START Live logs Page --- //
<?php if ($this->uri->segment(3) == "livelog") { ?>

var refreshInterval = 3000;

function doAjax(lastTimeDataReceived) {
	console.log( "Smartthings App: Initiating Ajax call to grab livelog data" );
    
    $.ajax({
        type: 'POST',
        url: '<?=site_url('smartthings/api/livelog')?>',
        data: {
        	time: lastTimeDataReceived
        },
        dataType: 'json',
        success: function (data) {
            console.log( "Smartthings App: Ajax call successfull. Data Returned - ["+data+"]" );    
        },
        complete: function (data) 
        {            

            if (data.responseJSON == undefined) 
            {
	           var newTimestamp = lastTimeDataReceived;
	           console.log( "Smartthings App: No data returned" );
	        }
	        else
	        {
	        	// Since we have data, set the new last time data received to minimise the error time
	        	var tnow = new Date();
				var newTimestamp = Math.round(tnow.getTime() / 1000);

	        	data.responseJSON.forEach(function(node)
	        	{
	        		$("<tr><td>"+node['date']+"</td><td>"+node['deviceName']+"</td><td>"+node['attribute']+"</td><td>"+node['state']+"</td></tr>").prependTo("#livelogTable > tbody");
	        	});
	        	console.log( "Smartthings App: Ajax call complete. Data Returned - ["+JSON.stringify(data)+"]" );
	        }
            // Schedule the next		
            setTimeout(doAjax(newTimestamp), refreshInterval);
        }
    });
}

$( document ).ready(function() 
{
    var tnow = new Date();
	var nowTimestamp = Math.round(tnow.getTime() / 1000);	
    console.log( "Smartthings App: Initiating Ajax calls to grab livelog data starting with date ["+nowTimestamp+"]" );
    
    doAjax(nowTimestamp);
});

<?php } ?>
// ---* END Live logs Page --- //

</script>