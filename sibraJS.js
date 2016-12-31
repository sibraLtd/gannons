/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. 
 * 
 * (function() {
        var path = '//easy.myfonts.net/v2/js?sid=212938(font-family=Gill+Sans+Std+Book)&sid=212934(font-family=Gill+Sans+Std+Roman)&sid=212947(font-family=Gill+Sans+Std+Infant)&sid=212952(font-family=Gill+Sans+Std+Light)&key=OjVjYrPXzG',
            protocol = ('https:' == document.location.protocol ? 'https:' : 'http:'),
            trial = document.createElement('script');
        trial.type = 'text/javascript';
        trial.async = true;
        trial.src = protocol + path;
        var head = document.getElementsByTagName("head")[0];
        head.appendChild(trial);
    })();
 * 
 * 
 * 
 */





jQuery(document).ready(function($){ 
// This is output of slider.php file which controls the carousel on the home page. slider.php is de_queued   
    $('.flexslider-home').flexslider({
			animation: "fade",
			slideshow: 1,
			slideshowSpeed: 4000,
			animationSpeed: 600, 
			directionNav: true,
			controlNav: false,
			useCSS: false
									
					});
    
    
    // If click on a hash, end up 100px above it. 
    // The function actually applying the offset http://stackoverflow.com/questions/17534661/make-anchor-link-go-some-pixels-above-where-its-linked-to
function offsetAnchor() {
    if(location.hash.length !== 0) {
       // console.log("hash length", location.hash.length);
        window.scrollTo(window.scrollX, window.scrollY - 200);
    }
}

// This will capture hash changes while on the page
$(window).on("hashchange", function () {
    offsetAnchor();
});

// This is here so that when you enter the page with a hash,
// it can provide the offset in that case too. Having a timeout
// seems necessary to allow the browser to jump to the anchor first.
window.setTimeout(function() {
    offsetAnchor();
}, 1); // The delay of 1 is arbitrary and may not always work right (although it did in my testing).
    
    
    
    
    
    
    function reCalculate() {
   //  console.log('Hello World' );
    
     newWidth = $( '.leftColumn.topCol' ).width();
  $( '.leftColumn.topCol .leftSidebar'  ).width(newWidth); 
   // console.log( 'newWidth is ' + newWidth );
   
   $( '.leftColumn.topCol .leftSidebar  .subscribe'  ).width( newWidth - 15 ); 
   // $( '.menuServices ul' ).width( newWidth );
  
    newRightWidth = $( '.rightColumn' ).width();  
  $( '.authPic' ).width(newRightWidth);  
   $( '.rightSidebar' ).width(newRightWidth); 
  
  // position hoverText at foot of image. 
    heightHoverText = $( '.contactPerson img').outerHeight(); 
  $( '.hoverText' ).outerHeight(heightHoverText );
 
    bottomHoverShift = $( '.contactDetails' ).outerHeight( true ); 
 
  
 $( '.hoverText' ).css( 'bottom', bottomHoverShift + 'px' );
 
 
 
    
    // reload on orientation change.
      
      return this;
    }
    
    
    $(window).load(function()  {
        reCalculate();
        
        if ($( '.ubermenu-responsive-toggle').css( 'display' ) === 'none') {
         
        
       //console.log('doing affix');
        if ($( '.middle' ).innerHeight() > 750 ){
           // console.log('hello height');
           // testHeight = $( '.middle' ).innerHeight();
            // console.log( 'testHeight is ' + testHeight );
            
                $( '.menuFixed' ).affix({
              offset: {
                top: 410
                
              }
            });
            
            
            $( '.topCol .leftSidebar' ).affix({
                      offset: {
                        top: 410,
                        bottom: function () {
                          return 400;
                          // (this.bottom = $('#footer-var2').outerHeight(true));
                        }
                      }
                    });
            
            $( '.rightColumn .rightSidebar').affix({
                     offset: {
                      top: 410,
                      bottom: function () {
                          return 400;
                          
                            (this.bottom = $('#footer-var2').outerHeight(true));
                          
                        }  }           }) ;
        
            }
    } else {
       // console.log(' not doing affix3');
        // http://stackoverflow.com/questions/15366519/how-do-i-remove-bootstrap-affix-from-an-element-under-certain-conditions 
        // how to turn affix off
        
        $(window).off('.affix');
       
        
        
    }
        
});
 window.addEventListener("resize", function() {
    // Get screen size (inner/outerWidth, inner/outerHeight)
    reCalculate(); 

}, false);



$(".moreStuff").click(function() {
   //  $(".dropDown").slideToggle();
});







});








