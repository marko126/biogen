       
        function isRunningStandalone() {
                return (window.matchMedia('(display-mode: standalone)').matches);
        }
	$(document).ready(function(){
		var top = 10;
		
                    // Opera 8.0+
                var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
                    // Firefox 1.0+
                var isFirefox = typeof InstallTrigger !== 'undefined';
                    // At least Safari 3+: "[object HTMLElementConstructor]"
                var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
                    // Internet Explorer 6-11
                var isIE = /*@cc_on!@*/false || !!document.documentMode;
                    // Edge 20+
                var isEdge = !isIE && !!window.StyleMedia;
                
                var isChromium = window.chrome,
                    winNav = window.navigator,
                    vendorName = winNav.vendor,
                    isOpera = winNav.userAgent.indexOf("OPR") > -1,
                    isIEedge = winNav.userAgent.indexOf("Edge") > -1,
                    isIOSChrome = winNav.userAgent.match("CriOS");
                
                if (navigator.standalone = navigator.standalone || (screen.height-document.documentElement.clientHeight<80) || screen.width > 768) {
                        $("#logo-splash").removeAttr("style");
                        $('#splash-screen').show();
                } else {
                        $("#logo-splash").animate({top: '3%'}, 2500);
                        if (isSafari || (isChromium !== null && isChromium !== undefined && vendorName === "Google Inc." && isOpera == false && isIEedge == false)) {
                                setTimeout(function(){    
                                    addToHomescreen({
                                        modal: false,
                                        startDelay: 1,
                                        lifespan: 0,
                                        displayPace: 0
                                        //maxDisplayCount: 1
                                    });
                                }, 1000); 
                        } else {
                               $('#splash-screen').show(); 
                        }
                }
                
		//$("button").trigger("click");
		window.onresize = function(event) {
			$("#logo-splash").removeAttr("style");
		};
	});
