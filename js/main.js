    function isiOS(){
        // will use the default scrolling in iOS 5
        return (
            (navigator.platform.indexOf("iOS") != -1) ||
            (navigator.platform.indexOf("iPad") != -1) ||
            (navigator.platform.indexOf("iPhone") != -1) ||
            (navigator.platform.indexOf("iPod") != -1)
        );
    }
    
$(function() {
	$("#profile_pic").fancybox({
		'transitionIn' : 'elastic', 'transitionOut' : 'elastic',
	});
            if(!isiOS())
                $('#bio').jScrollPane();
                
        $(".service-icon").click(function(e) {
        	var service = $(this).attr('rel');
        		window.open(services_array[service]);
        });
});

var services_array = {
	'resume' : 'http://www.scribd.com/embeds/33750806/content?start_page=1&view_mode=list',
	'twitter' : 'http://twitter.com/crisss1205',
	'facebook' : 'http://facebook.com/crisss1205',
	'wordpress' : 'http://blog.cttapp.com',
	'instagram' : 'http://img.cttapp.com/u/crisss1205',
	'foursquare' : 'http://foursquare.com/crisss1205',
	'google+' : 'http://plus.google.com/111120527868392930329',
	'web' : 'http://cttapp.com/'
}