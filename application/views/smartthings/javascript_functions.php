<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">

// ---* START Live logs Page --- //
<?php if ($this->uri->segment(3) == "livelog") { ?>

var refreshInterval = 1000;

function doAjax(lastTimeChecked) {
	console.log( "Smartthings App: Initiating Ajax call to grab livelog data" );
    
    $.ajax({
        type: 'POST',
        url: '<?=site_url('smartthings/api/livelog')?>',
        data: {
        	time: lastTimeChecked
        },
        dataType: 'json',
        success: function (data) {
            console.log( "Smartthings App: Ajax call successfull. Data Returned - ["+data+"]" );    
        },
        complete: function (data) 
        {            

            if (data.responseJSON == undefined) 
            {
	           console.log( "Smartthings App: No data returned" );
	        }
	        else
	        {
	        	data.responseJSON.forEach(function(node)
	        	{
	        		$("<tr><td>"+node['date']+"</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>").prependTo("#livelogTable > tbody");
	        	});
	        	console.log( "Smartthings App: Ajax call complete. Data Returned - ["+JSON.stringify(data)+"]" );
	        }
            // Schedule the next

            var tnow = new Date();
			var nowTimestamp = Math.round(tnow.getTime() / 1000);		
            setTimeout(doAjax(nowTimestamp), refreshInterval);
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