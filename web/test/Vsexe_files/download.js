StepTimingFunction={timingFunctionForStepCount:function(a){return function(b){return((b*(a-1))>>0)/((a-1))
}}};DownloadCounter=Class.create();Object.extend(DownloadCounter.prototype,{initialize:function(a){this._url=a;
this.loadData()},loadData:function(){if(this._nextUpdateTimeout){window.clearTimeout(this._nextUpdateTimeout);
this._nextUpdateTimeout=null}new Ajax.Request(this._url,{method:"get",onSuccess:this.dataRequestDidFinishLoading.bind(this)})
},dataRequestDidFinishLoading:function(n){var j=n.responseText.split("|"),m,c,i,f,k,g,b,e,d,l,a,h;
if(j.length===3){m=j[0].split(" ");c=m[1];date=m[0].split("-");this.setRate(parseInt(j[2])/3600000);
k=date[0];f=date[1];i=date[2];a=Date.parse(f+" "+k+", "+i+" "+c+" GMT-0700");d=new Date(a+3600000);
l=d.getTime()-a+1000;this._nextUpdateTimeout=setTimeout(this.loadData.bind(this),l);
b=new Date();this._lastReferenceTime=b.getTime();e=this._lastReferenceTime-a;h=Math.floor(parseInt(j[1])+e*(this._rate));
this.setCurrentCount(h);this.setNeedsDisplayIfNeeded()}},setNeedsDisplayIfNeeded:function(){if(!this._drawTimeout){this._drawTimeout=setTimeout(this.draw.bind(this),this._drawRefreshRate)
}},setElement:function(c){this._element=c;var b=this._element.getElementsByClassName("digitGroupSeparator");
if(b.length>0){var a=b[0];this._element.removeChild(a);this.setDigitGroupSeparatorTemplateElement(a)
}this._element.empty();this.createDigitElementsIfNeeded();this.setNeedsDisplayIfNeeded()
},setDigitGroupSeparatorTemplateElement:function(a){this._digitGroupSeparatorTemplateElement=a
},setCurrentCount:function(a){if(a!==this._currentCount){this._currentCount=a;this.createDigitElementsIfNeeded()
}},digitTemplateElement:function(){if(!this._digitTemplateElement){this._digitTemplateElement=document.createElement("span");
$(this._digitTemplateElement).addClassName("digit");var a=document.createElement("div"),b=document.createElement("div"),c=document.createElement("div");
$(a).addClassName("digitText");$(b).addClassName("digitImage");this._digitTemplateElement.appendChild(a);
this._digitTemplateElement.appendChild(b);$(c).addClassName("digitImageElement");
b.appendChild(c.cloneNode(true));b.appendChild(c)}return this._digitTemplateElement
},createDigitElementsIfNeeded:function(){if(this._element&&(!this._digitElements||this._digitElements.length!==this._currentCount.toString().length)){this._element.empty();
this._createDigitElements()}},_createDigitElements:function(){this._digitElements=[];
var e=0,b=this._currentCount.toString().length,c=document.createDocumentFragment(),a,h=this.digitTemplateElement(),g=this._digitGroupSeparatorTemplateElement,d=String(this._currentCount),f;
if(!g){g=document.createElement("span");$(g).addClassName("digitGroupSeparator")
}for(e=0;e<b;e++){a=h.cloneNode(true);f=parseInt(d.charAt(b-(e+1)));a.lastChild.style.top="-"+(f*(this._digitImageAnimationCount*this._digitImageHeight))+"px";
this._digitElements[e]=a;c.insertBefore(a,c.firstChild);if((e+1)!==b&&((e+1)%3==0)){c.insertBefore(g.cloneNode(true),c.firstChild)
}}this._element.appendChild(c)},currentCount:function(){return this._currentCount
},setRate:function(a){this._rate=a},rate:function(){return this._rate},_drawRefreshRate:50,_digitImageHeight:52,setDigitImageHeight:function(a){this._digitImageHeight=a
},_digitImageAnimationCount:7,setDigitImageAnimationCount:function(a){this._digitImageAnimationCount=a
},draw:function(){window.clearTimeout(this._drawTimeout);this._drawTimeout=null;
var p=(new Date()).getTime(),h=(p-this._lastReferenceTime),e,j,k,c,a,l,o,b,n,d,m,q=this._digitImageHeight*this._digitImageAnimationCount,g,f=this._digitElements,r;
if(this._element){m=String(this._currentCount);this._currentCount=this._currentCount+Math.floor(this._rate*h);
e=String(this._currentCount);j=e.length;k=j-1;for(c=k;c>=0;c--){l=parseInt(e.charAt(c));
o=parseInt(m.charAt(c));if(l!==o){a=f[k-c].lastChild;if(a.___animating!==true){n=o*q;
if(l>o){b=l*q}else{b=(o+(10-o)+l)*q}if(a.style.top!==(d="-"+n+"px")){a.style.top=d
}g=1+((b-n)/this._digitImageHeight);a.___animating=true;r=new Effect.Move(a,{x:0,y:(-1*b),duration:0.4,mode:"absolute",transition:StepTimingFunction.timingFunctionForStepCount(g)});
r.__element=a;r.finish=function(){this.__element.___animating=false}}}}}this._lastReferenceTime=p;
this.setNeedsDisplayIfNeeded()}});