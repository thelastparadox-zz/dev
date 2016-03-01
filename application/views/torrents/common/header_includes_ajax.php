<!-- Ajax Script -->
<script type="text/javascript">
  
    function performMovieSearch(movieTitle) //$('#SearchBox').val()
    {
        $.ajax({
               url: '<?=site_url()?>/torrents/main/ajax_search',
               data: {
                  title: movieTitle
               },
               error: function() {
                  console.log('Torrent Search: An error has occurred.');
                  $('#info').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>An error has occurred.</div>');
                  $('#AjaxLoading').hide();
               },
               success: function(data) 
               {
                    console.log('Torrent Search: Search Success.');

                    if (data !== "")
                    {
                        var results = jQuery.parseJSON(data);

                        console.log('Torrent Search: Response='+results.Response);
                        console.log('Torrent Search: RESULTS='+data);

                        if (results.Response == 'True')
                        {
                            $('#info').html('');
                            $.each( results.Search, function(key, value) 
                            { 
                                $('#search-menu').append('<li class="sidebar-search searchResults"><div class="form-control"><a href="#" class="selectmovie" imdbID="'+value.imdbID+'">'+value.Title+' &#40;'+value.Year+'&#41;</a></div></li>');
                                    
                                //
                                // Save Film for Download
                                //
                                $('.selectmovie').click(function(e)
                                {
                                    console.log('Torrent Search: Movie selected is '+$(this).attr('imdbID'))
                                    //alert();
                                });
                            });
                        }
                        else
                        {
                          $('#info').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No results.</div>');
                        }
                    }
                    else
                    {
                        $('#info').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No results.</div>');
                    }

                    $('#AjaxLoading').hide();
                  
               },
               type: 'POST',
               timeout: 3000
            });
    }


    $( document ).ready(function() 
    {
        // Initially hide the Loading Button
        $('#AjaxLoading').hide();

        //
        // Search Function
        //

        $('#SearchBox').keyup(function() 
        {
            $('.searchResults').remove();

            $('#info').html('');
            $('#AjaxLoading').show();

            console.log('Torrent Search: Button clicked.');
            //event.preventDefault();
            
           
        });
    });
</script>