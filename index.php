<!doctype html>
<html id=html lang=en>
<head id=head>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1.0">
	<script src=basis.js></script>
	<link rel=stylesheet href=basis.css>
	<style>
	  body { background: #222; text-align: center; font-size: 11px; }
		table { width: auto; }
		.targets { display: inline-block; width: auto; margin: 0 auto; background: #ddd; padding: 20px; }
		.target { background: #eee; border: 1px solid #222; padding: 20px; }
		.target th, .target td { border: 1px solid #000; background: #fff; margin: 5px 0; padding: 0 0 0 10px; }
		.target th { min-width: 150px; text-align: right; padding: 0 10px 0 0; }
		.target tr.legend th { width: 20px; max-width: 20px; min-width: 20px; overflow: hidden; height: 180px; text-align: right; }
		.target tr.legend th p { writing-mode:tb-rl; -webkit-transform: translateX(5px) translateY(150px) rotate(-90deg); -moz-transform: translateX(5px) translateY(150px) rotate(-90deg); -o-transform: translateX(5px) translateY(150px) rotate(-90deg);  }
		.target td { height: 20px; transition: 0.25s; }
		.target td.active { background: #7ADB59; }
		.target td.bubble { background: #7CC2FF; }
		th div { font-weight: normal; display: inline-block; vertical-align: top; }
		th div * { display: inline-block; max-width: 150px; background: #FFF7A5; margin: 0; }
		.audio { display: block; height: 40px; }
		.br, .noscript, .wbr, .param { display: none; }
		.canvas canvas { background: #ddd; }
		
	</style>
  <title id=title>Events</title>
</head>
<body id=body>
	<div class=targets>
		<div class=target>
			<table>
			
			<?php
					// Matrix data
					$targetnames = array("window", "document", "html", "head", "title", "body", "a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bb", "bdi", "bdo", "blockquote", "br", "button", "canvas", "caption", "cite", "code", "col", "colgroup", "command", "data", "datagrid", "datalist", "dd", "del", "details", "dfn", "div", "dl", "dt", "em", "embed", "eventsource", "fieldset", "figcaption", "figure", "footer", "form", "h1", "h2", "h3", "h4", "h5", "h6", "header", "hgroup", "hr", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label", "legend", "li", "link", "mark", "map", "menu", "meta", "meter", "nav", "noscript", "object", "ol", "optgroup", "option", "output", "p", "param", "pre", "progress", "q", "ruby", "rp", "rt", "s", "samp", "script", "section", "select", "small", "source", "span", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th", "thead", "time", "tr", "track", "u", "ul", "var", "video", "wbr");
					$targetdemos = array("", "", "", "", "", "", "<a href=# id=a>anchor</a>", "<abbr id=abbr title=abbreviation>abbr.</abbr>", "<address id=address>address</address>", "<area id=area>area</area>", "<article id=article>article</article>", "<aside id=aside>aside</aside>", "<audio controls id=audio>audio</audio>", "<b id=b>bold</b>", "<base id=base>base</base>", "<bb id=bb>bb</bb>", "<bdi id=bdi>bdi</bdi>", "<bdo id=bdo>bdo</bdo>", "<blockquote id=blockquote>blockquote</blockquote>", "<br id=br>", "<button id=button>button</button>", "<canvas id=canvas width=100 height=10>canvas</canvas>", "<table><caption id=caption>caption</caption></table>", "<cite id=cite>cite</cite>", "<code id=code>code</code>", "<table><col id=col width=50 height=10></col></table>", "<table><colgroup id=colgroup width=50 height=10></colgroup></table>", "<menu><command type=checkbox id=command label=command></command></menu>", "<data id=data>data</data>", "<datagrid id=datagrid>datagrid</datagrid>", "<datalist id=datalist>datalist</datalist>", "<dd id=dd>dd</dd>", "<del id=del>del</del>", "<details id=details>details</details>", "<dfn id=dfn>dfn</dfn>", "<div id=div>div</div>", "<dl id=dl>dl</dl>", "<dt id=dt>dt</dt>", "<em id=em>em</em>", "<embed id=embed width=50 height=10>embed</embed>", "<eventsource id=eventsource>eventsource</eventsource>", "<fieldset id=fieldset>fieldset</fieldset>", "<figcaption id=figcaption>figcaption</figcaption>", "<figure id=figure>figure</figure>", "<footer id=footer>footer</footer>", "<form id=form>form</form>", "<h1 id=h1>h1</h1>", "<h2 id=h2>h2</h2>", "<h3 id=h3>h3</h3>", "<h4 id=h4>h4</h4>", "<h5 id=h5>h5</h5>", "<h6 id=h6>h6</h6>", "<header id=header>header</header>", "<hgroup id=hgroup>hgroup</hgroup>", "<hr id=hr>", "<i id=i>italic</i>", "<iframe id=iframe width=50 height=10></iframe>", "<img id=img src=//placehold.it/50x10>", "<input id=input value=input>", "<ins id=ins>ins</ind>", "<kbd id=kbd>kbd</kbd>", "<keygen id=keygen></keygen>", "<label id=label>label</label>", "<legend id=legend>legend</legend>", "<li id=li>li</li>", "<link id=link style='display:inline-block;width:50px'>", "<mark id=mark>mark</mark>", "<map id=map>map</map>", "<menu id=menu>menu</menu>", "<meta id=meta>", "<meter id=meter>meter</meter>", "<nav id=nav>nav</nav>", "<noscript id=noscript>noscript</noscript>", "<object id=object>object</object>", "<ol id=ol>ol</ol>", "<select><optgroup id=optgroup value=optgroup><option>optgroup</option></optgroup></select>", "<select><option id=option value=option>option</option></select>", "<output id=output>output</output>", "<p id=p>p</p>", "<param id=param>param</param>", "<pre id=pre>pre</pre>", "<progress id=progress></progress>", "<q id=q>q</q>", "<ruby id=ruby>ruby</ruby>", "<rp id=rp>rp</rp>", "<rt id=rt>rt</rt>", "<s id=s>s</s>", "<samp id=samp>samp</samp>", "<script id=script style='display: inline'>//script</script>", "<section id=section>section</section>", "<select id=select></select>", "<small id=small>small</small>", "<source id=source>source</source>", "<span id=span>span</span>", "<strong id=strong>strong</strong>", "<style id=style style='display: inline'>/* style */</style>", "<sub id=sub>sub</sub>", "<summary id=summary>summary</summary>", "<sup id=sup>sup</sup>", "<table id=table><tr><td>table</table>", "<table><tbody id=tbody>tbody</tbody></table>", "<table><tr><td id=td>td</td></table>", "<textarea id=textarea>textarea</textarea>", "<table><tfoot id=tfoot>tfoot</tfoot></table>", "<table><tr><th id=th>th</th></table>", "<table><thead id=thead><th>thead</th></thead></table>", "<time id=time>time</time>", "<table><tr id=tr><td>tr</td></tr></table>", "<track id=track>track</track>", "<u id=u>underlined</u>", "<ul id=ul>ul</ul>", "<var id=var>var</var>", "<video id=video width=50 height=10>video</video>", "<wbr id=wbr <idth=50>");
					$events = array("abort", "afterprint", "beforeprint", "beforeunload", "blur", "cancel", "canplay", "canplaythrough", "change", "click", "close", "contextmenu", "cuechange", "dblclick", "drag", "dragend", "dragenter", "dragexit", "dragleave", "dragover", "dragstart", "drop", "durationchange", "emptied", "ended", "error", "focus", "fullscreenchange", "fullscreenerror", "hashchange", "input", "invalid", "keydown", "keypress", "keyup", "load", "loadeddata", "loadedmetadata", "loadstart", "message", "mousedown", "mouseenter", "mouseleave", "mousemove", "mouseout", "mouseover", "mouseup", "mousewheel", "offline", "online", "pagehide", "pageshow", "pause", "play", "playing", "popstate", "progress", "ratechange", "reset", "resize", "scroll", "seeked", "seeking", "select", "show", "sort", "stalled", "storage", "submit", "suspend", "timeupdate", "unload", "volumechange", "waiting");
					
					// Show matrix
					echo("<tr class=legend><th style='text-align: center; vertical-align: middle; width: 300px; min-width: 300px;'>Red = event not supported<br>Green = direct event<br>Blue = bubbled event</th>");
					for($j = 0; $j < count($events); $j++){
						echo("<th><p>.on" . $events[$j] . "</p></th>");
					}
					echo("</tr>");

					for($i = 0; $i < count($targetnames); $i++){
						echo("<tr><th>" . $targetnames[$i] . (!empty($targetdemos[$i]) ? " &nbsp;<div class=" . $targetnames[$i] . ">(ex: " . $targetdemos[$i] . ")</div>" : "") . "</th>");
						for($j = 0; $j < count($events); $j++){
							echo("<td id=" . $targetnames[$i] . "-" . $events[$j] . "></td>");
						}
						echo("</tr>");
					}
			?>
			</table>
		</div>
	</div>
	<script>
		/* Get an element by id or an object */
		function $(target){
			if(typeof target == "string"){
				return document.getElementById(target);
			}
			return target;
		}
	
		/* Event listener */
		function on(element, event, func){
			if(element.addEventListener){
				element.addEventListener(event, func, false);
			}
			else{
				try{
					element.attachEvent("on" + event, func);
				}
				catch(e){}
			}
		}
		
		/* Event support */
		function hasEvent(element, eventName){
			eventName = 'on' + eventName;
			var isSupported = (eventName in element);
			if (!isSupported){
				if (!element.setAttribute){
					element = document.createElement('div');
				}
				if (element.setAttribute && element.removeAttribute){
					element.setAttribute(eventName, '');
					isSupported = typeof element[eventName] == 'function';
					if (typeof element[eventName] != 'undefined'){
						element[eventName] = undefined;
					}
					element.removeAttribute(eventName);
				}
			}
			element = null;
			return isSupported;
		}

		/* Blinking */
		function blink(e){
			e.className = "active";
			setTimeout(function(){
				e.className = "";
			}, 1000)
		}
		
		function blinkBubble(e){
			setTimeout(function(){
				e.className = "bubble";
			}, 500);
			setTimeout(function(){
				e.className = "";
			}, 1500)
		}
		
		/* Data */
		targets = [window, document, "html", "head", "title", "body", "a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bb", "bdi", "bdo", "blockquote", "br", "button", "canvas", "caption", "cite", "code", "col", "colgroup", "command", "data", "datagrid", "datalist", "dd", "del", "details", "dfn", "div", "dl", "dt", "em", "embed", "eventsource", "fieldset", "figcaption", "figure", "footer", "form", "h1", "h2", "h3", "h4", "h5", "h6", "header", "hgroup", "hr", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label", "legend", "li", "link", "mark", "map", "menu", "meta", "meter", "nav", "noscript", "object", "ol", "optgroup", "option", "output", "p", "param", "pre", "progress", "q", "ruby", "rp", "rt", "s", "samp", "script", "section", "select", "small", "source", "span", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th", "thead", "time", "tr", "track", "u", "ul", "var", "video", "wbr"];
		targetnames = ["window", "document", "html", "head", "title", "body", "a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bb", "bdi", "bdo", "blockquote", "br", "button", "canvas", "caption", "cite", "code", "col", "colgroup", "command", "data", "datagrid", "datalist", "dd", "del", "details", "dfn", "div", "dl", "dt", "em", "embed", "eventsource", "fieldset", "figcaption", "figure", "footer", "form", "h1", "h2", "h3", "h4", "h5", "h6", "header", "hgroup", "hr", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label", "legend", "li", "link", "mark", "map", "menu", "meta", "meter", "nav", "noscript", "object", "ol", "optgroup", "option", "output", "p", "param", "pre", "progress", "q", "ruby", "rp", "rt", "s", "samp", "script", "section", "select", "small", "source", "span", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th", "thead", "time", "tr", "track", "u", "ul", "var", "video", "wbr"];
		events = ["abort", "afterprint", "beforeprint", "beforeunload", "blur", "cancel", "canplay", "canplaythrough", "change", "click", "close", "contextmenu", "cuechange", "dblclick", "drag", "dragend", "dragenter", "dragexit", "dragleave", "dragover", "dragstart", "drop", "durationchange", "emptied", "ended", "error", "focus", "fullscreenchange", "fullscreenerror", "hashchange", "input", "invalid", "keydown", "keypress", "keyup", "load", "loadeddata", "loadedmetadata", "loadstart", "message", "mousedown", "mouseenter", "mouseleave", "mousemove", "mouseout", "mouseover", "mouseup", "mousewheel", "offline", "online", "pagehide", "pageshow", "pause", "play", "playing", "popstate", "progress", "ratechange", "reset", "resize", "scroll", "seeked", "seeking", "select", "show", "sort", "stalled", "storage", "submit", "suspend", "timeupdate", "unload", "volumechange", "waiting"];
		
		/* Listeners */
		for(i = 0; i < targets.length; i++){
			for(j = 0; j < events.length; j++){
				if(!hasEvent($(targets[i]), events[j])){
					$(targetnames[i] + "-" + events[j]).style.background = '#FF615B';
				}
				(function(target, targetname, event){
					
					on($(target), event, function(e){
						if(e.target == this || e.srcElement == this){
							blink($(targetname + "-" + event));
						}
						else{
							blinkBubble($(targetname + "-" + event));
						}
					});
				})(targets[i], targetnames[i], events[j]);
			}
		}
		
	</script>
</body>
</html>