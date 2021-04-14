/** Rotator Demo by scriptos.eu **/

(function($) {

    imageSlider = function (NameDiver){
        var iconNow = "imgs/iconNow.png";
        var iconHide = "imgs/iconHide.png";
        
        var NameDiv = NameDiver + " ";
        
        var count = $(NameDiv + "#center .item").length;
        
        var width = parseInt($(NameDiv + "#center").width());
        var height = parseInt($(NameDiv + "#center").height());
        
        var widthAll = width * count;   
        
        
        var itemID = parseInt($(NameDiv + "#ItemNow").attr("tag"));
        var iLeft =  itemID - 1;
        
        
        $(NameDiv + "#content").css("width",widthAll);
        $(NameDiv + "#content").css("height",height);
        
        if(iLeft <= 0) {
            $(".left").hide();
        }
            
        for(i=1; i <= count; i++){
                $(NameDiv + "#icon").append('<img src="'+ iconHide +'"  tag="'+ i +'" />');
        }
        
		$(NameDiv + "#icon img, " + NameDiv + ".left, " + NameDiv + ".right").hover(function() {
			$(this).css('cursor','pointer');
		 }, function() {
			$(this).css('cursor','default');
		});
		
		function itemTager(tager){
            for(i=1; i <= count; i++){
                if(i == tager){
                    $(NameDiv + "#icon img[tag="+ i +"]").attr("src", iconNow);
                }else{
                    $(NameDiv + "#icon img[tag="+ i +"]").attr("src", iconHide);
                }
            }
            
            var inter =  parseInt(tager);
    
            if(inter == 1){
                $(NameDiv + ".item").animate({"left":"0px"}, "slow");
            }else{
                var marginLeft = width * (inter - 1);
                $(NameDiv + ".item").animate({"left":"-"+ marginLeft +"px"}, "slow");
            }
        }
        
        itemTager(1);
        
		$(NameDiv + "#icon img").click(function(){
			var tag = parseInt($(this).attr("tag"));
            
			$(NameDiv + "#ItemNow").attr("tag", tag);
			itemTager(tag);
			
			if(tag <= 1) {
                $(NameDiv + ".left").hide();
                $(NameDiv + ".right").show();
            }else if(tag >= count){
                $(NameDiv + ".right").hide();
                $(NameDiv + ".left").show();
            }else{
                $(NameDiv + ".right").show();
                $(NameDiv + ".left").show();
            }
			
		});
		
		
        $(NameDiv + ".left").click(function(){
            var itemIDL = parseInt($(NameDiv + "#ItemNow").attr("tag"));
            var iLeft = itemIDL - 1;
            
            if(iLeft <= 1) {
                $(NameDiv + ".left").hide();
                $(NameDiv + ".right").show();
                $(NameDiv + "#ItemNow").attr("tag", "1");
                itemTager(1);
            }else{
                $(NameDiv + "#ItemNow").attr("tag", iLeft);
                $(NameDiv + ".right").show();
                itemTager(iLeft);
            }
            
        });
    
        $(NameDiv + ".right").click(function(){
            var itemIDR = parseInt($(NameDiv + "#ItemNow").attr("tag"));
            var iRight = itemIDR + 1;
            
            if(iRight >= count){
                $(NameDiv + ".right").hide();
                $(NameDiv + ".left").show();
                $(NameDiv + "#ItemNow").attr("tag", count);
                itemTager(count);
            }else{
                $(NameDiv + "#ItemNow").attr("tag", iRight);
                itemTager(iRight);
                $(NameDiv + ".left").show();
            }
            
        });
    }    
})(jQuery);

/** Rotator Demo by scriptos.eu **/