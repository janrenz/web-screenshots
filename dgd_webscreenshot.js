jQuery(document).ready(function () {
	//lets check all images and check if they are the same 
	//each element shout have its url in data-src attr
	DGD_Webscreenshot_Refresh_IntervalId = self.setInterval(		
		function DGD_Webscreenshot_Refresh (){
			var anotherCheckIsNeeded = false;
			jQuery('.webscreenshot_refresh').each(
					function (index, element)
					{
						var a=new Image(); 
						a.src=jQuery(element).attr('src');
					    // the image ex
						if (a.width != jQuery(element).attr('data-width')){
							//reset src and force reload
							jQuery(element).attr('src', jQuery(element).attr('data-src')+'&ts='+Math.random(1000));
							anotherCheckIsNeeded = true;
							jQuery(element).attr('data-refreshcounter', jQuery(element).attr('data-refreshcounter')+1);
						}
						if (jQuery(element).attr('data-refreshcounter') >= 10){
							//do not recall this to often
							anotherCheckIsNeeded = false;
						}
					}
			);
			if (anotherCheckIsNeeded === false){
				self.clearInterval(DGD_Webscreenshot_Refresh_IntervalId);
			}
		},10000
	);
});
