/*!
 * jQuery serializeObject - v0.2 - 1/20/2010
 * http://***REMOVED***alman.com/projects/jquery-misc-plugins/
 * 
 * Copyright (c) 2010 "Cowboy" Erin Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://***REMOVED***alman.com/about/license/
 */

// Whereas .serializeArray() serializes a form into an array, .serializeObject()
// serializes a form into an (arguably more useful) object.

(function($,undefined){
  '$:nomunge'; // Used by YUI compressor.
  
  $.fn.serializeObject = function(){
    var obj = {};
    
    $.each( this.serializeArray(), function(i,o){
      var n = o.name,
        v = o.value;
        
        obj[n] = obj[n] === undefined ? v
          : $.isArray( obj[n] ) ? obj[n].concat( v )
          : [ obj[n], v ];
    });
    
    return obj;
  };
  
})(jQuery);
