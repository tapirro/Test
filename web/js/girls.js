var erolake_girl = new Object();

erolake_girl.param = 'landing=registration/?f=666&video=300x250_1.flv';
erolake_girl.path = 'http://img1.erolake.ru/swf/girls/girl300x250.swf';
erolake_girl.width = '300';
erolake_girl.height = '250';

erolake_girl.putObjects = function () {
// <erolake_girl>
document.write('<div id="erolake_girl" style="position:fixed;width:'+ erolake_girl.width +'px;height:'+ erolake_girl.height +'px;z-index:9999;right:0px;bottom:0px;">');
// object
document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"');
document.write(' codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"');
document.write(' id="erolake_girlObject" width="'+erolake_girl.width+'" height="'+erolake_girl.height+'">');
// object params
document.write(' <param name="allowScriptAccess" value="always"/> ');
document.write(' <param name="movie" value="'+erolake_girl.path+"?"+erolake_girl.param +'"/>');
document.write(' <param name="wmode" value="transparent" />');
document.write(' <param name="quality" value="high" /> ');
document.write(' <param name="FlashVars" value="'+erolake_girl.param+'"/>');
// embed
document.write('<embed src="'+ erolake_girl.path+"?"+erolake_girl.param +'" name="erolake_girl" wmode="transparent" quality="high" width="'+ erolake_girl.width +'" height="'+ erolake_girl.height +'" flashvars="'+erolake_girl.param+'" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>');
document.write('</object></div>');
document.write('</script>');
// </erolake_girl>
}
erolake_girl.putObjects();