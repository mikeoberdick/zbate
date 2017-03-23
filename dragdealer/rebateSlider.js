Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

jQuery.fn.isOnScreen = function(){
    
    var win = jQuery(window);
    
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
    
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
};

!function(a,b){"function"==typeof define&&define.amd?define(b):a.Dragdealer=b()}(this,function(){function j(a){var b="Webkit Moz ms O".split(" "),c=document.documentElement.style;if(void 0!==c[a])return a;a=a.charAt(0).toUpperCase()+a.substr(1);for(var d=0;d<b.length;d++)if(void 0!==c[b[d]+a])return b[d]+a}function k(a){i.backfaceVisibility&&i.perspective&&(a.style[i.perspective]="1000px",a.style[i.backfaceVisibility]="hidden")}var a=function(a,b){this.options=this.applyDefaults(b||{}),this.bindMethods(),this.wrapper=this.getWrapperElement(a),this.wrapper&&(this.handle=this.getHandleElement(this.wrapper,this.options.handleClass),this.handle&&(this.init(),this.bindEventListeners()))};a.prototype={defaults:{disabled:!1,horizontal:!0,vertical:!1,slide:!0,steps:0,snap:!1,loose:!1,speed:.1,xPrecision:0,yPrecision:0,handleClass:"handle",css3:!0,activeClass:"active",tapping:!0},init:function(){this.options.css3&&k(this.handle),this.value={prev:[-1,-1],current:[this.options.x||0,this.options.y||0],target:[this.options.x||0,this.options.y||0]},this.offset={wrapper:[0,0],mouse:[0,0],prev:[-999999,-999999],current:[0,0],target:[0,0]},this.change=[0,0],this.stepRatios=this.calculateStepRatios(),this.activity=!1,this.dragging=!1,this.tapping=!1,this.reflow(),this.options.disabled&&this.disable()},applyDefaults:function(a){for(var b in this.defaults)a.hasOwnProperty(b)||(a[b]=this.defaults[b]);return a},getWrapperElement:function(a){return"string"==typeof a?document.getElementById(a):a},getHandleElement:function(a,b){var c,d,e;if(a.getElementsByClassName){if(c=a.getElementsByClassName(b),c.length>0)return c[0]}else for(d=new RegExp("(^|\\s)"+b+"(\\s|$)"),c=a.getElementsByTagName("*"),e=0;e<c.length;e++)if(d.test(c[e].className))return c[e]},calculateStepRatios:function(){var a=[];if(this.options.steps>=1)for(var b=0;b<=this.options.steps-1;b++)a[b]=this.options.steps>1?b/(this.options.steps-1):0;return a},setWrapperOffset:function(){this.offset.wrapper=h.get(this.wrapper)},calculateBounds:function(){var a={top:this.options.top||0,bottom:-(this.options.bottom||0)+this.wrapper.offsetHeight,left:this.options.left||0,right:-(this.options.right||0)+this.wrapper.offsetWidth};return a.availWidth=a.right-a.left-this.handle.offsetWidth,a.availHeight=a.bottom-a.top-this.handle.offsetHeight,a},calculateValuePrecision:function(){var a=this.options.xPrecision||Math.abs(this.bounds.availWidth),b=this.options.yPrecision||Math.abs(this.bounds.availHeight);return[a?1/a:0,b?1/b:0]},bindMethods:function(){this.requestAnimationFrame="function"==typeof this.options.customRequestAnimationFrame?b(this.options.customRequestAnimationFrame,window):b(m,window),this.cancelAnimationFrame="function"==typeof this.options.customCancelAnimationFrame?b(this.options.customCancelAnimationFrame,window):b(n,window),this.animateWithRequestAnimationFrame=b(this.animateWithRequestAnimationFrame,this),this.animate=b(this.animate,this),this.onHandleMouseDown=b(this.onHandleMouseDown,this),this.onHandleTouchStart=b(this.onHandleTouchStart,this),this.onDocumentMouseMove=b(this.onDocumentMouseMove,this),this.onWrapperTouchMove=b(this.onWrapperTouchMove,this),this.onWrapperMouseDown=b(this.onWrapperMouseDown,this),this.onWrapperTouchStart=b(this.onWrapperTouchStart,this),this.onDocumentMouseUp=b(this.onDocumentMouseUp,this),this.onDocumentTouchEnd=b(this.onDocumentTouchEnd,this),this.onHandleClick=b(this.onHandleClick,this),this.onWindowResize=b(this.onWindowResize,this)},bindEventListeners:function(){c(this.handle,"mousedown",this.onHandleMouseDown),c(this.handle,"touchstart",this.onHandleTouchStart),c(document,"mousemove",this.onDocumentMouseMove),c(this.wrapper,"touchmove",this.onWrapperTouchMove),c(this.wrapper,"mousedown",this.onWrapperMouseDown),c(this.wrapper,"touchstart",this.onWrapperTouchStart),c(document,"mouseup",this.onDocumentMouseUp),c(document,"touchend",this.onDocumentTouchEnd),c(this.handle,"click",this.onHandleClick),c(window,"resize",this.onWindowResize),this.animate(!1,!0),this.interval=this.requestAnimationFrame(this.animateWithRequestAnimationFrame)},unbindEventListeners:function(){d(this.handle,"mousedown",this.onHandleMouseDown),d(this.handle,"touchstart",this.onHandleTouchStart),d(document,"mousemove",this.onDocumentMouseMove),d(this.wrapper,"touchmove",this.onWrapperTouchMove),d(this.wrapper,"mousedown",this.onWrapperMouseDown),d(this.wrapper,"touchstart",this.onWrapperTouchStart),d(document,"mouseup",this.onDocumentMouseUp),d(document,"touchend",this.onDocumentTouchEnd),d(this.handle,"click",this.onHandleClick),d(window,"resize",this.onWindowResize),this.cancelAnimationFrame(this.interval)},onHandleMouseDown:function(a){g.refresh(a),e(a),f(a),this.activity=!1,this.startDrag()},onHandleTouchStart:function(a){g.refresh(a),f(a),this.activity=!1,this.startDrag()},onDocumentMouseMove:function(a){g.refresh(a),this.dragging&&(this.activity=!0,e(a))},onWrapperTouchMove:function(a){return g.refresh(a),!this.activity&&this.draggingOnDisabledAxis()?(this.dragging&&this.stopDrag(),void 0):(e(a),this.activity=!0,void 0)},onWrapperMouseDown:function(a){g.refresh(a),e(a),this.startTap()},onWrapperTouchStart:function(a){g.refresh(a),e(a),this.startTap()},onDocumentMouseUp:function(){this.stopDrag(),this.stopTap()},onDocumentTouchEnd:function(){this.stopDrag(),this.stopTap()},onHandleClick:function(a){this.activity&&(e(a),f(a))},onWindowResize:function(){this.reflow()},enable:function(){this.disabled=!1,this.handle.className=this.handle.className.replace(/\s?disabled/g,"")},disable:function(){this.disabled=!0,this.handle.className+=" disabled"},reflow:function(){this.setWrapperOffset(),this.bounds=this.calculateBounds(),this.valuePrecision=this.calculateValuePrecision(),this.updateOffsetFromValue()},getStep:function(){return[this.getStepNumber(this.value.target[0]),this.getStepNumber(this.value.target[1])]},getValue:function(){return this.value.target},setStep:function(a,b,c){this.setValue(this.options.steps&&a>1?(a-1)/(this.options.steps-1):0,this.options.steps&&b>1?(b-1)/(this.options.steps-1):0,c)},setValue:function(a,b,c){this.setTargetValue([a,b||0]),c&&(this.groupCopy(this.value.current,this.value.target),this.updateOffsetFromValue(),this.callAnimationCallback())},startTap:function(){!this.disabled&&this.options.tapping&&(this.tapping=!0,this.setWrapperOffset(),this.setTargetValueByOffset([g.x-this.offset.wrapper[0]-this.handle.offsetWidth/2,g.y-this.offset.wrapper[1]-this.handle.offsetHeight/2]))},stopTap:function(){!this.disabled&&this.tapping&&(this.tapping=!1,this.setTargetValue(this.value.current))},startDrag:function(){this.disabled||(this.dragging=!0,this.setWrapperOffset(),this.offset.mouse=[g.x-h.get(this.handle)[0],g.y-h.get(this.handle)[1]],this.wrapper.className.match(this.options.activeClass)||(this.wrapper.className+=" "+this.options.activeClass),this.callDragStartCallback())},stopDrag:function(){if(!this.disabled&&this.dragging){this.dragging=!1;var a=this.groupClone(this.value.current);if(this.options.slide){var b=this.change;a[0]+=4*b[0],a[1]+=4*b[1]}this.setTargetValue(a),this.wrapper.className=this.wrapper.className.replace(" "+this.options.activeClass,""),this.callDragStopCallback()}},callAnimationCallback:function(){var a=this.value.current;this.options.snap&&this.options.steps>1&&(a=this.getClosestSteps(a)),this.groupCompare(a,this.value.prev)||("function"==typeof this.options.animationCallback&&this.options.animationCallback.call(this,a[0],a[1]),this.groupCopy(this.value.prev,a))},callTargetCallback:function(){"function"==typeof this.options.callback&&this.options.callback.call(this,this.value.target[0],this.value.target[1])},callDragStartCallback:function(){"function"==typeof this.options.dragStartCallback&&this.options.dragStartCallback.call(this,this.value.target[0],this.value.target[1])},callDragStopCallback:function(){"function"==typeof this.options.dragStopCallback&&this.options.dragStopCallback.call(this,this.value.target[0],this.value.target[1])},animateWithRequestAnimationFrame:function(a){a?(this.timeOffset=this.timeStamp?a-this.timeStamp:0,this.timeStamp=a):this.timeOffset=25,this.animate(),this.interval=this.requestAnimationFrame(this.animateWithRequestAnimationFrame)},animate:function(a,b){if(!a||this.dragging){if(this.dragging){var c=this.groupClone(this.value.target),d=[g.x-this.offset.wrapper[0]-this.offset.mouse[0],g.y-this.offset.wrapper[1]-this.offset.mouse[1]];this.setTargetValueByOffset(d,this.options.loose),this.change=[this.value.target[0]-c[0],this.value.target[1]-c[1]]}(this.dragging||b)&&this.groupCopy(this.value.current,this.value.target),(this.dragging||this.glide()||b)&&(this.updateOffsetFromValue(),this.callAnimationCallback())}},glide:function(){var a=[this.value.target[0]-this.value.current[0],this.value.target[1]-this.value.current[1]];return a[0]||a[1]?(Math.abs(a[0])>this.valuePrecision[0]||Math.abs(a[1])>this.valuePrecision[1]?(this.value.current[0]+=a[0]*Math.min(this.options.speed*this.timeOffset/25,1),this.value.current[1]+=a[1]*Math.min(this.options.speed*this.timeOffset/25,1)):this.groupCopy(this.value.current,this.value.target),!0):!1},updateOffsetFromValue:function(){this.offset.current=this.options.snap?this.getOffsetsByRatios(this.getClosestSteps(this.value.current)):this.getOffsetsByRatios(this.value.current),this.groupCompare(this.offset.current,this.offset.prev)||(this.renderHandlePosition(),this.groupCopy(this.offset.prev,this.offset.current))},renderHandlePosition:function(){var a="";return this.options.css3&&i.transform?(this.options.horizontal&&(a+="translateX("+this.offset.current[0]+"px)"),this.options.vertical&&(a+=" translateY("+this.offset.current[1]+"px)"),this.handle.style[i.transform]=a,void 0):(this.options.horizontal&&(this.handle.style.left=this.offset.current[0]+"px"),this.options.vertical&&(this.handle.style.top=this.offset.current[1]+"px"),void 0)},setTargetValue:function(a,b){var c=b?this.getLooseValue(a):this.getProperValue(a);this.groupCopy(this.value.target,c),this.offset.target=this.getOffsetsByRatios(c),this.callTargetCallback()},setTargetValueByOffset:function(a,b){var c=this.getRatiosByOffsets(a),d=b?this.getLooseValue(c):this.getProperValue(c);this.groupCopy(this.value.target,d),this.offset.target=this.getOffsetsByRatios(d)},getLooseValue:function(a){var b=this.getProperValue(a);return[b[0]+(a[0]-b[0])/4,b[1]+(a[1]-b[1])/4]},getProperValue:function(a){var b=this.groupClone(a);return b[0]=Math.max(b[0],0),b[1]=Math.max(b[1],0),b[0]=Math.min(b[0],1),b[1]=Math.min(b[1],1),(!this.dragging&&!this.tapping||this.options.snap)&&this.options.steps>1&&(b=this.getClosestSteps(b)),b},getRatiosByOffsets:function(a){return[this.getRatioByOffset(a[0],this.bounds.availWidth,this.bounds.left),this.getRatioByOffset(a[1],this.bounds.availHeight,this.bounds.top)]},getRatioByOffset:function(a,b,c){return b?(a-c)/b:0},getOffsetsByRatios:function(a){return[this.getOffsetByRatio(a[0],this.bounds.availWidth,this.bounds.left),this.getOffsetByRatio(a[1],this.bounds.availHeight,this.bounds.top)]},getOffsetByRatio:function(a,b,c){return Math.round(a*b)+c},getStepNumber:function(a){return this.getClosestStep(a)*(this.options.steps-1)+1},getClosestSteps:function(a){return[this.getClosestStep(a[0]),this.getClosestStep(a[1])]},getClosestStep:function(a){for(var b=0,c=1,d=0;d<=this.options.steps-1;d++)Math.abs(this.stepRatios[d]-a)<c&&(c=Math.abs(this.stepRatios[d]-a),b=d);return this.stepRatios[b]},groupCompare:function(a,b){return a[0]==b[0]&&a[1]==b[1]},groupCopy:function(a,b){a[0]=b[0],a[1]=b[1]},groupClone:function(a){return[a[0],a[1]]},draggingOnDisabledAxis:function(){return!this.options.horizontal&&g.xDiff>g.yDiff||!this.options.vertical&&g.yDiff>g.xDiff}};for(var b=function(a,b){return function(){return a.apply(b,arguments)}},c=function(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,c)},d=function(a,b,c){a.removeEventListener?a.removeEventListener(b,c,!1):a.detachEvent&&a.detachEvent("on"+b,c)},e=function(a){a||(a=window.event),a.preventDefault&&a.preventDefault(),a.returnValue=!1},f=function(a){a||(a=window.event),a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0},g={x:0,y:0,xDiff:0,yDiff:0,refresh:function(a){a||(a=window.event),"mousemove"==a.type?this.set(a):a.touches&&this.set(a.touches[0])},set:function(a){var b=this.x,c=this.y;a.clientX||a.clientY?(this.x=a.clientX,this.y=a.clientY):(a.pageX||a.pageY)&&(this.x=a.pageX-document.body.scrollLeft-document.documentElement.scrollLeft,this.y=a.pageY-document.body.scrollTop-document.documentElement.scrollTop),this.xDiff=Math.abs(this.x-b),this.yDiff=Math.abs(this.y-c)}},h={get:function(a){var b={left:0,top:0};return void 0!==a.getBoundingClientRect&&(b=a.getBoundingClientRect()),[b.left,b.top]}},i={transform:j("transform"),perspective:j("perspective"),backfaceVisibility:j("backfaceVisibility")},l=["webkit","moz"],m=window.requestAnimationFrame,n=window.cancelAnimationFrame,o=0;o<l.length&&!m;++o)m=window[l[o]+"RequestAnimationFrame"],n=window[l[o]+"CancelAnimationFrame"]||window[l[o]+"CancelRequestAnimationFrame"];return m||(m=function(a){return setTimeout(a,25)},n=clearTimeout),a});

jQuery(document).ready(function(){

var windowMobileWidth = 860,
    infoboxWidth = jQuery('.infobox').width(),
    halfInfoboxWidth = infoboxWidth / 2,
    rangeHolderWidth = jQuery('.range-holder').width(),
    init = 0;

    new Dragdealer('home_price_slider', {
        steps:1200,
        animationCallback: function(x, y) {
            if (init === 0) {
                init++;
                this.setValue(0.5, 0);
            }
            var slider_value = x.toFixed(3) *1000;

            var stripe_width = x * 100;
            if (slider_value < 100) {
                slider_value = 100000;
            } else {
                slider_value *= 1000
            }

            jQuery(".rebateAmount").html("$" + Math.round(((slider_value*0.03) *.3) *.66666).format());
            jQuery(".homePrice").html("$" + slider_value.format());

            jQuery(".stripe").css("width", ""+stripe_width+"%");

            if(stripe_width < 10) {
                jQuery(".range-left").css('visibility', 'hidden');
            } else if (stripe_width > 90) {
                jQuery(".range-right").css('visibility', 'hidden');
            } else {
                jQuery(".range-left, .range-right").css('visibility', 'visible')
            }

            if (jQuery('.infobox').offset().left < jQuery('.range-holder').offset().left) {
                jQuery('.infobox').offset({ top: jQuery('.infobox').offset().top, left: jQuery('.range-holder').offset().left });
                jQuery('.innerbox-before').offset({ top:  topDefault, left: jQuery('.square').offset().left  });
                jQuery('.innerbox-after').offset({ top: topDefault - 2, left: jQuery('.square').offset().left  });
            } else if(jQuery('.infobox').offset().left + infoboxWidth > jQuery('.range-holder').offset().left + rangeHolderWidth) {
                jQuery('.infobox').offset({ top: jQuery('.infobox').offset().top, left: (jQuery('.range-holder').offset().left + rangeHolderWidth - infoboxWidth )});
                jQuery('.innerbox-before').offset({ top:  topDefault, left: jQuery('.square').offset().left  });
                jQuery('.innerbox-after').offset({ top: topDefault - 2, left: jQuery('.square').offset().left  });
            } else {                
                if (stripe_width > 17.2 && stripe_width < 83) {
                    jQuery('.infobox').offset({ top: jQuery('.infobox').offset().top, left: (jQuery('.square').offset().left) - 178});
                    jQuery('.innerbox-before').offset({ top:  topDefault, left: jQuery('.square').offset().left + 2 });
                    jQuery('.innerbox-after').offset({ top: topDefault - 2, left: jQuery('.square').offset().left + 2 });
                } else if (stripe_width <= 17.2) {
                    jQuery('.infobox').offset({ top: jQuery('.infobox').offset().top, left: jQuery('.range-holder').offset().left });
                    jQuery('.innerbox-before').offset({ top:  topDefault, left: jQuery('.square').offset().left +2 });
                    jQuery('.innerbox-after').offset({ top: topDefault - 2, left: jQuery('.square').offset().left + 2 });
                } else if (stripe_width >= 83) {
                    jQuery('.infobox').offset({ top: jQuery('.infobox').offset().top, left: (jQuery('.range-holder').offset().left + rangeHolderWidth - infoboxWidth )});
                    jQuery('.innerbox-before').offset({ top:  topDefault, left: jQuery('.square').offset().left + 2 });
                    jQuery('.innerbox-after').offset({ top: topDefault - 2, left: jQuery('.square').offset().left  + 2 });
                }
            }

            if (jQuery(window).width() <= windowMobileWidth) {
                var topDefault =  jQuery('.innerbox-before').offset().top;

                jQuery('.infobox').offset({ top: jQuery('.infobox').offset().top, left: ((jQuery(window).width() / 2) - halfInfoboxWidth) });
                jQuery('.innerbox-before').offset({ top:  topDefault, left: jQuery('.square').offset().left  });
                jQuery('.innerbox-after').offset({ top: topDefault - 2, left: jQuery('.square').offset().left  });

                if(jQuery('.innerbox-before').offset().left <= jQuery('.innerbox').offset().left + 10) {
                    jQuery('.innerbox-before').offset({ top: jQuery('.innerbox-before').offset().top, left: jQuery('.innerbox').offset().left + 10 });
                    jQuery('.innerbox-after').offset({ top: jQuery('.innerbox-after').offset().top, left: jQuery('.innerbox').offset().left + 10 });
                } else if (jQuery('.innerbox-before').offset().left >= jQuery('.innerbox').offset().left + jQuery('.innerbox').width() - 50) {
                    jQuery('.innerbox-before').offset({ top: jQuery('.innerbox-before').offset().top, left: jQuery('.innerbox').offset().left + jQuery('.innerbox').width() - 50 });
                    jQuery('.innerbox-after').offset({ top: jQuery('.innerbox-after').offset().top, left: jQuery('.innerbox').offset().left + jQuery('.innerbox').width() - 50 });
                }
            }
        }
    }); 

    var count = 0;
    window.onscroll = function () {
    
        jQuery('.count').each(function () {
            if (jQuery('.count').isOnScreen() && count < 1) {
                count++;
                var value = jQuery(this).text().replace(/,/g, '');
                jQuery(this).prop('Counter',0).animate({
                    Counter: value
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        jQuery(this).text(now.format(2));
                    }
                });
            }
        });
    }
    
});

