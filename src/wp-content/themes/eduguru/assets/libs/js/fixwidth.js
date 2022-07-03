jQuery(function ($) {

        fixWidth = function(){
            let block = '.counter_item_num';
            width=[];
            for(i=0; i<$(block).length; i++){
                width.push($(block+':eq('+i+')').width());
            }
            width = Math.max.apply(null, width);
            $(block).attr('style','width:'+width+'px');
        }
        

        fixHeight = function(){
            let card = '.card_wrap'

            for(i=0; i<$(card).length; i++){
                
                let block = card+':eq('+i+')'+' .card_step_tittle';
                height=[];
                for(b=0; b<$(block).length; b++){
                    height.push($(block+':eq('+b+')').outerHeight());
                }

                height = Math.max.apply(null, height);
                $(block).attr('style','height:'+height+'px');
            }
        }
        
        window.onload = function(){
            fixHeight()            
            filterVissible()
            if (innerWidth <= 640){
                fixWidth()
            }
        }
})