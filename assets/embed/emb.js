function initializeEmbed(){const e=document.querySelector(".appoinda-embed-container");if(void 0!==e){const t=e.getAttribute("data-slug");if(void 0!==t&&t.length>3){e.setAttribute("style","min-width:500px;min-height:400px;border:none;background:#fff;position:relative;left:0;top:0;");const i=document.createElement("div"),n=document.createElement("div");i.setAttribute("style","width:100%;height:100%;display: flex;justify-content: center;align-items: center;position:absolute;left:0;top:0;padding:0;z-index:980;background:rgba(255,255,255,0.85)"),n.setAttribute("style","width:120px;height:65px;display:block;border:none;background:none;"),n.innerHTML='<img style=\'width:100%;height:100%;border:none;padding:0;margin:0;\' src=\'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">\n  <rect x="19" y="26.5" width="12" height="47" fill="%230a69aa">\n    <animate attributeName="y" repeatCount="indefinite" dur="0.625s" calcMode="spline" keyTimes="0;0.5;1" values="14.75;26.5;26.5" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.125s"></animate>\n    <animate attributeName="height" repeatCount="indefinite" dur="0.625s" calcMode="spline" keyTimes="0;0.5;1" values="70.5;47;47" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.125s"></animate>\n  </rect>\n  <rect x="44" y="26.5" width="12" height="47" fill="%2307abcc">\n    <animate attributeName="y" repeatCount="indefinite" dur="0.625s" calcMode="spline" keyTimes="0;0.5;1" values="17.6875;26.5;26.5" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.0625s"></animate>\n    <animate attributeName="height" repeatCount="indefinite" dur="0.625s" calcMode="spline" keyTimes="0;0.5;1" values="64.625;47;47" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.0625s"></animate>\n  </rect>\n  <rect x="69" y="26.5" width="12" height="47" fill="%2391bcc6">\n    <animate attributeName="y" repeatCount="indefinite" dur="0.625s" calcMode="spline" keyTimes="0;0.5;1" values="17.6875;26.5;26.5" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate>\n    <animate attributeName="height" repeatCount="indefinite" dur="0.625s" calcMode="spline" keyTimes="0;0.5;1" values="64.625;47;47" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate>\n  </rect>\n  </svg>\' />',i.appendChild(n),e.appendChild(i);const a=document.createElement("iframe");a.src="https://ntest.appoinda.com/"+t+"/booking?embed=true",a.style="position:absolute;left:0;top:0;z-index:910",a.width="100%",a.height="100%",a.frameBorder=0,a.setAttribute("data-isloaded","0"),e.appendChild(a),window.j=0,window.addEventListener("message",function(e){"1"==e.data&&(a.setAttribute("data-isloaded","1"),$("#myiframe").prop("data-isloaded","1"))},!1),window.k=window.setInterval(function(){if(window.j>30)e.removeChild(i),void 0!==window.k&&clearInterval(window.k);else{const t=a.getAttribute("data-isloaded");void 0!==t&&1==parseInt(t)&&(e.removeChild(i),clearInterval(window.k))}window.j+=1},200)}else console.log("Appoinda: error in embed code")}else console.log("Appoinda: cant access embed container")}window.onload=function(){initializeEmbed()};
