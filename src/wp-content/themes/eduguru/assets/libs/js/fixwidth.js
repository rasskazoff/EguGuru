$=jQuery
    fixWidth = function(){
        let block = '.counter_item_num';
        width=[];
        for(i=0; i<$(block).length; i++){
            $(block).attr('style','width:auto');
            width.push($(block+':eq('+i+')').width());
        }
        width = Math.max.apply(null, width);
        $(block).attr('style','width:'+width+'px');
    }
    

    fixHeight = function(){
        let card = '.card_wrap'

        for(i=0; i<$(card).length; i++){
            
            let block = card+':eq('+i+')'+' .card_step_title';
            height=[];
            for(b=0; b<$(block).length; b++){
                $(block).attr('style','height:auto');
                height.push($(block+':eq('+b+')').outerHeight());
            }

            height = Math.max.apply(null, height);
            $(block).attr('style','height:'+height+'px');
        }
    }

document.addEventListener('DOMContentLoaded', ()=>{
    if (innerWidth <= 640){
        fixWidth()
        setTimeout(()=>{fixWidth()},1000)
    }
    fixHeight()
    setTimeout(()=>{fixHeight()},1000)          
    filterVissible()
    
})