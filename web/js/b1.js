var erolake_b1 = new Object();

erolake_b1.param = 'landing=registration/?f=666';
erolake_b1.path = 'http://img1.erolake.ru/swf/b1.swf';
erolake_b1.width = '300';
erolake_b1.height = '300';

erolake_b1.putObjects = function () {
// <erolake_b1>
document.write('<div id="erolake_b1" style="position:fixed; z-index:1000; top:40%; left:40%">');
// object
document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"');
document.write(' codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"');
document.write(' id="erolake_b1Object" width="'+erolake_b1.width+'" height="'+erolake_b1.height+'">');
// object params
document.write(' <param name="allowScriptAccess" value="always"/> ');
document.write(' <param name="movie" value="'+erolake_b1.path+"?"+erolake_b1.param +'"/>');
document.write(' <param name="wmode" value="transparent" />');
document.write(' <param name="quality" value="high" /> ');
document.write(' <param name="FlashVars" value="'+erolake_b1.param+'"/>');
// embed
document.write('<embed src="'+ erolake_b1.path+"?"+erolake_b1.param +'" name="erolake_b1" wmode="transparent" quality="high" width="'+ erolake_b1.width +'" height="'+ erolake_b1.height +'" flashvars="'+erolake_b1.param+'" allowscriptaccess="always" type="application/x-shockwave-flash" align="middle" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>');
document.write('</object></div>');
document.write('</script>');
// </erolake_b1>
}
erolake_b1.putObjects();

function hide()
{
document.getElementById("erolake_b1").style.display = "none";
}
