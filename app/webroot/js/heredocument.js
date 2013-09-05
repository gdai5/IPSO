var	hdocLists = new Array() ;

function	hdocInit( tgt ) {
	if ( !tgt ) tgt = location.href ;
	for (;;) {
		var	xmlHttpObj = null ;
		if ( typeof ActiveXObject != "undefined" ) {
			var	msXml = [ 'Msxml2.XMLHTTP', 'Microsoft.XMLHTTP' ] ;
			for ( var ci=0; ci < msXml.length; ci++ ) {
				xmlHttpObj = new ActiveXObject( msXml[ci] ) ;
				if ( xmlHttpObj ) break ;
			}
		}
		else if ( typeof XMLHttpRequest != "undefined" ) {
			xmlHttpObj = new XMLHttpRequest() ;
		}
		if ( !xmlHttpObj ) break ;
		xmlHttpObj.open( 'GET', tgt, false ) ;
		xmlHttpObj.send( null ) ;
		
		var	hdocTgtLines = xmlHttpObj.responseText.split(/\r?\n/) ;
		var	keyflg = false ;
		var	lines = new Array() ;
		var	key = '' ;
		for ( var ci=0; ci < hdocTgtLines.length; ci++ ) {
			var	line = hdocTgtLines[ci] ;
			if ( line.match( /^<<(.+)$/ ) ) {
				key = RegExp.$1 ;
				keyflg = true ;
				lines = new Array() ;
			}
			else if ( keyflg ) {
				if ( line.match( new RegExp("^"+key+"$" ) ) ) {
					keyflg = false ;
					hdocLists[key] = lines.join('\n') ;
					continue ;
				}
				lines.push(line) ;
			}
		}
		break ;
	}
	
}	// end of hdocInit()

function	hdocGet( key ) {
	return hdocLists[key] ;
}	// end of hdocGet()