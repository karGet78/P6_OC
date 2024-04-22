{function debounce(t,i,e){var s;return function(){var a=this,n=arguments,h=e&&!s;clearTimeout(s),s=setTimeout(function(){s=null,e||t.apply(a,n)},i),h&&t.apply(a,n)}}class t{constructor(t){this.DOM={},this.DOM.el=t,this.settings={animation:{slides:{duration:600,easing:"easeOutQuint"},shape:{duration:300,easing:{in:"easeOutQuint",out:"easeOutQuad"}}},frameFill:"#f1f1f1"},this.init()}init(){this.DOM.slides=Array.from(this.DOM.el.querySelectorAll(".slides > .slider")),this.slidesTotal=this.DOM.slides.length,this.DOM.nav=this.DOM.el.querySelector(".slidenav"),this.DOM.nextCtrl=this.DOM.nav.querySelector(".slidenav__item--next"),this.DOM.prevCtrl=this.DOM.nav.querySelector(".slidenav__item--prev"),this.current=0,this.createFrame(),this.initEvents()}createFrame(){this.rect=this.DOM.el.getBoundingClientRect(),this.frameSize=this.rect.width/12,this.paths={initial:this.calculatePath("initial"),final:this.calculatePath("final")},this.DOM.svg=document.createElementNS("http://www.w3.org/2000/svg","svg"),this.DOM.svg.setAttribute("class","shape"),this.DOM.svg.setAttribute("width","100%"),this.DOM.svg.setAttribute("height","100%"),this.DOM.svg.setAttribute("viewbox",`0 0 ${this.rect.width} ${this.rect.height}`),this.DOM.svg.innerHTML=`<path fill="${this.settings.frameFill}" d="${this.paths.initial}"/>`,this.DOM.el.insertBefore(this.DOM.svg,this.DOM.nav),this.DOM.shape=this.DOM.svg.querySelector("path")}updateFrame(){this.paths.initial=this.calculatePath("initial"),this.paths.final=this.calculatePath("final"),this.DOM.svg.setAttribute("viewbox",`0 0 ${this.rect.width} ${this.rect.height}`),this.DOM.shape.setAttribute("d",this.isAnimating?this.paths.final:this.paths.initial)}calculatePath(t="initial"){return"initial"===t?`M 0,0 0,${this.rect.height} ${this.rect.width},${this.rect.height} ${this.rect.width},0 0,0 Z M 0,0 ${this.rect.width},0 ${this.rect.width},${this.rect.height} 0,${this.rect.height} Z`:`M 0,0 0,${this.rect.height} ${this.rect.width},${this.rect.height} ${this.rect.width},0 0,0 Z M ${this.frameSize},${this.frameSize} ${this.rect.width-this.frameSize},${this.frameSize} ${this.rect.width-this.frameSize},${this.rect.height-this.frameSize} ${this.frameSize},${this.rect.height-this.frameSize} Z`}initEvents(){this.DOM.nextCtrl.addEventListener("click",()=>this.navigate("next")),this.DOM.prevCtrl.addEventListener("click",()=>this.navigate("prev")),window.addEventListener("resize",debounce(()=>{this.rect=this.DOM.el.getBoundingClientRect(),this.updateFrame()},20)),document.addEventListener("keydown",t=>{const i=t.keyCode||t.which;37===i?this.navigate("prev"):39===i&&this.navigate("next")})}navigate(t="next"){if(this.isAnimating)return!1;this.isAnimating=!0;anime({targets:this.DOM.shape,duration:this.settings.animation.shape.duration,easing:this.settings.animation.shape.easing.in,d:this.paths.final}).finished.then(()=>new Promise((i,e)=>{const s=this.DOM.slides[this.current];anime({targets:s,duration:this.settings.animation.slides.duration,easing:this.settings.animation.slides.easing,translateX:"next"===t?-1*this.rect.width:this.rect.width,complete:()=>{s.classList.remove("slide--current"),i()}}),this.current="next"===t?this.current<this.slidesTotal-1?this.current+1:0:this.current>0?this.current-1:this.slidesTotal-1;const a=this.DOM.slides[this.current];a.classList.add("slide--current"),anime({targets:a,duration:this.settings.animation.slides.duration,easing:this.settings.animation.slides.easing,translateX:["next"===t?this.rect.width:-1*this.rect.width,0]});const n=a.querySelector(".slide__img");anime.remove(n),anime({targets:n,duration:4*this.settings.animation.slides.duration,easing:this.settings.animation.slides.easing,translateX:["next"===t?200:-200,0]}),anime({targets:[a.querySelector(".slide__title"),a.querySelector(".slide__desc"),a.querySelector(".slide__link")],duration:2*this.settings.animation.slides.duration,easing:this.settings.animation.slides.easing,delay:(t,i)=>100*i+100,translateX:["next"===t?300:-300,0],opacity:[0,1]})})).then(()=>{anime({targets:this.DOM.shape,duration:this.settings.animation.shape.duration,delay:150,easing:this.settings.animation.shape.easing.out,d:this.paths.initial,complete:()=>this.isAnimating=!1})})}}document.querySelector(".slideshow")&&(new t(document.querySelector(".slideshow")),imagesLoaded(".slide__img",{background:!0},()=>document.body.classList.remove("loading")))}