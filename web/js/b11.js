//<script language="JavaScript">
erolake_b1.param = 'landing=registration/?f=666';
erolake_b1.path = 'http://img1.erolake.ru/swf/girls/girl300x250.swf';
erolake_b1.width = '300';
erolake_b1.height = '300';
 var fr_width=500;  // Ширина дива
 var fr_height=350; // Высота дива
 var fr_reshow=7200;  // Показывать повторно через fr_reshow секунд
 var fr_popup_url=''; // Попап при закрытии - если пустая строка то ничего не открывать
 var fr_texts=new Array( // Собственно рекламные блоки (аккуратно с кавычками)
   '<div id=rtn4p_kni6_qiffp>Загрузка...</div>',
   '<div id="erolake_b1" ><object width="300" height="300" > <param name="movie" value="http://img1.erolake.ru/swf/b1.swf"> <embed src="http://img1.erolake.ru/swf/b1.swf" width="300" height="300"> </embed> </object></div>'
  );
 
 
 var fr_el_height_start=-1000;
 
 var fr_ie4=document.all;

 function el_move(){
   var fr_el_top=Math.round((getClientHeight()-fr_height)/2);
   var fr_el_left=Math.round((getClientWidth()-fr_width)/2);
   
   if(fr_ie4) ydiff=fr_el_height_start-document.body.scrollTop;
   else ydiff=fr_el_height_start-pageYOffset;
   
   if(ydiff!=0){
     if (Math.abs(ydiff)>5) movey=Math.round(ydiff/15); else move=ydiff;
     fr_el_height_start-=movey
    }
   
   if (fr_el_height_start!=0){
     document.getElementById('freklama').style.left=(fr_el_left);
     document.getElementById('freklama').style.top=(fr_el_height_start+fr_el_top);
    }
  }
  
 function getClientWidth() {
   return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientWidth:document.body.clientWidth;
  }

 function getClientHeight(){
   return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientHeight:document.body.clientHeight;
  }
 
 function fr_createCookie(name,value,days) {
	 if (days) {
		 var date = new Date();
		  date.setTime(date.getTime()+(days*24*60*60*1000));
		  var expires = "; expires="+date.toGMTString();
	  }
	 else var expires = "";
	   document.cookie = name+"="+value+expires+"; path=/";
  }

 function fr_readCookie(name) {
	 var nameEQ = name + "=";
	 var ca = document.cookie.split(';');
	 for(var i=0;i < ca.length;i++) {
		 var c = ca[i];
		 while (c.charAt(0)==' ') c = c.substring(1,c.length);
		 if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	  }
	 return null;
  }

 
 var elmove;
 function start_el_move(){
   elmove=setInterval("el_move()",50);
  }
 function fr_close(){
   document.getElementById('freklama').style.display='none';
   clearInterval(elmove);
   fr_createCookie('fr_time',time,5);
   if(fr_popup_url){
     window.open(fr_popup_url);
     window.blur();
    }
   return false;
  }
 
 var date = new Date();
 var time = Math.floor(date.getTime()/1000);
 var fr_time=fr_readCookie('fr_time')*1;
 //~ if(fr_time) alert( (fr_time+fr_reshow)+'<'+(time));
 if(!fr_time || fr_time+fr_reshow<time){
   //~ alert ('Показываем!');
   document.write('<div id="freklama" style="position:absolute; width:'+fr_width+'px; height:'+fr_height+'px; top:-1000px; background-color:990000; padding:5px"><div align="right"><span style="color:#ffaaaa">Эта реклама показывается 1 раз в 2 часа</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="#" onclick="return fr_close();" style="color:#ffffff">закрыть X</a>&nbsp;</div>'+fr_texts[Math.floor(Math.random()*fr_texts.length)]+'</div>');
   var st_element_move=setTimeout('start_el_move()', 1500);
  }

//</script>
