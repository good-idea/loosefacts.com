<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="//use.typekit.net/jbc8ggl.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
	<?php echo css('assets/css/main.css') ?>
	<link rel="icon" href="/assets/images/favicon.ico">

  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

	<?php if (strlen($pages->find('home')->background()) && null !== $pages->find('home')->images()->find($pages->find('home')->background())) {
		$background = $pages->find('home')->images()->find($pages->find('home')->background())->url();
	} else {
		$background = "";
		} ?>
		
  <script type="text/javascript" id="squeezr" data-breakpoints-images="500,760,960,1024,1440,2000">(function(a){function h(){for(var f,a=0,b=d.cookie.split(";"),c=/^\ssqueezr\.([^=]+)=(.*?)\s*$/,e={};b.length>a;++a)(f=b[a].match(c))&&(e[f[1]]=f[2]);return e}function i(a){a=Math.max(parseFloat(a||1,10),.01);var c=d.documentElement,f=function(){var a=d.createElement("div"),b={width:"1px",height:"1px",display:"inline-block"};for(var c in b)a.style[c]=b[c];return a},g=d.createElement("div"),h=g.appendChild(f());g.appendChild(f()),c.appendChild(g);for(var i=g.clientHeight,j=Math.floor(e/i),k=j/2,l=0,m=[j];1e3>l++&&(Math.abs(k)>a||g.clientHeight>i);)j+=k,h.style.width=j+"em",k/=(g.clientHeight>i?1:-1)*(k>0?-2:2),m.push(j);return c.removeChild(g),j}function j(a){for(var g,c=0,d=(a||"").split(","),e=/(\d+(?:\.\d+)?)(px)?/i,f=[];d.length>c;++c)(g=d[c].match(e))&&f.push(parseFloat(g[1],10));return f.sort(function(a,b){return a-b})}function k(){return"devicePixelRatio"in a?a.devicePixelRatio:"deviceXDPI"in a&&"logicalXDPI"in a?a.deviceXDPI/a.logicalXDPI:1}if(navigator.cookieEnabled)for(var b="squeezr",c=";path=/",d=document,e=a.innerWidth,f=screen.width,g=screen.height,m=0,n=d.getElementsByTagName("script");n.length>m;++m)if(n[m].id==b){var o=k(),p="-";if(d.cookie=b+".screen="+f+"x"+g+"@"+o+c,!n[m].getAttribute("data-disable-images")){var q=j(n[m].getAttribute("data-breakpoints-images")),r=Math.max(f,g),s=null;do{if(r>(s=q.pop()))break;p=s*o+"px"}while(q.length)}d.cookie=b+".images="+p+c;var t=h(),u=t.css||"-";if(!("css"in t&&t.css&&"-"!=t.css||n[m].getAttribute("data-disable-css"))){var v=e/i(parseFloat(n[m].getAttribute("data-em-precision")||.5,10)/100);u=f+"x"+g+"@"+Math.round(10*v)/10}d.cookie=b+".css="+u+c;break}})(this);</script>
	<style>
	 body, .mobile-ex { background-image:url("<?= $background ?>");}
	</style>

