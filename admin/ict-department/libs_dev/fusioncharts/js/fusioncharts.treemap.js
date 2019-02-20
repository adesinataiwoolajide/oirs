/*
 FusionCharts JavaScript Library - Tree Map Chart
 Copyright FusionCharts Technologies LLP
 License Information at <http://www.fusioncharts.com/license>

 @version 3.11.3
*/
(function(L,I){"object"===typeof module&&module.exports?module.exports=L.document?I(L):function(X){if(!X.document)throw Error("Window with document not present");return I(X,!0)}:L.FusionCharts=I(L,!0)})("undefined"!==typeof window?window:this,function(L,I){FusionCharts.register("module",["private","modules.renderer.js-treemap",function(){function X(c){return c?c.replace(/^#*/,"#"):"#E5E5E5"}function n(c,b,d){this.label=c;this.value=parseFloat(b,10);this.colorValue=parseFloat(d,10);this.prev=this.next=
void 0;this.meta={}}function R(){this._b=[];this._css=void 0;this.rangeOurEffectApplyFn=function(){};this.statePointerLow={value:void 0,index:void 0};this.statePointerHigh={value:void 0,index:void 0}}var L,I,ga,ha,G=this.hcLib,ba=G.chartAPI,Y=Math,Z=Y.max,ia=Y.round,oa=Y.tan,ja=Y.min,pa=Y.PI,ka=G.extend2,aa=this.window,qa=G.parsexAxisStyles,Y=G.Raphael,la=G.graphics,ca=la.convertColor,ma=la.getLightColor,A=this.raiseEvent,y=G.pluckNumber,D=G.pluck,ra=G.each,da=G.BLANKSTRING,sa="rgba(192,192,192,"+
(/msie/i.test(aa.navigator.userAgent)&&!aa.opera?.002:1E-6)+")",aa=!/fusioncharts\.com$/i.test(aa.location.hostname),na=G.schedular;Y.addSymbol({backIcon:function(c,b,d){--d;var a=b+d,k=a-d/2,t=c+d,v=k-d;return["M",c,b-d,"L",c-d,b,c,a,c,k,t,k,t,v,t-d,v,"Z"]},homeIcon:function(c,b,d){--d;var a=2*d,k=c-d,t=k+a/6,v=b+d,C=t+a/4,w=v-d/2,z=C+a/6,f=w+d/2,P=z+a/4,g=f-d;return["M",c,b-d,"L",k,b,t,b,t,v,C,v,C,w,z,w,z,f,P,f,P,g,P+a/6,g,"Z"]}});n.prototype.constructor=n;n.prototype.getCSSconf=function(){return this.cssConf};
n.prototype.getPath=function(){return this.path};n.prototype.setPath=function(){var c=this.getParent();this.path=(c?c.getPath():[]).concat(this)};n.prototype.addChild=function(c){c instanceof n&&(this.next=this.next||[],[].push.call(this.next,c),c.setParent(this));return this.next};n.prototype.getChildren=function(){return this.next};n.prototype.addChildren=function(c,b){var d=this.getChildren()||(this.next=[]),a=d.length;b||(b=a-1);d.splice(b>a-1?a-1:0>b?0:b,0,c);c.setParent(this)};n.prototype.getDepth=
function(){return this.meta.depth};n.prototype.isLeaf=function(c){return(c?this.getDepth()<c:!0)&&this.next};n.prototype.setParent=function(c){c instanceof n&&(this.prev=c);return this};n.prototype.getSiblingCount=function(c){var b,d=0,a=this;if(this instanceof n){b=this.getParent();if(c){for(;a;)(a=a.getSibling(c))&&(d+=1);return d}if(b)return b.getChildren().length}};n.prototype.getParent=function(){return this.prev};n.prototype.getLabel=function(){return this.label};n.prototype.getValue=function(){return this.value};
n.prototype.setValue=function(c,b){this.value=b?this.value+c:c};n.prototype.getColorValue=function(){return this.colorValue};n.prototype.getSibling=function(c){c=c.toLowerCase();var b=this.getParent(),d=this.getLabel(),a,k;if(b)for(b=b.getChildren(),a=0;a<b.length;a++)if(k=b[a],k=k.getLabel(),k===d)switch(c){case "left":return b[a-1];case "right":return b[a+1]}};n.prototype.setMeta=function(c,b){this.meta[c]=b};n.prototype.setDepth=function(c){this.meta.depth=c};n.prototype.getMeta=function(c){return c?
this.meta[c]:this.meta};R.prototype.constructor=R;R.prototype.resetPointers=function(){this.statePointerLow={value:void 0,index:void 0};this.statePointerHigh={value:void 0,index:void 0}};R.prototype.setRangeOutEffect=function(c,b){this._css=c;this.rangeOurEffectApplyFn=b};R.prototype.addInBucket=function(c){var b=this._b,d=c.getColorValue(),a=0,k=b.length-1;if(d){a:{for(var t,v;a<=k;)if(t=(a+k)/2|0,v=b[t],v=v.getColorValue(),v<d)a=t+1;else if(v>d)k=t-1;else{d=t;break a}d=~k}b.splice(Math.abs(d),0,
c)}};R.prototype.moveLowerShadePointer=function(c){var b=this._b,d,a,k,t=this.statePointerLow;d=t.index;a=t.value;var v=!1;d=void 0!==d?d:0;a=void 0!==a?a:Number.NEGATIVE_INFINITY;if(c!==a){if(a<=c){for(;;){k=(a=b[d++])?a.getColorValue():0;if(c<k||!a)break;v=!0;a.rangeOutEffect=this._css;this.rangeOurEffectApplyFn.call(a,this._css)}d=v?d-2:d-1}else{for(;;){k=(a=b[d--])?a.getColorValue():0;if(c>=k||!a)break;a.cssConf=a.cssConf||{};v=!0;delete a.rangeOutEffect;a.cssConf.opacity=1;this.rangeOurEffectApplyFn.call(a,
a.cssConf)}d=v?d+2:d+1}t.index=d;t.value=c}};R.prototype.moveHigherShadePointer=function(c){var b=this._b,d=b.length,a,k,t=this.statePointerHigh;k=t.index;a=t.value;var v=!1,d=void 0!==k?k:d-1;a=void 0!==a?a:Number.POSITIVE_INFINITY;if(c!==a){if(a>c){for(;;){k=(a=b[d--])?a.getColorValue():0;if(c>=k||!a)break;v=!0;a.rangeOutEffect=this._css;this.rangeOurEffectApplyFn.call(a,this._css)}d=v?d+2:d+1}else{for(;;){k=(a=b[d++])?a.getColorValue():0;if(c<k||!a)break;a.cssConf=a.cssConf||{};v=!0;delete a.rangeOutEffect;
a.cssConf.opacity=1;this.rangeOurEffectApplyFn.call(a,a.cssConf)}d=v?d-2:d-1}t.index=d;t.value=c}};ba("treemap",{friendlyName:"TreeMap",standaloneInit:!0,hasGradientLegend:!0,creditLabel:aa,defaultDatasetType:"treemap",applicableDSList:{treemap:!0},addData:function(){var c=this._ref.algorithmFactory,b=Array.prototype.slice.call(arguments,0);b.unshift("addData");b.unshift(this._getCleanValue());c.realTimeUpdate.apply(this,b)},removeData:function(){var c=this._ref.algorithmFactory,b=Array.prototype.slice.call(arguments,
0);b.unshift("deleteData");b.unshift(this._getCleanValue());c.realTimeUpdate.apply(this,b)},_createToolBox:function(){var c,b,d,a,k=this.components;c=k.chartMenuBar;b=k.actionBar;c&&c.drawn||b&&b.drawn||(ba.mscartesian._createToolBox.call(this),c=k.tb,b=c.getAPIInstances(c.ALIGNMENT_HORIZONTAL),d=b.Symbol,b=(k.chartMenuBar||k.actionBar).componentGroups[0],a=new d("backIcon",!1,(c.idCount=c.idCount||0,c.idCount++),c.pId),c=new d("homeIcon",!1,c.idCount++,c.pId),b.addSymbol(c,!0),b.addSymbol(a,!0),
k.toolbarBtns={back:a,home:c})},_getCleanValue:function(){var c=this.components.numberFormatter;return function(b){return c.getCleanValue(b)}},_createDatasets:function(){var c=this.components,b=this.jsonData,d=b.dataset,d=b.data||d&&d[0].data,a=this.defaultDatasetType,k=[];d&&d.length||this.setChartMessage();ra(d,function(a){a.vline||k.push(a)});b={data:k};this.config.categories=k;c=c.dataset||(c.dataset=[]);d?a&&(d=FusionCharts.get("component",["dataset",a]))&&(c[0]?(c[0].JSONData=k[0],c[0].configure()):
(this._dsInstance=d=new d,c.push(d),d.chart=this,d.init(b))):this.setChartMessage()},init:function(){var c={},b={},d={};this._ref={afAPI:L(c,b,d),algorithmFactory:I(c,b,d),containerManager:ha(c,b,d),treeOpt:ga};ba.guageBase.init.apply(this,arguments)}},ba.guageBase);FusionCharts.register("component",["dataset","TreeMap",{type:"treemap",pIndex:2,customConfigFn:"_createDatasets",init:function(c){this.JSONData=c.data[0];this.components={};this.conf={};this.graphics={elemStore:{rect:[],label:[],highlight:[],
hot:[],polypath:[]}};this.configure()},configure:function(){var c,b=this.chart,d=b.components,a=this.conf,b=b.jsonData.chart;a.metaTreeInf={};a.algorithm=(b.algorithm||"squarified").toLowerCase();a.horizontalPadding=y(b.horizontalpadding,5);a.horizontalPadding=0>a.horizontalPadding?0:a.horizontalPadding;a.verticalPadding=y(b.verticalpadding,5);a.verticalPadding=0>a.verticalPadding?0:a.verticalPadding;a.showParent=y(b.showparent,1);a.showChildLabels=y(b.showchildlabels,0);a.highlightParentsOnHover=
y(b.highlightparentsonhover,0);a.defaultParentBGColor=D(b.defaultparentbgcolor,void 0);a.defaultNavigationBarBGColor=D(b.defaultnavigationbarbgcolor,a.defaultParentBGColor);a.showTooltip=y(b.showtooltip,1);a.baseFontSize=y(b.basefontsize,10);a.baseFontSize=1>a.baseFontSize?1:a.baseFontSize;a.labelFontSize=y(b.labelfontsize,void 0);a.labelFontSize=1>a.labelFontSize?1:a.labelFontSize;a.baseFont=D(b.basefont,"Verdana, Sans");a.labelFont=D(b.labelfont,void 0);a.baseFontColor=D(b.basefontcolor,"#000000").replace(/^#?([a-f0-9]+)/ig,
"#$1");a.labelFontColor=D(b.labelfontcolor,void 0);a.labelFontColor&&(a.labelFontColor=a.labelFontColor.replace(/^#?([a-f0-9]+)/ig,"#$1"));a.labelFontBold=y(b.labelfontbold,0);a.labelFontItalic=y(b.labelfontitalic,0);a.plotBorderThickness=y(b.plotborderthickness,1);a.plotBorderThickness=0>a.plotBorderThickness?0:5<a.plotBorderThickness?5:a.plotBorderThickness;a.plotBorderColor=D(b.plotbordercolor,"#000000").replace(/^#?([a-f0-9]+)/ig,"#$1");a.tooltipSeparationCharacter=D(b.tooltipsepchar,",");a.plotToolText=
D(b.plottooltext,"");a.parentLabelLineHeight=y(b.parentlabellineheight,12);a.parentLabelLineHeight=0>a.parentLabelLineHeight?0:a.parentLabelLineHeight;a.labelGlow=y(b.labelglow,1);a.labelGlowIntensity=y(b.labelglowintensity,100)/100;a.labelGlowIntensity=0>a.labelGlowIntensity?0:1<a.labelGlowIntensity?1:a.labelGlowIntensity;a.labelGlowColor=D(b.labelglowcolor,"#ffffff").replace(/^#?([a-f0-9]+)/ig,"#$1");a.labelGlowRadius=y(b.labelglowradius,2);a.labelGlowRadius=0>a.labelGlowRadius?0:10<a.labelGlowRadius?
10:a.labelGlowRadius;a.btnResetChartTooltext=D(b.btnresetcharttooltext,"Back to Top");a.btnBackChartTooltext=D(b.btnbackcharttooltext,"Back to Parent");a.rangeOutBgColor=D(b.rangeoutbgcolor,"#808080").replace(/^#?([a-f0-9]+)/ig,"#$1");a.rangeOutBgAlpha=y(b.rangeoutbgalpha,100);a.rangeOutBgAlpha=1>a.rangeOutBgAlpha||100<a.rangeOutBgAlpha?100:a.rangeOutBgAlpha;c=y(b.maxdepth);a.maxDepth=void 0!==c?Z(c,1):void 0;c=a.showNavigationBar=y(b.shownavigationbar,1);a.slicingMode=D(b.slicingmode,"alternate");
a.navigationBarHeight=y(b.navigationbarheight);a.navigationBarHeightRatio=y(b.navigationbarheightratio);a.navigationBarBorderColor=D(b.navigationbarbordercolor,a.plotBorderColor).replace(/^#?([a-f0-9]+)/ig,"#$1");a.navigationBarBorderThickness=c?y(b.navigationbarborderthickness,a.plotBorderThickness):0;a.seperatorAngle=y(b.seperatorangle)*(pa/180);d.postLegendInitFn({min:0,max:100});a.isConfigured=!0},draw:function(){var c=this.conf,b=this.chart,d=b.config,a=b.components,k=d.canvasLeft,t=d.canvasRight,
v=d.canvasBottom,C=d.canvasTop,w=a.paper,z=b.jsonData.chart,f=b.graphics,P=f.trackerGroup,g,u,p,r,q,d=c.metaTreeInf,x=this.graphics.elemStore,l={},e,h,m=["fontFamily","fontSize","fontWeight","fontStyle"],B={},K,a=a.gradientLegend,J,U=b._ref,ta=U.afAPI.visibilityController,S=b.get("config","animationObj"),W=S.duration||0,ea=S.dummyObj,Q=S.animObj,fa=S.animType,n,F,S=U.containerManager,U=U.algorithmFactory,E;n=qa({},{},z,{fontFamily:"Verdana,sans",fontSize:"10px"});z=0;for(F=m.length;z<F;z++)E=m[z],
E in n&&(B[E]=n[E]);for(u in x){m=x[u];z=0;for(F=m.length;z<F;z++)(n=m[z])&&n.remove&&n.remove();m.length=0}S.remove();g=f.datasetGroup=f.datasetGroup||w.group("dataset");u=f.datalabelsGroup=(f.datalabelsGroup||w.group("datalabels").insertAfter(g)).css(B);p=f.lineHot=f.lineHot||w.group("line-hot",P);r=f.labelHighlight=f.labelHighlight||w.group("labelhighlight",u);q=f.floatLabel=f.floatLabel||w.group("labelfloat",u).insertAfter(r);c.colorRange=a.colorRange;d.effectiveWidth=t-k;d.effectiveHeight=v-
C;d.startX=k;d.startY=C;e=d.effectiveWidth/2;h=d.effectiveHeight/2;e=d.effectiveWidth/2;h=d.effectiveHeight/2;l.drawPolyPath=function(a,c){var e,b;e=(l.graphicPool(!1,"polyPathItem")||(b=w.path(g))).attr({path:a._path}).animateWith(ea,Q,{path:a.path},W,fa);e.css(c);b&&x.polypath.push(b);return e};l.drawRect=function(a,c,b,q){var d,r,m={},p={},f;for(d in a)r=a[d],0>r&&(a[d]=0,p.visibility="hidden");ka(m,a);m.x=e;m.y=h;m.height=0;m.width=0;K=l.graphicPool(!1,"plotItem")||(f=w.rect(g));K.attr(b&&(b.x||
b.y)&&b||m);K.attr(q);K.animateWith(ea,Q,a,W,fa,ta.controlPostAnimVisibility);K.css(c).toFront();K.css(p);f&&x.rect.push(f);return K};l.drawText=function(a,b,d,m,p){var f={},g,B,z=l.graphicPool(!1,"labelItem")||(g=w.text(q)),u=l.graphicPool(!1,"highlightItem")||(B=w.text(r)),J=d.textAttrs;d=d.highlightAttrs;ka(f,J);delete f.fill;f["stroke-linejoin"]="round";z.attr({x:m.x||e,y:m.y||h,fill:"#000000"}).css(J);z.attr(p);a=0>b.x||0>b.y?da:a;z.animateWith(ea,Q,{text:a,x:b.x,y:b.y},W,fa);u.attr({text:a,
x:m.x||e,y:m.y||h,stroke:c.labelGlow?"#ffffff":sa}).css(f).css(d);u.attr(p);u.animateWith(ea,Q,{x:b.x,y:b.y},W,fa);x.label.push(g);x.highlight.push(B);return{label:z,highlightMask:u}};l.drawHot=function(a,c){var b;b=a.plotItem||{};var e=a.rect,h,q,d;for(q in e)d=e[q],0>d&&(e[q]=0);b=b.tracker=w.rect(p).attr(e).attr({cursor:"pointer",fill:"rgba(255, 255, 255, 0)",stroke:"none"});for(h in c)e=c[h],b[h].apply(b,e);x.hot.push(b);return b};l.disposeItems=function(a,c){var b,e,h,q=c||"plotItem labelItem hotItem highlightItem polyPathItem pathlabelItem pathhighlightItem stackedpolyPathItem stackedpathlabelItem stackedpathhighlightItem".split(" ");
for(b=0;b<q.length;b+=1)h=q[b],(e=a[h])&&l.graphicPool(!0,h,e,a.rect),e&&e.hide(),a[h]=void 0};l.disposeChild=function(){var a,c=function(){return a.disposeItems},b=function(a,e){var h,q;c(a);for(h=0;h<(a.getChildren()||[]).length;h++)q=a.getChildren(),h=b(q[h],h);return e};return function(e){var h=e.getParent();a||(a=this,c=c());h?a.disposeChild(h):b(e,0)}}();l.graphicPool=function(){var a={};return function(c,b,e){var h=a[b];h||(h=a[b]=[]);"hotItem"!==b&&"pathhotItem"!==b||e.remove();if(c)h.push(e);
else if(c=h.splice(0,1)[0])return c.show(),c}}();l.disposeComplimentary=function(a){var c,b;c=a.getParent();var e=a.getSiblingCount("left");c&&(b=c.getChildren(),c=b.splice(e,1)[0],this.disposeChild(a),b.splice(e,0,c));this.removeLayers()};l.removeLayers=function(){var a,c,b,e;b=x.hot;e=b.length;for(a=0;a<e;a++)(c=b[a])&&c.remove();b.length=0};U.init(c.algorithm,!0,c.maxDepth);b=U.plotOnCanvas(this.JSONData,void 0,b._getCleanValue());S.init(this,d,l,void 0,b);S.draw();J=U.applyShadeFiltering({fill:c.rangeOutBgColor,
opacity:.01*c.rangeOutBgAlpha},function(a){this.plotItem&&this.plotItem.css(a)});a&&a.enabled&&(a.resetLegend(),a.clearListeners());a.notifyWhenUpdate(function(a,c){J.call(this,{start:a,end:c})},this);c.isConfigured=!1},drawTracker:function(){var c,b,d=this.chart.config.trackerConfig||[],a=d.length;for(c=0;c<a;c+=1)b=d[c],b.node[b.key]=b.callback(b.plotDetails,b.evtFns);d.length=0}}]);L=function(c,b,d){function a(a,c,b){this.node=a;this.bucket=c?new R:void 0;this.cleansingFn=b}var k,t,v,C;a.prototype.get=
function(){var a=this.order,c=this.bucket,b=this.cleansingFn;return function g(d,p){var r,q,x,l;q=["label","value","data","svalue"];if(d)for(l in r=new n(d.label,b(d.value),b(d.svalue)),x=d.data||[],0===x.length&&c&&c.addInBucket(r),r.setDepth(p),d)-1===q.indexOf(l)&&r.setMeta(l,d[l]);a&&(x=a(x));for(q=0;q<x.length;q++)l=x[q],l=g(l,p+1),r.addChild(l);return r}(this.node,0)};a.prototype.getBucket=function(){return this.bucket};a.prototype.getMaxDepth=function(){return t};k=function(a,c){function b(a){this.iterAPI=
a}var d=c&&c.exception,g,u;b.prototype.constructor=b;b.prototype.initWith=function(a){return this.iterAPI(a)};g=(new b(function(a){var c=a,b=[],x=!1;b.push(c);return{next:function(a){var c,h;if(!x){c=b.shift();if(d&&c===d&&(c=b.shift(),!c)){x=!0;return}(h=(a=void 0!==a?c.getDepth()>=a?[]:c.getChildren():c.getChildren())&&a.length||0)&&[].unshift.apply(b,a);0===b.length&&(x=!0);return c}},reset:function(){x=!1;c=a;b.length=0;b.push(c)}}})).initWith(a);u=(new b(function(a){var c=a,b=[],d=[],l=!1;b.push(c);
d.push(c);return{next:function(){var a,c,d;if(!l)return c=b.shift(),(d=(a=c.getChildren())&&a.length||0)&&[].push.apply(b,a),0===b.length&&(l=!0),c},nextBatch:function(){var a,c;if(!l)return a=d.shift(),(c=(a=a.getChildren())&&a.length||0)&&[].push.apply(d,a),0===b.length&&(l=!0),a},reset:function(){l=!1;c=a;b.length=0;b.push(c)}}})).initWith(a);return{df:g,bf:u}};C=function(){function a(){this.con={}}var c={},b;a.prototype.constructor=a;a.prototype.get=function(a){return this.con[a]};a.prototype.set=
function(a,c){this.con[a]=c};a.prototype["delete"]=function(a){return delete this.con[a]};return{getInstance:function(d){var g;return(g=c[d])?b=g:b=c[d]=new a}}}();b=function(){var a=[],c,b=!1,d={visibility:"visible"};return{controlPreAnimVisibility:function(d,u){var p,r,q;if(d){for(r=d;;){r=r.getParent();if(!r)break;p=r}p=k(p,{exception:d});for(p=p.df;;){r=p.next();if(!r)break;q=r.overAttr||(r.overAttr={});q.visibility="hidden";a.push(r)}c=u||d.getParent();b=!1;return a}},displayAll:function(d){var u;
if(d){d=k(d.getParent()||d);for(d=d.df;;){u=d.next();if(!u)break;u=u.overAttr||(u.overAttr={});u.visibility="visible"}c=void 0;a.length=0;b=!1}},controlPostAnimVisibility:function(){var g,u;if(!b&&(b=!0,c)){u=k(c);for(u=u.df;;){g=u.next(t);if(!g)break;if(g=g.dirtyNode)g&&g.plotItem.attr(d),(g=g&&g.textItem)&&g.label&&g.label.attr(d),g&&g.label&&g.highlightMask.attr(d)}c=void 0;a.length=0}}}}();c.AbstractTreeMaker=a;c.iterator=k;c.initConfigurationForlabel=function(a,c,b){var d=a.x,g=a.y,u=c/2,p=b.showParent?
0:1,r=b.showChildLabels;return function(a,x,l,e){l=!1;var h={x:void 0,y:void 0,width:void 0,height:void 0},m={},B=0,K={},J={},w,K=a.meta;if(a)return a.isLeaf(t)||(l=!0),m.label=a.getLabel(),h.width=x.width-2*d,h.x=x.x+x.width/2,a=x.height-2*g,!l&&a<c&&(h.height=-1),!e&&l?(h.height=r?h.height?h.height:x.height-2*g:-1,h.y=x.y+x.height/2):p?(h.y=-1,c=g=0,w="hidden"):(h.height=h.height?h.height:c,h.y=x.y+g+u),B+=2*g,B+=c,m.rectShiftY=B,m.textRect=h,b.labelGlow?(J["stroke-width"]=b.labelGlowRadius,J.opacity=
b.labelGlowIntensity,J.stroke=b.labelGlowColor,J.visibility="hidden"===w?"hidden":"visible"):J.visibility="hidden",K={fill:K&&K.fontcolor&&X(K.fontcolor)||b.labelFontColor||b.baseFontColor,visibility:w},{conf:m,attr:K,highlight:J}}};c.context=C;c.mapColorManager=function(a,c,b){var d=X(b?a.defaultNavigationBarBGColor:a.defaultParentBGColor);return function(b,f,p){f={};var r=b.cssConf,q=b.meta,q=q.fillcolor?X(q.fillcolor):void 0,x=b.getParent(),l;l=b.getColorValue();a.isLegendEnabled=!0;l=a.isLegendEnabled&&
l===l?c.getColorByValue(l)&&"#"+c.getColorByValue(l)||X(c.rangeOutsideColor):void 0;b.isLeaf(t)?f.fill=q||l||d:(b=(b=(x?x:b).cssConf)&&b.fill,f.fill=q||(l?l:b));f.stroke=p?a.navigationBarBorderColor:a.plotBorderColor;f.strokeWidth=p?a.navigationBarBorderThickness:a.plotBorderThickness;f["stroke-dasharray"]="none";!p&&r&&"--"===r["stroke-dasharray"]&&(f["stroke-dasharray"]=r["stroke-dasharray"],f.strokeWidth=r.strokeWidth);return f}};c.abstractEventRegisterer=function(a,b,f,k){function g(a){var c=
{},b,d;for(b in U)d=U[b],c[d]=a[b];return c}var u=b.chart,p=u.components,r=p.toolbarBtns,q=u.chartInstance,x=b.conf,l=p.gradientLegend,e=a.drawTree,h=k.disposeChild,m,B=arguments,K,J,U={colorValue:"svalue",label:"name",value:"value",rect:"metrics"};K=c.context.getInstance("ClickedState");u._intSR={};u._intSR.backToParent=m=function(a){var b=this,d=b,r=d&&b.getParent(),l=c.context.getInstance("ClickedState").get("VisibileRoot")||{};a?A("beforedrillup",{node:b,withoutHead:!x.showParent},q,void 0,function(){r&&
(l.state="drillup",l.node=[{virginNode:c.getVisibleRoot()},r],h(d),e.apply(r,B));A("drillup",{node:b,withoutHead:!x.showParent,drillUp:m,drillUpToTop:J},q);b=b&&b.getParent()},function(){A("drillupcancelled",{node:b,withoutHead:!x.showParent},q)}):(r&&(l.state="drillup",l.node=[{virginNode:c.getVisibleRoot()},r],h(d),e.apply(r,B)),b=b&&b.getParent())};u._intSR.resetTree=J=function(a){for(var b=this,d=b&&b.getParent(),r,l=c.context.getInstance("ClickedState").get("VisibileRoot")||{};d;)r=d,d=d.getParent();
a?A("beforedrillup",{node:b,withoutHead:!x.showParent},q,void 0,function(){r&&(l.state="drillup",l.node=[{virginNode:c.getVisibleRoot()},r],h(r),e.apply(r,B),A("drillup",{node:b,sender:u.fusionCharts,withoutHead:!x.showParent,drillUp:m,drillUpToTop:J},q))},function(){A("drillupcancelled",{node:b,withoutHead:!x.showParent},q)}):r&&(l.state="drillup",l.node=[{virginNode:c.getVisibleRoot()},r],h(r),e.apply(r,B))};return{click:function(b,c){var e=b.virginNode,p,B,f;A("dataplotclick",g(b.virginNode),q);
if(B=e.getParent()){if(e===c)f=B,p="drillup";else{if(e.next)f=e;else if(f=B,c===f){p=void 0;return}p="drilldown"}l&&l.enabled&&l.resetLegend();a.applyShadeFiltering.reset();p&&A("before"+p,{node:f,withoutHead:!x.showParent},q,void 0,function(){K.set("VisibileRoot",{node:b,state:p});h.call(k,f);v=f;d.draw();A(p,{node:f,withoutHead:!x.showParent,drillUp:m,drillUpToTop:J},q)},function(){A(p+"cancelled",{node:f,withoutHead:!x.showParent},q)});r.back&&r.back.attachEventHandlers({click:m.bind(f)});r.home&&
r.home.attachEventHandlers({click:J.bind(f)})}},mouseover:function(a){var b=g(a.virginNode);A("dataplotrollover",b,q,void 0,void 0,function(){A("dataplotrollovercancelled",b,q)})},mouseout:function(a){var b=g(a.virginNode);A("dataplotrollout",g(a.virginNode),q,void 0,void 0,function(){A("dataplotrolloutcancelled",b,q)})}}};c.setMaxDepth=function(a){return t=a};c.getVisibleRoot=function(){return v};c.setVisibleRoot=function(a){v=a};c.visibilityController=b;return c};I=function(c,b){function d(){n.apply(this,
arguments)}function a(a,b,q){z=new d(a,P,b);a=z.get();!1!==q&&(f=a);c.setVisibleRoot(a);return a}function k(){var a=v[w],d;b.realTimeUpdate=t.apply(this,arguments);d=Array.prototype.slice.call(arguments,0);d.unshift(a);a.drawTree.apply(c.getVisibleRoot(),d)}function t(){var a,b,c=v[w];b=Array.prototype.slice.call(arguments,0);b.unshift(c);a=b.slice(-1)[0];return function(){var d=Array.prototype.slice.call(arguments,0),l=d.shift(),e=d.shift();ga(f,function(a){c.drawTree.apply(a||f,b)},a,l)[e].apply(this,
d)}}var v,n=c.AbstractTreeMaker,w,z,f,P,g,u;v={sliceanddice:{areaBaseCalculator:function(a,b){return function(c,d,l){var e,h,m={},B,f,g,k=e=0;if(c){l&&(e=l.textMargin||e);k=e;l=c.getParent();e=c.getSibling("left");if(l){h=l.getValue();g=l.rect;B=g.height-2*b-k;f=g.width-2*a;m.effectiveRect={height:B,width:f,x:g.x+a,y:g.y+b+k};m.effectiveArea=B*f;m.ratio=c.getValue()/h;if(e)return d.call(c,m,e,l);m.lastIsParent=!0;return d.call(c,m,l)}return null}}},applyShadeFiltering:function(a,b,c){a.setRangeOutEffect(b,
c);this.applyShadeFiltering.reset=function(){a.resetPointers()};return function(b){a.moveLowerShadePointer(b.start);a.moveHigherShadePointer(b.end)}},alternateModeManager:function(){return function(a,b){var c,d,l,e,h,m=a.effectiveArea*a.ratio;d=a.effectiveRect;var f=b.rect;a.lastIsParent?(e=d.x,h=d.y,c=d.height,d=d.width,l=this.isDirectionVertical=!0):(c=d.height+d.y-(f.height+f.y),d=d.width+d.x-(f.width+f.x),l=this.isDirectionVertical=!b.isDirectionVertical);l?(d=m/c,e=void 0!==e?e:f.x,h=void 0!==
h?h:f.y+f.height):(c=m/d,e=void 0!==e?e:f.x+f.width,h=void 0!==h?h:f.y);return{height:c,width:d,x:e,y:h}}},horizontalVerticalManager:function(a){var b="vertical"===a?!0:!1;return function(a,c,d){var e,h,m,f=a.effectiveArea*a.ratio,p=a.effectiveRect,g=c.rect;a.lastIsParent?(h=p.x,m=p.y,a=p.height,e=p.width,c=this.isDirectionVertical=!c.isDirectionVertical):(a=p.height+p.y-(g.height+g.y),e=p.width+p.x-(g.width+g.x),c=this.isDirectionVertical=!d.isDirectionVertical);(c=b?c:!c)?(0===a&&(a=p.height,h=
void 0!==h?h:g.x+g.width,m=void 0!==m?m:g.y),e=f/a,h=void 0!==h?h:g.x,m=void 0!==m?m:g.y+g.height):(0===e&&(e=p.width,h=void 0!==h?h:g.x,m=void 0!==m?m:g.y+g.height),a=f/e,h=void 0!==h?h:g.x+g.width,m=void 0!==m?m:g.y);return{height:a,width:e,x:h,y:m}}},drawTree:function(a,b,d,f){var l=b.chart,e=l.getJobList(),h=l.components,m=l.config||(l.config={}),B=m.trackerConfig||(m.trackerConfig=[]),m=h.dataset[0],k=h.numberFormatter,h=h.toolbarBtns,z=f.drawRect,w=f.drawText,v=f.drawHot,t=d.horizontalPadding,
n=d.verticalPadding,P=b.chart.linkedItems.smartLabel,Q=c.iterator,C=Q(this).df,y,F=a.areaBaseCalculator(t,n),E=b.conf,D=E.highlightParentsOnHover,H,A=c.context,t=c.visibilityController,V=c.mapColorManager(E,b.conf.colorRange),n=c.abstractEventRegisterer.apply(c,arguments),M=n.click,T=n.mouseover,L=n.mouseout,n=E.slicingMode,N=a["alternate"===n?"alternateModeManager":"horizontalVerticalManager"](n),n=l._intSR;e.trackerDrawID.push(na.addJob(m.drawTracker,m,[],G.priorityList.tracker));e=A.getInstance("ClickedState").get("VisibileRoot")||
{};(m=e.node)&&e.state&&("drillup"===e.state.toLowerCase()?m instanceof Array?t.controlPreAnimVisibility(m[0].virginNode,m[1]):t.controlPreAnimVisibility(m.virginNode):t.displayAll(e.node.virginNode));H=c.initConfigurationForlabel({x:5,y:5},E.parentLabelLineHeight,E);for(e=y=C.next(u=c.setMaxDepth(this.getDepth()+g));e.getParent();)e=e.getParent();E.showNavigationBar?(h.home.hide(),h.back.hide()):e!=y?(h.home.show(),h.back.show()):(h.home.hide(),h.back.hide());P.useEllipsesOnOverflow(l.config.useEllipsesWhenOverflow);
P.setStyle(E._setStyle={fontSize:(E.labelFontSize||E.baseFontSize)+"px",fontFamily:E.labelFont||E.baseFont,lineHeight:1.2*(E.labelFontSize||E.baseFontSize)+"px"});l=n.backToParent;e=n.resetTree;h.back&&h.back.attachEventHandlers({click:l.bind(y)});h.home&&h.home.attachEventHandlers({click:e.bind(y)});(function va(a,b){var c,d,e,h,m,l,r,g;l={};var p,q,n={},t={};r={};var Q="",S,W;a&&(S=k.yAxis(a.getValue()),W=k.sYAxis(a.getColorValue()),a.setPath(),c=a.rect||{},d=a.textRect||{},e=a.rect={},r=a.textRect=
{},e.width=b.width,e.height=b.height,e.x=b.x,e.y=b.y,r=V(a),(q=a.plotItem)&&f.graphicPool(!0,"plotItem",q,c),q=a.plotItem=z(e,r,c,a.overAttr),a.cssConf=r,g=H(a,e),h=g.conf,l.textMargin=h.rectShiftY,r=a.textRect=h.textRect,p=P.getSmartText(h.label,r.width,r.height).text,a.plotItem=q,(h=a.labelItem)?(m=a.highlightItem,f.graphicPool(!0,"labelItem",h,c),f.graphicPool(!0,"highlightItem",m,c)):d=d||{},d=w(p,r,{textAttrs:g.attr,highlightAttrs:g.highlight},d,a.overAttr),a.labelItem=d.label,a.highlightItem=
d.highlightMask,n.virginNode=a,n.plotItem=q,n.textItem=d,n.virginNode.dirtyNode=n,a.getColorValue()&&(Q=E.tooltipSeparationCharacter+W),n.toolText=E.showTooltip?G.parseTooltext(E.plotToolText,[1,2,3,119,122],{label:a.getLabel(),formattedValue:S,formattedsValue:W},{value:a.getValue(),svalue:a.getColorValue()})||a.getLabel()+E.tooltipSeparationCharacter+S+Q:da,n.rect=e,t.hover=[function(){var a,b,c;c=A.getInstance("hover");b=this.virginNode;a=D&&!b.next?(a=b.getParent())?a:b:this.virginNode;c.set("element",
a);c=ca(ma(a.cssConf.fill,80),60);a.plotItem.tracker.attr({fill:c});T(this)}.bind(n),function(){var a,b;a=A.getInstance("hover").get("element");b=ca(a.cssConf.fill||"#fff",0);a.plotItem.tracker.attr({fill:b});L(this)}.bind(n)],t.tooltip=[n.toolText],t.click=[function(){M(this,y)}.bind(n)],(e=a.hotItem)&&f.graphicPool(!0,"hotItem",e,c),B.push({node:a,key:"hotItem",plotDetails:n,evtFns:t,callback:v}),c=C.next(u),l=F(c,N,l),va(c,l))})(y,d)}},squarified:{orderNodes:function(){return this.sort(function(a,
b){return parseFloat(a.value,10)<parseFloat(b.value,10)?1:-1})},areaBaseCalculator:function(a,b){return function(c,d,l){var e={},h,m=h=0,f,g;if(c&&0!==c.length)return l&&(h=l.textMargin||h),m=h,f=c[0],(c=f.getParent())?(g=c.rect,l=g.height-2*b-m,h=g.width-2*a,e.effectiveRect={height:l,width:h,x:g.x+a,y:g.y+b+m},e.effectiveArea=l*h,d.call(f,e,c)):null}},layoutManager:function(){function a(b,c){this.totalValue=c;this._rHeight=b.height;this._rWidth=b.width;this._rx=b.x;this._ry=b.y;this._rTotalArea=
b.height*b.width;this.nodes=[];this._prevAR=void 0;this._rHeight<this._rWidth&&(this._hSegmented=!0)}a.prototype.constructor=a;a.prototype.addNode=function(a){var b=this._rTotalArea,c,d,e,h,m,f,g,p=this._hSegmented,k=this._rx,n=this._ry,z,u,t,w,v=0;this.nodes.push(a);e=0;for(d=this.nodes.length;e<d;e++)v+=parseFloat(this.nodes[e].getValue(),10);c=v/this.totalValue*b;p?(b=this._rHeight,d=c/b,z=k+d,u=n,t=this._rHeight,w=this._rWidth-d):(d=this._rWidth,b=c/d,z=k,u=n+b,t=this._rHeight-b,w=this._rWidth);
e=0;for(h=this.nodes.length;e<h;e++)a=this.nodes[e],m=a.getValue(),f=m/v*c,a.hRect=a.rect||{},a._hRect=a._rect||{},m=a.rect={},p?(m.width=g=d,m.height=g=f/g,m.x=k,m.y=n,n+=g):(m.height=g=b,m.width=g=f/g,m.x=k,m.y=n,k+=g),f=Z(m.height,m.width),m=ja(m.height,m.width),a.aspectRatio=f/m;if(1<this.nodes.length){if(this.prevAR<a.aspectRatio){this.nodes.pop().rect={};e=0;for(d=this.nodes.length;e<d;e++)this.nodes[e].rect=1===d&&this.nodes[e].firstPassed?this.nodes[e]._hRect:this.nodes[e].hRect,p=this.nodes[e]._rect=
{},k=this.nodes[e].rect,p.width=k.width,p.height=k.height,p.x=k.x,p.y=k.y;return!1}}else a&&(p=a._rect={},k=a.rect,p.width=k.width,p.height=k.height,p.x=k.x,p.y=k.y,a.firstPassed=!0);this.prevAR=a.aspectRatio;this.height=b;this.width=d;this.getNextLogicalDivision=function(){return{height:t,width:w,x:z,y:u}};return a};return{RowLayout:a}}(),applyShadeFiltering:function(a,b,c){a.setRangeOutEffect(b,c);this.applyShadeFiltering.reset=function(){a.resetPointers()};return function(b){a.moveLowerShadePointer(b.start);
a.moveHigherShadePointer(b.end)}},drawTree:function(a,b,d,f){var l=b.chart,e=l.getJobList(),h=l.config||(l.config={}),m=h.trackerConfig||(h.trackerConfig=[]),k=l.components,h=k.dataset[0],n=k.numberFormatter,k=k.toolbarBtns,z=a.areaBaseCalculator(d.horizontalPadding,d.verticalPadding),t=a.layoutManager.RowLayout,w=b.chart.linkedItems.smartLabel,v=f.drawRect,P=f.drawText,y=f.drawHot,C=c.iterator,A=C(this).bf,D,F=b.conf,E=F.highlightParentsOnHover,L,H=c.context,ua=c.mapColorManager(F,b.conf.colorRange),
C=c.abstractEventRegisterer.apply(c,arguments),V=C.click,M=C.mouseover,T=C.mouseout,C=l._intSR,I=c.visibilityController,N,O;N=H.getInstance("ClickedState").get("VisibileRoot")||{};(O=N.node)&&N.state&&("drillup"===N.state.toLowerCase()?O instanceof Array?I.controlPreAnimVisibility(O[0].virginNode,O[1]):I.controlPreAnimVisibility(O.virginNode):I.displayAll(N.node.virginNode));L=c.initConfigurationForlabel({x:5,y:5},F.parentLabelLineHeight,F);for(A=D=A.next(u=c.setMaxDepth(this.getDepth()+g));A.getParent();)A=
A.getParent();F.showNavigationBar?(k.home.hide(),k.back.hide()):A!=D?(k.home.show(),k.back.show()):(k.home.hide(),k.back.hide());w.useEllipsesOnOverflow(l.config.useEllipsesWhenOverflow);w.setStyle(F._setStyle={fontSize:(F.labelFontSize||F.baseFontSize)+"px",fontFamily:F.labelFont||F.baseFont,lineHeight:1.2*(F.labelFontSize||F.baseFontSize)+"px"});l=C.backToParent;C=C.resetTree;k.back&&k.back.attachEventHandlers({click:l.bind(D)});k.home&&k.home.attachEventHandlers({click:C.bind(D)});e.trackerDrawID.push(na.addJob(h.drawTracker,
h,[],G.priorityList.tracker));(function wa(a,b){var c,d={},e,h,g,l,k,p,r=0,q,B,C,A;p={};var Q;q={};B={};l={};var O="",I,N;if(a){I=n.yAxis(a.getValue());N=n.sYAxis(a.getColorValue());a.setPath();if(c=a.__initRect)d.x=c.x,d.y=c.y,d.width=c.width,d.height=c.height;g=a.textRect||{};c=a.rect=a.__initRect={};l=a.textRect={};c.width=b.width;c.height=b.height;c.x=b.x;c.y=b.y;l=ua(a);(C=a.plotItem)&&f.graphicPool(!0,"plotItem",C,d);C=a.plotItem=v(c,l,d,a.overAttr);a.cssConf=l;Q=L(a,c);e=Q.conf;p.textMargin=
e.rectShiftY;l=a.textRect=e.textRect;A=w.getSmartText(e.label,l.width,l.height).text;(h=a.labelItem)?(e=a.highlightItem,f.graphicPool(!0,"labelItem",h,d),f.graphicPool(!0,"highlightItem",e,d)):g=g||{};g=P(A,l,{textAttrs:Q.attr,highlightAttrs:Q.highlight},g,a.overAttr);a.labelItem=g.label;a.highlightItem=g.highlightMask;a.plotItem=C;q.virginNode=a;q.plotItem=C;q.textItem=g;q.virginNode.dirtyNode=q;a.getColorValue()&&(O=F.tooltipSeparationCharacter+N);q.toolText=F.showTooltip?G.parseTooltext(F.plotToolText,
[1,2,3,119,122],{label:a.getLabel(),formattedValue:I,formattedsValue:N},{value:a.getValue(),svalue:a.getColorValue()})||a.getLabel()+F.tooltipSeparationCharacter+I+O:da;q.rect=c;B.hover=[function(){var a,b,c;c=H.getInstance("hover");b=this.virginNode;a=E&&!b.next?(a=b.getParent())?a:b:this.virginNode;c.set("element",a);c=a.cssConf;c=ca(c.fill&&ma(c.fill,80),60);a.plotItem.tracker.attr({fill:c});M(this)}.bind(q),function(){var a,b;a=H.getInstance("hover").get("element");b=ca(a.cssConf.fill||"#fff",
0);a.plotItem.tracker.attr({fill:b});T(this)}.bind(q)];B.tooltip=[q.toolText];B.click=[function(){V(this,D)}.bind(q)];(c=a.hotItem)&&f.graphicPool(!0,"hotItem",c,d);m.push({node:a,key:"hotItem",plotDetails:q,evtFns:B,callback:y});if(k=void 0!==u?a.getDepth()>=u?void 0:a.getChildren():a.getChildren())for(q=z(k,function(a,b){var c,d,e=0,h,f,m=[];c=new t({width:a.effectiveRect.width,height:a.effectiveRect.height,x:a.effectiveRect.x,y:a.effectiveRect.y},b.getValue());for(d=k.length;e++!==d;)h=k[e-1],
f=c.addNode(h),!1===f?(c=c.getNextLogicalDivision(),c=new t(c,b.getValue()-r),e--):(r+=parseFloat(h.getValue(),10),m.push(h));return m},p),d=0,p=q.length;d<p;d++)B=q[d],wa(B,B.rect)}})(D,d)}}};d.prototype=Object.create(n.prototype);d.prototype.constructor=n;d.prototype.order=function(a){var b=v[w],c=b.orderNodes;return c?c.apply(a,[b]):a};b.init=function(a,b,d){w=a;P=b;g=c.setMaxDepth(d);return v[w]};b.plotOnCanvas=function(b,c,d){f=a(b,d);return k};b.applyShadeFiltering=function(a,b){var c,d;d=v[w].applyShadeFiltering(z.getBucket(),
a,b);return function(a){c=Array.prototype.slice.call(arguments,0);c.unshift(a);d.apply(z.getBucket(),c)}};b.setTreeBase=function(a){return a&&(f=a)};b.realTimeUpdate=t;b.makeTree=a;return b};ga=function(c,b,d,a){function k(a){var b,d=0;b=c;if(!a.length)return c;for(;b;){b=n.call(b,a[d]);if(d===a.length-1&&b)return v=b.getValue(),b;d+=1}}function n(a){var b,c,d,k=this.getChildren()||[],g=k.length;for(b=0;b<g;b+=1)if(d=k[b],d.label.toLowerCase().trim()===a.toLowerCase().trim()){c=d;break}return c}var v;
return{deleteData:function(a,c){var n=k(a),f=(void 0).iterator(n).df,t=n&&n.getParent(),g=n&&n.getSiblingCount("left"),u=t&&t.getChildren(),p=(void 0).getVisibleRoot();if(n&&t){u.splice(g,1);for(n===p&&(p=n.getParent()||p);n;)d.disposeItems(n),n=f.next();for(;t;)t.setValue(-v,!0),t=t.getParent();c&&b(p)}},addData:function(c,d,n,f){for(var t,g,u,p=0,r=!0,q=(void 0).getVisibleRoot();c.length;)if(t=c.pop(),t=(void 0).makeTree(t,a,!1),p=t.getValue(),g=k(d||[]))for(g.getChildren()||(u=g.getValue(),r=!1),
g.addChildren(t,f);g;)g.setValue(p,r),u&&(p-=u,u=void 0,r=!0),g=g.getParent();n&&b(q)}}};ha=function(c,b,d){function a(){}function k(a){var b=f.plotBorderThickness;w.apply(c.getVisibleRoot(),[C,{width:a.effectiveWidth,height:a.effectiveHeight,x:a.startX,y:a.startY,horizontalPadding:f.horizontalPadding,verticalPadding:f.verticalPadding},A]);f.plotBorderThickness=b}function n(a,b,c){var d=a.width,g=a.height,l=f.seperatorAngle/2;a=["M",a.x,a.y];var k=y(l?g/2*(1-oa(l)):c,15);c=function(a){return{both:["h",
d,"v",a,"h",-d,"v",-a],right:["h",d,"v",a,"h",-d,"l",k,-a/2,"l",-k,-a/2],no:["h",d,"l",k,a/2,"l",-k,a/2,"h",-d,"l",k,-a/2,"l",-k,-a/2],left:["h",d,"l",k,a/2,"l",-k,a/2,"h",-d,"v",-a]}};return{path:a.concat(c(g)[b]),_path:a.concat(c(0)[b]),offset:k}}function v(){var a=Array.prototype.splice.call(arguments,0);a.push(!0);p("navigationBar").apply(this,a)}var C,w,z,f,A,g,u=function(a,b){var m,g,l=c.mapColorManager(f,f.colorRange,!0),k=function(){var a;return{get:function(b,c,d){var e={y:b.startY,height:b.effectiveHeight};
c=m[c];var h=c.getParent();e.x=a||(a=b.startX);a=d?a+(e.width=b.effectiveWidth*(c.getValue()/h.getValue())):a+(e.width=b.effectiveWidth/g);return e},resetAllocation:function(){a=void 0}}}(),p=c.initConfigurationForlabel({x:5,y:5},f.parentLabelLineHeight,f),q=A.drawPolyPath,u=A.drawText,v=A.drawHot,w={navigationHistory:{path:"polyPathItem",label:"pathlabelItem",highlightItem:"pathhighlightItem",hotItem:"pathhotItem"}},y=C.chart,D=y.config.trackerConfig,I=y.components.gradientLegend,y=y.linkedItems.smartLabel,
F=function(a){return function(){var b=c.context.getInstance("ClickedState").get("VisibileRoot")||{};b.state="drillup";b.node=[{virginNode:c.getVisibleRoot()},a];I&&I.enabled&&I.resetLegend();d.draw([a,a,a])}},E=function(){return function(){}},L=function(){return function(){}},H,G,V,M,T,R,N=f._setStyle,O;H=r.get().navigationBar;M=2*x("navigationBar");N=ja(H*z.effectiveHeight-(M+6),N.fontSize.replace(/\D+/g,""));H=N+"px";w.stacked={path:"stacked"+w.navigationHistory.path,label:"stacked"+w.navigationHistory.label,
highlightItem:"stacked"+w.navigationHistory.highlightItem,hotItem:"stacked"+w.navigationHistory.hotItem};k.resetAllocation();(function(a){var b=c.getVisibleRoot();m=a?b.getChildren():b.getPath()||[].concat(b);m.pop();g=m.length})(b);y.setStyle({fontSize:H,lineHeight:H});for(H=0;H<g;H+=1)M=m[H],T=k.get(a,H,b),G=(V=n(T,b?"both":1===g?"both":0===H?"left":H<g-1?"no":"right")).offset,M[w[b?"stacked":"navigationHistory"].path]=q(V,l(M,!0,!0),H),V=p(M,T,!1,!0),R=V.conf,O=R.textRect,O.width-=2*G,O.y=T.y+
T.height/2,G=y.getSmartText(R.label,O.width,Z(N,O.height)).text,G=u(G,O,{textAttrs:V.attr,highlightAttrs:V.highlight},{y:T.height/10,"font-size":f._setStyle.fontSize,"font-family":f._setStyle.fontFamily},(b?"stacked":"")+"path"),M[w[b?"stacked":"navigationHistory"].label]=G.label,M[w[b?"stacked":"navigationHistory"].highlightItem]=G.highlightMask,D.push({node:M,key:w[b?"stacked":"navigationHistory"].hotItem,plotDetails:{rect:T},evtFns:{click:[F(M,b)],hover:[E(M),L()],tooltip:[f.showTooltip?M.getLabel():
da]},callback:v})},p=function(a){return{treeMap:k,navigationBar:u,stackedNavigation:v}[a]},r=function(){var a={treeMap:1,navigationBar:0,stackedNavigation:0};return{set:function(b){var c=y(f.navigationBarHeightRatio,f.navigationBarHeight/z.effectiveHeight,.15),d=f.labelFontSize?Z(f.labelFontSize,f.baseFontSize):f.baseFontSize,g=2*x("navigationBar"),c=Z((6+d+g)/z.effectiveHeight,c);.1>c?c=.1:.15<c&&(c=.15);f.navigationBarHeightRatio=c;a=b?{treeMap:1-c,navigationBar:c,stackedNavigation:0}:{treeMap:1,
navigationBar:0,stackedNavigation:0}},get:function(){return a}}}(),q=0,x=function(a){var b=f.plotBorderThickness,c=f.navigationBarBorderThickness;return f.verticalPadding+("navigationBar"===a?c:b)},l=function(a){var b=z.effectiveWidth,c=z.effectiveHeight,d=x(a);a=r.get()[a];1<=q&&(q=0);q+=a;return{effectiveHeight:ia(a*c*100)/100-d,effectiveWidth:b,startX:z.startX,startY:z.startY+d+ia((q-a)*c*100)/100}};a.prototype.constructor=a;a.prototype.init=function(a,b){(this.conf||(this.conf={})).name=a.name;
this.setDrawingArea(a.drawingAreaMeasurement);this.draw=this.draw(b)};a.prototype.setDrawingArea=function(a){this.conf.drawingAreaMeasurement=a};a.prototype.draw=function(a){return function(){var b=this.conf;0<b.drawingAreaMeasurement.effectiveHeight&&a(b.drawingAreaMeasurement)}};a.prototype.eventCallback=function(){};g=function(){var b=[];return{get:function(){return b},set:function(c){var d;c?(d=new a,d.init({name:c.type,drawingAreaMeasurement:c.drawingArea},c.drawFn),b.push(d)):b.length=0;return b}}}();
d.init=function(){var a,b=["navigationBar","treeMap","stackedNavigation"];a=Array.prototype.slice.call(arguments,0);C=a[0];z=a[1];f=C.conf;A=a[2];w=a[4];for(g.get().length>=b.length&&g.set();b.length;)a=b.shift(),g.set({type:a,drawFn:p(a),drawingArea:l(a)})};d.draw=function(a){var b,k,n;b=c.getVisibleRoot();A.disposeChild(b);a&&(b=a[1]);b.getParent()?f.showNavigationBar&&d.heightProportion.set(!0):d.heightProportion.set(!1);k=g.get();for(b=0;b<k.length;b+=1)n=k[b],n.setDrawingArea(l(n.conf.name)),
a&&c.setVisibleRoot(a[b]),n.draw()};d.heightProportion=r;d.remove=function(){var a=c.getVisibleRoot();a&&A.disposeChild(a)};return d}}]);I&&(L.FusionCharts=FusionCharts);return FusionCharts});
