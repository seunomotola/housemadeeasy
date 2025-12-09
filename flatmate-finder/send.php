
<!DOCTYPE html><html lang="en-gb"><head><script data-ezscrex="false" data-cfasync="false" data-pagespeed-no-defer>var __ez=__ez||{};__ez.stms=Date.now();__ez.evt={};__ez.script={};__ez.ck=__ez.ck||{};__ez.template={};__ez.template.isOrig=true;__ez.queue=function(){var e=0,i=0,t=[],n=!1,o=[],s=[],r=!0,a=function(e,i,n,o,s,r,a){var l=arguments.length>7&&void 0!==arguments[7]?arguments[7]:window,c=this;this.name=e,this.funcName=i,this.parameters=null===n?null:p(n)?n:[n],this.isBlock=o,this.blockedBy=s,this.deleteWhenComplete=r,this.isError=!1,this.isComplete=!1,this.isInitialized=!1,this.proceedIfError=a,this.fWindow=l,this.isTimeDelay=!1,this.process=function(){f("... func = "+e),c.isInitialized=!0,c.isComplete=!0,f("... func.apply: "+e);var i=c.funcName.split("."),n=null,o=this.fWindow||window;i.length>3||(n=3===i.length?o[i[0]][i[1]][i[2]]:2===i.length?o[i[0]][i[1]]:o[c.funcName]),null!=n&&n.apply(null,this.parameters),!0===c.deleteWhenComplete&&delete t[e],!0===c.isBlock&&(f("----- F'D: "+c.name),u())}},l=function(e,i,t,n,o,s,r){var a=arguments.length>7&&void 0!==arguments[7]?arguments[7]:window,l=this;this.name=e,this.path=i,this.async=o,this.defer=s,this.isBlock=t,this.blockedBy=n,this.isInitialized=!1,this.isError=!1,this.isComplete=!1,this.proceedIfError=r,this.fWindow=a,this.isTimeDelay=!1,this.isPath=function(e){return"/"===e[0]&&"/"!==e[1]},this.getSrc=function(e){return void 0!==window.__ezScriptHost&&this.isPath(e)?window.__ezScriptHost+e:e},this.process=function(){l.isInitialized=!0,f("... file = "+e);var i=this.fWindow?this.fWindow.document:document,t=i.createElement("script");t.src=this.getSrc(this.path),!0===o?t.async=!0:!0===s&&(t.defer=!0),t.onerror=function(){f("----- ERR'D: "+l.name),l.isError=!0,!0===l.isBlock&&u()},t.onreadystatechange=t.onload=function(){var e=t.readyState;f("----- F'D: "+l.name),e&&!/loaded|complete/.test(e)||(l.isComplete=!0,!0===l.isBlock&&u())},i.getElementsByTagName("head")[0].appendChild(t)}},c=function(e,i){this.name=e,this.path="",this.async=!1,this.defer=!1,this.isBlock=!1,this.blockedBy=[],this.isInitialized=!0,this.isError=!1,this.isComplete=i,this.proceedIfError=!1,this.isTimeDelay=!1,this.process=function(){}};function d(e){!0!==h(e)&&0!=r&&e.process()}function h(e){if(!0===e.isTimeDelay&&!1===n)return f(e.name+" blocked = TIME DELAY!"),!0;if(p(e.blockedBy))for(var i=0;i<e.blockedBy.length;i++){var o=e.blockedBy[i];if(!1===t.hasOwnProperty(o))return f(e.name+" blocked = "+o),!0;if(!0===e.proceedIfError&&!0===t[o].isError)return!1;if(!1===t[o].isComplete)return f(e.name+" blocked = "+o),!0}return!1}function f(e){var i=window.location.href,t=new RegExp("[?&]ezq=([^&#]*)","i").exec(i);"1"===(t?t[1]:null)&&console.debug(e)}function u(){++e>200||(f("let's go"),m(o),m(s))}function m(e){for(var i in e)if(!1!==e.hasOwnProperty(i)){var t=e[i];!0===t.isComplete||h(t)||!0===t.isInitialized||!0===t.isError?!0===t.isError?f(t.name+": error"):!0===t.isComplete?f(t.name+": complete already"):!0===t.isInitialized&&f(t.name+": initialized already"):t.process()}}function p(e){return"[object Array]"==Object.prototype.toString.call(e)}return window.addEventListener("load",(function(){setTimeout((function(){n=!0,f("TDELAY -----"),u()}),5e3)}),!1),{addFile:function(e,i,n,r,a,c,h,f,u){var m=new l(e,i,n,r,a,c,h,u);!0===f?o[e]=m:s[e]=m,t[e]=m,d(m)},addDelayFile:function(e,i){var n=new l(e,i,!1,[],!1,!1,!0);n.isTimeDelay=!0,f(e+" ...  FILE! TDELAY"),s[e]=n,t[e]=n,d(n)},addFunc:function(e,n,r,l,c,h,f,u,m,p){!0===h&&(e=e+"_"+i++);var y=new a(e,n,r,l,c,f,u,p);!0===m?o[e]=y:s[e]=y,t[e]=y,d(y)},addDelayFunc:function(e,i,n){var o=new a(e,i,n,!1,[],!0,!0);o.isTimeDelay=!0,f(e+" ...  FUNCTION! TDELAY"),s[e]=o,t[e]=o,d(o)},items:t,processAll:u,setallowLoad:function(e){r=e},markLoaded:function(e){if(e&&0!==e.length){if(e in t){var i=t[e];!0===i.isComplete?f(i.name+" "+e+": error loaded duplicate"):(i.isComplete=!0,i.isInitialized=!0)}else t[e]=new c(e,!0);f("markLoaded dummyfile: "+t[e].name)}},logWhatsBlocked:function(){for(var e in t)!1!==t.hasOwnProperty(e)&&h(t[e])}}}();__ez.evt.add=function(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent?e.attachEvent("on"+t,n):e["on"+t]=n()},__ez.evt.remove=function(e,t,n){e.removeEventListener?e.removeEventListener(t,n,!1):e.detachEvent?e.detachEvent("on"+t,n):delete e["on"+t]};__ez.script.add=function(e){var t=document.createElement("script");t.src=e,t.async=!0,t.type="text/javascript",document.getElementsByTagName("head")[0].appendChild(t)};__ez.dot={};!function(){var e;__ez.vep=(e=[],{Add:function(i,t){__ez.dot.isDefined(i)&&__ez.dot.isValid(t)&&e.push({type:"video",video_impression_id:i,domain_id:__ez.dot.getDID(),t_epoch:__ez.dot.getEpoch(0),data:__ez.dot.dataToStr(t)})},Fire:function(){if(void 0===document.visibilityState||"prerender"!==document.visibilityState){if(__ez.dot.isDefined(e)&&e.length>0)for(;e.length>0;){var i=5;i>e.length&&(i=e.length);var t=e.splice(0,i),o=__ez.dot.getURL("/detroitchicago/grapefruit.gif")+"?orig="+(!0===__ez.template.isOrig?1:0)+"&v="+btoa(JSON.stringify(t));__ez.dot.Fire(o)}e=[]}}})}();</script><script data-ezscrex="false" data-cfasync="false" data-pagespeed-no-defer></script><meta name="keywords" content="Latest School News, Course Eligibility Checker, Course Options Finder, Subject Combination Checker, Admission Aggregate Score Calculator, Admission Eligibility Checker, Admission Chances Checker, Predict Your Admission, Course Recommender, Admission Checker Pin, Virtual Topup Services, Education/Cafe Services, Exam Past Question and Answers, Post UTME Past Questions" /><meta name="author" content="Campus Cybercafe" /><meta property="og:type" content="website" /><meta property="og:locale" content="en_US" /><link rel="canonical" href="https://campuscybercafe.com/" /><meta property="og:url" content="https://campuscybercafe.com/" /><meta property="og:site_name" content="CampusCybercafe" /><meta property="og:image" content="https://campuscybercafe.com/assets/images/logo/campuscybercafe1.png" /><meta property="og:image:width" content="512" /><meta property="og:image:height" content="512" /><meta property="og:image:type" content="image/png" /><meta name="twitter:card" content="summary_large_image" /><meta name="twitter:site" content="@CampusCybercafe" /><meta name="description" content="A reliable company to enjoy seamless educational services and pay less for Data, Airtime and bills payments." />

    <meta name="msapplication-TileColor" content="#ffffff" /><meta name="theme-color" content="#ffffff" /><meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="https://campuscybercafe.com/assets/images/logo/campuscybercafe1.png" type="image/x-icon" />


    <link rel="icon" type="image/x-icon" href="https://campuscybercafe.com/assets/images/logo/campuscybercafe1.png" /><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://campuscybercafe.com/assets/css/vendor.min.css" />

    <link rel="stylesheet" href="https://campuscybercafe.com/assets/vendor/bootstrap-icons/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://campuscybercafe.com/assets/vendor/aos/dist/aos.css" />

    <link rel="stylesheet" href="https://campuscybercafe.com/assets/css/theme.minc619.css" />
    <link href="/assets/js/work/select2.min.css" rel="stylesheet" /><link rel="manifest" href="https://campuscybercafe.com/assets/js/manifest.json" /><title> Campus Marketplace  - Campus Cybercafe</title><style>

 .loading-screen {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #ffffff;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 999;
}

.spinner {
  width: 50px;
  height: 50px;
  align-items: center;
  border-radius: 50%;
  border-top: 3px solid #3498db;
  border-right: 3px solid transparent;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.loading-text {
  font-size: 1.5rem;
  margin-left: 1rem;
}

</style><script type="text/javascript">var ezouid = "1";</script><base href="https://campuscybercafe.com/shop/"><script type="text/javascript">
var ezoTemplate = 'old_site_noads';
if(typeof ezouid == 'undefined')
{
    var ezouid = 'none';
}
var ezoFormfactor = '1';
var ezo_elements_to_check = Array();
</script>
<script data-ezscrex="false" type="text/javascript">
var soc_app_id = '0';
var did = 295129;
var ezdomain = 'campuscybercafe.com';
var ezoicSearchable = 1;
</script>


<script data-ezscrex="false" type="text/javascript" data-cfasync="false">var _ezaq = {"ab_test_id":"mod65-c","ad_cache_level":1,"ad_lazyload_version":0,"ad_load_version":0,"city":"Lagos","country":"NG","days_since_last_visit":0,"domain_id":295129,"engaged_time_visit":840,"ezcache_level":0,"ezcache_skip_code":0,"form_factor_id":1,"framework_id":1,"is_return_visitor":true,"is_sitespeed":0,"last_page_load":"1692395516129","last_pageview_id":"25e3ee9c-18f4-4125-5071-aceb88af7a19","lt_cache_level":0,"metro_code":0,"page_ad_positions":"","page_view_count":1,"page_view_id":"3ba40eb8-c5c8-41ab-7e9c-f138ca49e306","position_selection_id":0,"postal_code":"","pv_event_count":0,"response_size_orig":50775,"response_time_orig":1761,"serverid":"i-02aef95357f9a5c70","state":"LA","t_epoch":1692397200,"template_id":120,"time_on_site_visit":32767,"url":"https://campuscybercafe.com/shop/","user_id":0,"weather_precipitation":0,"weather_summary":"","weather_temperature":0,"word_count":540,"worst_bad_word_level":0};var _ezExtraQueries = "&ez_orig=1";</script>
<script data-ezscrex="false" data-pagespeed-no-defer data-cfasync="false">
function create_ezolpl(pvID, rv) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    __ez.ck.setByCat("ezux_lpl_295129=" + new Date().getTime() + "|" + pvID + "|" + rv + "; " + expires, 3);
}
function attach_ezolpl(pvID, rv) {
    if (document.readyState === "complete") {
        create_ezolpl(pvID, rv);
    }
    if(window.attachEvent) {
        window.attachEvent("onload", create_ezolpl, pvID, rv);
    } else {
        if(window.onload) {
            var curronload = window.onload;
            var newonload = function(evt) {
                curronload(evt);
                create_ezolpl(pvID, rv);
            };
            window.onload = newonload;
        } else {
            window.onload = create_ezolpl.bind(null, pvID, rv);
        }
    }
}

__ez.queue.addFunc("attach_ezolpl", "attach_ezolpl", ["3ba40eb8-c5c8-41ab-7e9c-f138ca49e306", "true"], false, ['/detroitchicago/boise.js'], true, false, false, false);
</script>
<script type="text/javascript">var _audins_dom="campuscybercafe_com",_audins_did=295129;__ez.queue.addFile('/detroitchicago/cmbv2.js', '/detroitchicago/cmbv2.js?gcb=195-0&cb=04-3y02-8y06-17y07-2y1e-7y0b-6y0d-27y13-4y18-4y1c-5y21-4y26-3y34-4y59-2&cmbcb=178&sj=x04x02x06x07x1ex0bx0dx13x18x1cx21x26x34x59', true, [], true, false, true, false);</script>
<script type="text/javascript" defer>__ez.queue.addFile('/detroitchicago/cmbdv2.js', '/detroitchicago/cmbdv2.js?gcb=195-0&cb=03-8y0c-6y1d-5&cmbcb=178&sj=x03x0cx1d', true, ['/detroitchicago/cmbv2.js'], true, false, true, false);</script></head><body><div class="text-center loading-screen"><div class="spinner"></div></div><div hidden><div id="jsPreloader" class="page-preloader"><div class="page-preloader-middle"><span class="spinner-grow text-primary" role="status" aria-hidden="true"></span>
Loading..
</div></div><script>
    (function() {
      setTimeout(() => {
        const preloader = document.getElementById('jsPreloader')
        preloader.style.opacity = 0

        setTimeout(() => {
        window.addEventListener('load', preloader.parentNode.removeChild(preloader));

        }, 500)
      }, 1000)
    })()
  </script><div class="d-none modal fade" id="checkerModals" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-lg modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-close"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><div id="loginModalFormLogin"><div class="text-center mb-2"><h4 class="modal-title text-center font-weight-bold mb-1">Join Our Exclusive Student Community</h4><p><span class="font-weight-bold">Hello! </span> Are you looking to stay connected with your fellow students and stay informed about upcoming events? <br/><br/><span class="font-weight-bold">Look no further!</span> We have an <b class="text-primary">exclusive student community</b> where you can get the inside scoop and stay in the loop.</p><p><span class="font-italic">Join over <b class="text-primary">50,000 students </b>by following our updates for free!</span></p><div class="text-center mb-2"><a href="https://wa.me/message/INXRDY7NTLBKJ1" rel="nofollow external noopener noreferrer" target="_blank" class="btn btn-primary m-2">WhatsApp</a><a href="https://facebook.com/campuscybercafe/" target="_blank" rel="nofollow external noopener noreferrer" class="btn btn-primary m-2">Facebook</a><a href="https://instagram.com/campuscybercafe" target="_blank" rel="nofollow external noopener noreferrer" class="btn btn-primary m-2">Instagram</a><a href="https://twitter.com/campuscybercafe" target="_blank" rel="nofollow external noopener noreferrer" class="btn btn-primary m-2">Twitter</a></div><div class="modal-footer"><button type="button" class="btn btn-danger font-weight-bold" data-bs-dismiss="modal">Close</button></div></div></div></div></div></div></div><header id="header" class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-light navbar-show-hide" data-hs-header-options="{
            &#34;fixMoment&#34;: 1000,
            &#34;fixEffect&#34;: &#34;slide&#34;
          }"><div class="container"><nav class="js-mega-menu navbar-nav-wrap"><a class="navbar-brand" href="/" aria-label="Front"><img class="navbar-brand-logo" src="/assets/images/logo/campuscybercafelogo.webp" alt="Logo" /></a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-default"><i class="bi-list"></i></span><span class="navbar-toggler-toggled"><i class="bi-x"></i></span></button><div class="collapse navbar-collapse" id="navbarNavDropdown"><div class="navbar-absolute-top-scroller"><ul class="navbar-nav"><li class="hs-has-sub-menu nav-item"><a id="companyMegaMenu" class="hs-mega-menu-invoker nav-link " href="/blog/" role="button" aria-expanded="false">School News</a></li><li class="hs-has-sub-menu nav-item"><a id="companyMegaMenu" class="hs-mega-menu-invoker nav-link " href="/findlodges/roommate/" role="button" aria-expanded="false">Lodges &amp; Roommate</a></li><li class="hs-has-sub-menu nav-item"><a id="companyMegaMenu" class="hs-mega-menu-invoker nav-link " href="/shop/" role="button" aria-expanded="false">Marketplace</a></li><li class="nav-item"><a class="btn btn-primary btn-transition" href="/dashboard/">My Account</a></li></ul></div></div></nav></div></header><br/><br/>

          <main id="content" role="main"><div class="border-bottom"><div class="container content-space-2"><div class="row"><div class="col-md-4 mb-7 mb-md-0"><div class="d-flex">


            <div class="flex-shrink-0"><img class="avatar avatar-4x3" src="/assets/svg/illustrations/oc-protected-card.svg" alt="Variety of Products on Campus Marketplace" /></div><div class="flex-grow-1 ms-4"><h4 class="mb-1">Variety of Products</h4><p class="small mb-0">Search through the 100+ products and find what you&#39;re looking for.</p></div></div></div><div class="col-md-4 mb-7 mb-md-0"><div class="d-flex"><div class="flex-shrink-0"><img class="avatar avatar-4x3" src="/assets/svg/illustrations/oc-return.svg" alt="Easy Navigation on Campus Marketplace" /></div><div class="flex-grow-1 ms-4"><h4 class="mb-1">Easy Navigation</h4><p class="small mb-0">Simple and Easy to use interface for a smooth shopping experience.</p></div></div></div><div class="col-md-4"><div class="d-flex"><div class="flex-shrink-0"><img class="avatar avatar-4x3" src="/assets/svg/illustrations/oc-truck.svg" alt="Trusted Seller on Campus Marketplace" /></div><div class="flex-grow-1 ms-4"><h4 class="mb-1">Trusted Sellers</h4><p class="small mb-0">Search for the perfect product from our 161+ trusted sellers.</p></div></div></div></div></div></div><div class="text-center"></div>

            <div id="shop" class="container content-space-2 content-space-lg-3"><div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9"><h2>Shops on Marketplace</h2><a class="link" href="/shop/create/">Create an Online Store<i class="bi-chevron-right small ms-1"></i></a></div><div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4"><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/tees-empire/"><img alt="TEE&#39;S EMPIRE" style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/shop/2023-06-22/1687428047-img_20230622_091936.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/tees-empire/">TEE&#39;S EMPIRE</a></div><a class="text-body" href="/shop/tees-empire/">Delta State</a></div><div class="card-footer pt-0"><a href="/shop/tees-empire/" class="btn btn-outline-primary btn-sm rounded-pill">Visit</a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/pawa-telecom/"><img alt="Pawa Telecom" style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/shop/2022-09-27/1664237856-fb_img_16440508941644081.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/pawa-telecom/">Pawa Telecom</a></div><a class="text-body" href="/shop/pawa-telecom/">Niger State</a></div><div class="card-footer pt-0"><a href="/shop/pawa-telecom/" class="btn btn-outline-primary btn-sm rounded-pill">Visit</a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/nikkys-stiches/"><img alt="Nikky&#39;s stiches" style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/shop/2022-07-19/1658231411-screenshot_20220719-121412_1.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/nikkys-stiches/">Nikky&#39;s stiches</a></div><a class="text-body" href="/shop/nikkys-stiches/">Rivers State</a></div><div class="card-footer pt-0"><a href="/shop/nikkys-stiches/" class="btn btn-outline-primary btn-sm rounded-pill">Visit</a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/mm-graphics/"><img alt="MM GRAPHICS" style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/shop/2022-07-18/1658174259-20220612_212539-removebg-preview.apng" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/mm-graphics/">MM GRAPHICS</a></div><a class="text-body" href="/shop/mm-graphics/">Kebbi State</a></div><div class="card-footer pt-0"><a href="/shop/mm-graphics/" class="btn btn-outline-primary btn-sm rounded-pill">Visit</a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/pre-shy-hairline/"><img alt="Pre-shy hairline" style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/shop/2022-06-23/1656010238-img_20220623_065230_972.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/pre-shy-hairline/">Pre-shy hairline</a></div><a class="text-body" href="/shop/pre-shy-hairline/">Lagos</a></div><div class="card-footer pt-0"><a href="/shop/pre-shy-hairline/" class="btn btn-outline-primary btn-sm rounded-pill">Visit</a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/vickytelecommunications/"><img alt="Vickytelecommunications" style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/shop/2022-05-23/1653346619-20220523_195549.apng" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/vickytelecommunications/">Vickytelecommunications</a></div><a class="text-body" href="/shop/vickytelecommunications/">Kano State</a></div><div class="card-footer pt-0"><a href="/shop/vickytelecommunications/" class="btn btn-outline-primary btn-sm rounded-pill">Visit</a></div></div></div><div class="text-center"><a class="btn btn-primary btn-sm btn-transition" href="/shop/all/">View all Shops <i class="bi-chevron-right small ms-1"></i></a></div></div></div></main></div><div class="text-center"><div class="card card-info-link card-sm"><div class="card-body">
Want to Create your Shop ? <a class="card-link btn btn-primary btn-sm btn-transition ms-2" href="/marketplace/">Go here <span class="bi-chevron-right small ms-1"></span></a></div></div></div><br/><br/><div class="container content-space-2 content-space-lg-3"><div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9"><h2>Trending Products</h2><a class="link" href="/shop/products/new/">List your Product for sale <i class="bi-chevron-right small ms-1"></i></a></div><div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mb-3"><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/hair-1687428219/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2023-06-22/1687428220-img_20230620_103710_778.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/tees-empire/">TEE&#39;S EMPIRE</a></div><a class="text-body" href="/shop/product/hair-1687428219/">hair</a><p class="card-text text-dark"> ₦12,000.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/hair-1687428219/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/mobile-data-and-airtime-1664239287/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-09-27/1664239287-fb_img_16440508941644081.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/pawa-telecom/">Pawa Telecom</a></div><a class="text-body" href="/shop/product/mobile-data-and-airtime-1664239287/">Mobile Data and Airtime</a><p class="card-text text-dark"> ₦0.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/mobile-data-and-airtime-1664239287/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/lace-gown-design-1658250086/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-07-19/1658250086-a10be502b1fb4eacbf57dac95e6086a0.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/nikkys-stiches/">Nikky&#39;s stiches</a></div><a class="text-body" href="/shop/product/lace-gown-design-1658250086/">Lace gown design</a><p class="card-text text-dark"> ₦7,000.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/lace-gown-design-1658250086/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/men-chest-bag-1657753856/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-07-14/1657753856-1645043285145.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/bags-city-ng/">Bags City Ng</a></div><a class="text-body" href="/shop/product/men-chest-bag-1657753856/">Men chest bag</a><p class="card-text text-dark"> ₦3,500.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/men-chest-bag-1657753856/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/lady-mini-size-channel-bag-1657753282/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-07-14/1657753283-20220522_010152.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/bags-city-ng/">Bags City Ng</a></div><a class="text-body" href="/shop/product/lady-mini-size-channel-bag-1657753282/">Lady mini size channel bag</a><p class="card-text text-dark"> ₦3,500.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/lady-mini-size-channel-bag-1657753282/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/9mobile-1656695556/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-07-01/1656695556-20220701_175900.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href></a></div><a class="text-body" href="/shop/product/9mobile-1656695556/">9MOBILE</a><p class="card-text text-dark"> ₦800.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/9mobile-1656695556/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/airtel-1656695419/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-07-01/1656695419-screenshot_20220701-181001.apng" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href></a></div><a class="text-body" href="/shop/product/airtel-1656695419/">AIRTEL</a><p class="card-text text-dark"> ₦1.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/airtel-1656695419/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/glo-1656695244/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-07-01/1656695245-20220701_174817.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href></a></div><a class="text-body" href="/shop/product/glo-1656695244/">GLO</a><p class="card-text text-dark"> ₦500.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/glo-1656695244/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/mtn-1656694999/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-07-01/1656695000-20220701_174713.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href></a></div><a class="text-body" href="/shop/product/mtn-1656694999/">MTN</a><p class="card-text text-dark"> ₦300.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/mtn-1656694999/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/bone-straight-and-human-hair-1656011631/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-06-23/1656011632-img_20220623_195930_492.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/pre-shy-hairline/">Pre-shy hairline</a></div><a class="text-body" href="/shop/product/bone-straight-and-human-hair-1656011631/">Bone straight and human hair</a><p class="card-text text-dark"> ₦60,000.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/bone-straight-and-human-hair-1656011631/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/dxg-stitches-1653545087/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-05-26/1653574922-screenshot_20220526-0633222.jpeg" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href></a></div><a class="text-body" href="/shop/product/dxg-stitches-1653545087/">DXG Stitches</a><p class="card-text text-dark"> ₦0.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/dxg-stitches-1653545087/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div><div class="col mb-4"><div class="card card-bordered shadow-none text-center h-100"><div class="card-pinned"><a href="/shop/product/wedding-card-design-1653347533/"><img style="max-height:200px" class="lazyload card-img-top" data-src="https://defreshcoder.s3.amazonaws.com/assets/images/productimage/2022-05-24/1653347534-20220524_001114.apng" /></a><div class="card-pinned-top-end"><button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later"><i class="bi-heart"></i></button></div></div><div class="card-body"><div class="mb-1"><a class="link-sm link-secondary" href="/shop/vickytelecommunications/">Vickytelecommunications</a></div><a class="text-body" href="/shop/product/wedding-card-design-1653347533/">Wedding card design</a><p class="card-text text-dark"> ₦2,000.00</p></div><div class="card-footer pt-0"><a type="button" href="/shop/product/wedding-card-design-1653347533/" class="btn btn-outline-primary btn-sm rounded-pill"><b>View Product</b></a></div></div></div></div><div class="text-center"><a class="btn btn-outline-primary btn-transition rounded-pill" href="/shop/listings/all/">View all products</a></div></div><div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-close"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><div id="signupModalFormLogin" style="display: none; opacity: 0;"><div class="text-center mb-7"><h2>Log in</h2><p>Don&#39;t have an account yet?
<a class="js-animation-link link" href="javascript:;" role="button" data-hs-show-animation-options="{
                         &#34;targetSelector&#34;: &#34;#signupModalFormSignup&#34;,
                         &#34;groupName&#34;: &#34;idForm&#34;
                       }">Sign up</a></p></div><div class="d-grid gap-2"><a class="btn btn-white btn-lg" href="#"><span class="d-flex justify-content-center align-items-center"><img class="avatar avatar-xss me-2" src="../assets/svg/brands/google-icon.svg" alt="Image Description" />
Log in with Google
</span></a><a class="js-animation-link btn btn-primary btn-lg" href="#" data-hs-show-animation-options="{
                       &#34;targetSelector&#34;: &#34;#signupModalFormLoginWithEmail&#34;,
                       &#34;groupName&#34;: &#34;idForm&#34;
                     }">Log in with Email</a></div></div><div id="signupModalFormLoginWithEmail" style="display: none; opacity: 0;"><div class="text-center mb-7"><h2>Log in</h2><p>Don&#39;t have an account yet?
<a class="js-animation-link link" href="javascript:;" role="button" data-hs-show-animation-options="{
                         &#34;targetSelector&#34;: &#34;#signupModalFormSignup&#34;,
                         &#34;groupName&#34;: &#34;idForm&#34;
                       }">Sign up</a></p></div><form><div class="mb-3"><label class="form-label" for="signupModalFormLoginEmail">Your email</label><input type="email" class="form-control form-control-lg" name="email" id="signupModalFormLoginEmail" placeholder="email@site.com" aria-label="email@site.com" required /><span class="invalid-feedback">Please enter a valid email address.</span></div><div class="mb-3"><div class="d-flex justify-content-between align-items-center"><label class="form-label" for="signupModalFormLoginPassword">Password</label><a class="js-animation-link form-label-link" href="javascript:;" data-hs-show-animation-options="{
                       &#34;targetSelector&#34;: &#34;#signupModalFormResetPassword&#34;,
                       &#34;groupName&#34;: &#34;idForm&#34;
                     }">Forgot Password?</a></div><input type="password" class="form-control form-control-lg" name="password" id="signupModalFormLoginPassword" placeholder="8+ characters required" aria-label="8+ characters required" required minlength="8" /><span class="invalid-feedback">Please enter a valid password.</span></div><div class="d-grid mb-3"><button type="submit" class="btn btn-primary form-control-lg">Log in</button></div></form></div><div id="signupModalFormSignup"><div class="text-center mb-7"><h2>Sign up</h2><p>Already have an account?
<a class="js-animation-link link" href="javascript:;" role="button" data-hs-show-animation-options="{
                         &#34;targetSelector&#34;: &#34;#signupModalFormLogin&#34;,
                         &#34;groupName&#34;: &#34;idForm&#34;
                       }">Log in</a></p></div><div class="d-grid gap-3"><a class="btn btn-white btn-lg" href="#"><span class="d-flex justify-content-center align-items-center"><img class="avatar avatar-xss me-2" src="../assets/svg/brands/google-icon.svg" alt="Image Description" />
Sign up with Google
</span></a><a class="js-animation-link btn btn-primary btn-lg" href="#" data-hs-show-animation-options="{
                       &#34;targetSelector&#34;: &#34;#signupModalFormSignupWithEmail&#34;,
                       &#34;groupName&#34;: &#34;idForm&#34;
                     }">Sign up with Email</a><div class="text-center"><p class="small mb-0">By continuing you agree to our <a href="#">Terms and Conditions</a></p></div></div></div><div id="signupModalFormSignupWithEmail" style="display: none; opacity: 0;"><div class="text-center mb-7"><h2>Sign up</h2><p>Already have an account?
<a class="js-animation-link link" href="javascript:;" role="button" data-hs-show-animation-options="{
                         &#34;targetSelector&#34;: &#34;#signupModalFormLogin&#34;,
                         &#34;groupName&#34;: &#34;idForm&#34;
                       }">Log in</a></p></div><form><div class="mb-3"><label class="form-label" for="signupModalFormSignupEmail">Your email</label><input type="email" class="form-control form-control-lg" name="email" id="signupModalFormSignupEmail" placeholder="email@site.com" aria-label="email@site.com" required /><span class="invalid-feedback">Please enter a valid email address.</span></div><div class="mb-3"><label class="form-label" for="signupModalFormSignupPassword">Password</label><input type="password" class="form-control form-control-lg" name="password" id="signupModalFormSignupPassword" placeholder="8+ characters required" aria-label="8+ characters required" required /><span class="invalid-feedback">Your password is invalid. Please try again.</span></div><div class="mb-3" data-hs-validation-validate-class><label class="form-label" for="signupModalFormSignupConfirmPassword">Confirm password</label><input type="password" class="form-control form-control-lg" name="confirmPassword" id="signupModalFormSignupConfirmPassword" placeholder="8+ characters required" aria-label="8+ characters required" required data-hs-validation-equal-field="#signupModalFormSignupPassword" /><span class="invalid-feedback">Password does not match the confirm password.</span></div><div class="d-grid mb-3"><button type="submit" class="btn btn-primary form-control-lg">Sign up</button></div><div class="text-center"><p class="small mb-0">By continuing you agree to our <a href="#">Terms and Conditions</a></p></div></form></div><div id="signupModalFormResetPassword" style="display: none; opacity: 0;"><div class="text-center mb-7"><h2>Forgot password?</h2><p>Enter the email address you used when you joined and we&#39;ll send you instructions to reset your password.</p></div><form><div class="mb-3"><div class="d-flex justify-content-between align-items-center"><label class="form-label" for="signupModalFormResetPasswordEmail" tabindex="0">Your email</label><a class="js-animation-link form-label-link" href="javascript:;" data-hs-show-animation-options="{
                         &#34;targetSelector&#34;: &#34;#signupModalFormLogin&#34;,
                         &#34;groupName&#34;: &#34;idForm&#34;
                       }"><i class="bi-chevron-left small"></i> Back to Log in
</a></div><input type="email" class="form-control form-control-lg" name="email" id="signupModalFormResetPasswordEmail" tabindex="1" placeholder="Enter your email address" aria-label="Enter your email address" required /><span class="invalid-feedback">Please enter a valid email address.</span></div><div class="d-grid"><button type="submit" class="btn btn-primary form-control-lg">Submit</button></div></form></div></div><div class="modal-footer d-block text-center py-sm-5"><small class="text-cap mb-4">Trusted by the world&#39;s best teams</small><div class="w-85 mx-auto"><div class="row justify-content-between"><div class="col"><img class="img-fluid" src="../assets/svg/brands/gitlab-gray.svg" alt="Logo" /></div><div class="col"><img class="img-fluid" src="../assets/svg/brands/fitbit-gray.svg" alt="Logo" /></div><div class="col"><img class="img-fluid" src="../assets/svg/brands/flow-xo-gray.svg" alt="Logo" /></div><div class="col"><img class="img-fluid" src="../assets/svg/brands/layar-gray.svg" alt="Logo" /></div></div></div></div></div></div></div><a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options="{
       &#34;offsetTop&#34;: 700,
       &#34;position&#34;: {
         &#34;init&#34;: {
           &#34;right&#34;: &#34;2rem&#34;
         },
         &#34;show&#34;: {
           &#34;bottom&#34;: &#34;2rem&#34;
         },
         &#34;hide&#34;: {
           &#34;bottom&#34;: &#34;-2rem&#34;
         }
       }
     }"><i class="bi-chevron-up"></i></a>
.
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarEmptyShoppingCart"><div class="offcanvas-header justify-content-end border-0 pb-0"><button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button></div><div class="offcanvas-body"><div class="text-center"><div class="mb-5"><img class="avatar avatar-xl avatar-4x3" src="/assets/svg/illustrations/oc-empty-cart.svg" alt="SVG" /></div><div class="mb-5"><h3>Your cart is currently empty</h3><p>Before proceed to checkout you must add some products to your shopping cart. You will find a lot of interesting products on our &#34;Shop&#34; page.</p></div><a class="btn btn-primary btn-transition rounded-pill px-6" href="index.html">Start shopping</a></div></div></div><footer class="bg-dark"><div class="container pb-1 pb-lg-5"><div class="row content-space-t-2"><div class="col-lg-3 mb-7 mb-lg-0"><div class="mb-5"><a class="navbar-brand" href="/" aria-label="Space"><img class="navbar-brand-logo" src="/assets/images/logo/campuscybercafewhite.webp" alt="Campus Cybercafe" /></a></div><ul class="list-unstyled list-py-1"><li class="text-white "><i class="bi-geo-alt-fill me-1"></i>Nigeria</li><li class="text-white "><i class="bi-telephone-inbound-fill me-1"></i> + 234 807 795 7494</li></ul></div><div class="col-sm mb-7 mb-sm-0"><h5 class="text-white mb-3">Company</h5><ul class="list-unstyled list-py-1 mb-0"><li><a class="link-sm link-light" href="/contact-us/">Contact Us</a></li><li><a class="link-sm link-light" href="/career/">Career with us <span class="badge bg-warning text-dark rounded-pill ms-1">We&#39;re hiring</span></a></li><li><a class="link-sm link-light" href="https://wa.me/c/2348077957494">Our Services<i class="bi-box-arrow-up-right small ms-1"></i></a></li><li><a class="link-sm link-light" href="/contact-us/">Hire our team</a></li></ul></div><div class="col-sm mb-7 mb-sm-0"><h5 class="text-white mb-3">Features</h5><ul class="list-unstyled list-py-1 mb-0"><li><a target="_blank" class="link-sm link-light" href="https://wa.me/p/4701424419984052/2348077957494">Project Topics &amp; Materials <i class="bi-box-arrow-up-right small ms-1"></i></a></li><li><a class="link-sm link-light" href="/library/cover-page-generator/">Project Cover Page Maker</a></li><li><a class="link-sm link-light" href="https://campuscybercafe.com/aggregate-calculator/">Aggregate Score Calculator</a></li><li><a class="link-sm link-light" href="/course-eligibility-checker/">Course Eligibility Checker</a></li><li><a class="link-sm link-light" href="https://campuscybercafe.com/jamb-subject-combination-checker/">Subject Combination Checker</a></li><li><a class="link-sm link-light" href="/admission-eligibility-checker/">Admission Eligibility Checker</a></li><li><a class="link-sm link-light" href="/course-recommender/">Course Recommender Tool</a></li></ul></div><div class="col-sm"><h5 class="text-white mb-3">Explore</h5><ul class="list-unstyled list-py-1 mb-0"><li><a class="link-sm link-light" href="/dashboard/#topup">VTU Services</a></li><li><a class="link-sm link-light" href="/blog/">Latest School News</a></li><li><a class="link-sm link-light" href="/findlodges/roommate/">Roommates &amp; Lodges</a></li><li><a class="link-sm link-light" href="/software/">Launch a Website</a></li><li><a class="link-sm link-light" href="/learn/">Tech Workshop</a></li><li><a class="link-sm link-light" href="/shop/">Marketplace</a></li></ul></div></div><div class="border-top border-white-10 my-7"></div><div class="row mb-7"><div class="col-sm mb-3 mb-sm-0"><ul class="list-inline list-separator list-separator-light mb-0"><li class="list-inline-item"><a class="link-sm link-light" href="/privacy-policy/">Privacy Policy</a></li><li class="list-inline-item"><a class="link-sm link-light" href="/terms-of-use/">Terms And Conditions</a></li></ul></div><div class="col-sm-auto"><ul class="list-inline mb-0"><li class="list-inline-item"><a target="_blank" rel="nofollow external noopener noreferrer" class="btn btn-soft-light btn-xs btn-icon" href="https://facebook.com/groups/190498623115902/"><i class="bi-facebook"></i></a></li><li class="list-inline-item"><a target="_blank" rel="nofollow external noopener noreferrer" class="btn btn-soft-light btn-xs btn-icon" href="https://instagram.com/campuscybercafe"><i class="bi-instagram"></i></a></li><li class="list-inline-item"><a target="_blank" rel="nofollow external noopener noreferrer" class="btn btn-soft-light btn-xs btn-icon" href="https://twitter.com/campuscybercafe"><i class="bi-twitter"></i></a></li><li class="list-inline-item"><a target="_blank" rel="nofollow external noopener noreferrer" class="btn btn-soft-light btn-xs btn-icon" href="https://wa.me/c/2348077957494"><i class="bi-whatsapp"></i></a></li></ul></div></div><div class="w-md-85 text-lg-center mx-lg-auto"><b class="text-white-50 small">©Campus Cybercafe 2023. All rights reserved</b><p></p><b class="text-white-50 small">When you visit or interact with our sites, services or tools, we or our authorised service providers may use cookies for storing information to help provide you with a better, faster and safer experience and for marketing purposes.</b></div></div></footer><script src="/assets/js/work/jquery.min.js"></script><script src="/assets/js/work/sweetalert2.all.js"></script><script src="/assets/js/work/core.js"></script><script src="/assets/js/work/select2.min.js"></script><script src="/assets/js/vendor.min.js"></script><script src="/assets/vendor/aos/dist/aos.js"></script><script src="/assets/js/theme.min.js"></script><script>
  // Function to check if the website is running in standalone mode (added to home screen)
  function isStandalone() {
    return window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone;
  }

  // Function to prompt the user to add the website to the home screen
  function addToHomeScreen() {
    const lastDisplayTime = localStorage.getItem('lastDisplayTime');

    // If lastDisplayTime is null or more than 7 days ago, show the prompt again
    if (!lastDisplayTime || (Date.now() - parseInt(lastDisplayTime)) > (7 * 24 * 60 * 60 * 1000)) {
      if (!isStandalone()) {
        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', (event) => {
          event.preventDefault();
          deferredPrompt = event;
          Swal.fire({
            title: 'Download App',
            text: 'Do you want to install our Web App on your mobile phone?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
          }).then((result) => {
            if (result.isConfirmed) {
              // Show the success message
              Swal.fire({
                title: 'Added!',
                text: 'Campus Cybercafe will be installed on your mobile phone.',
                icon: 'success',
                timer: 3000, // Show success message for 3 seconds
                timerProgressBar: true,
              });

              // Trigger the browser's install prompt
              deferredPrompt.prompt();
              deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                  console.log('User accepted the install prompt.');
                } else {
                  console.log('User dismissed the install prompt.');
                }
                deferredPrompt = null;
              });
            } else {
              Swal.fire('Cancelled', 'The App was not installed on your mobile phone.', 'info');
            }
          });
        });

        window.addEventListener('appinstalled', () => {
          // The app is now installed, update your UI if needed
          console.log('App installed.');
        });
        // Update the lastDisplayTime in localStorage
        localStorage.setItem('lastDisplayTime', Date.now().toString());
      }
    }
  }
  // Call the function when the page loads
  addToHomeScreen();
</script><script>
  $(document).ready(function () {
  $("select").addClass("form-select")
  $("label").addClass("form-label")
  let loadingScreen = document.querySelector('.loading-screen');
  loadingScreen.style.display = 'none';
  $('div').removeAttr('hidden');
  // Call the function to prompt the user when the page loads
  addToHomeScreen();
});
</script><script>
    (function() {
      // INITIALIZATION OF HEADER
      // =======================================================
      new HSHeader('#header').init()


      // INITIALIZATION OF BOOTSTRAP DROPDOWN
      // =======================================================
      HSBsDropdown.init()


      // INITIALIZATION OF AOS
      // =======================================================
      AOS.init({
        duration: 650,
        once: true
      });


      // INITIALIZATION OF TEXT ANIMATION (TYPING)
      // =======================================================
      // HSCore.components.HSTyped.init('.js-typedjs')

      });

  </script><script>
    (function() {
      HSCore.components.HSTyped.init('.js-typedjs')
      AOS.init({
        duration: 650,
        once: true
      });

    })()
  </script><script>
  // Disable right-click
   if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
   document.addEventListener('contextmenu', function(event) {
    event.preventDefault();
    showCustomMessage('Right-clicking is disabled.');
  });
   }

  // Detect inspect element
  document.addEventListener('keydown', function(event) {
    if (event.keyCode === 123) { // F12 key
      event.preventDefault();
      showCustomMessage('Inspecting is disabled.');
    }
  });

   // Disable inspect keyboard shortcuts on macOS
  document.addEventListener('keydown', (event) => {
    if ((event.metaKey || event.ctrlKey) && event.shiftKey && event.keyCode === 73) {
      event.preventDefault();
      showCustomMessage('Inspecting is disabled.');
    }
  });


  // Show custom message
  function showCustomMessage(message) {
    document.body.innerHTML = '<div style="font-size: 24px; text-align: center; padding-top: 100px;">' + message + '</div>';
  }
</script><script>
  function isFetchAPISupported() {
    return 'fetch' in window;
  }

  function isSwalFireSupported() {
    return typeof Swal !== 'undefined' && typeof Swal.fire === 'function';
  }

  function isJQuerySupported() {
    return typeof jQuery !== 'undefined';
  }

  function isBrowserSupported() {
    return isFetchAPISupported() && isSwalFireSupported() && isJQuerySupported();
  }

  function showUnsupportedBrowserMessage() {
    let message = "Please ensure that you have a strong network connection and an updated browser to access the website properly.\n\nSupported browsers:\n- Chrome Browser \n- Opera Mini \n- Safari on iOS\n- Microsoft Edge\n\nClick 'OK' to continue browsing.";
    alert(message);
  }

  if (!isBrowserSupported()) {
    showUnsupportedBrowserMessage();
  }
</script><script async src="https://www.googletagmanager.com/gtag/js?id=G-CZPZCND44K"></script><script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-CZPZCND44K');
  </script><script>
       let observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(function (entry) {
    if (entry.intersectionRatio > 0 || entry.isIntersecting) {
      const image = entry.target;
      observer.unobserve(image);

      if (image.hasAttribute('src')) {
        // Image has been loaded already
        return;
      }

      // Image has not been loaded so load it
      const sourceUrl = image.getAttribute('data-src');
      image.setAttribute('src', sourceUrl);

      image.onload = () => {
        // Do stuff
      }

      // Removing the observer
      observer.unobserve(image);
    }
  });
});

document.querySelectorAll('.lazyload').forEach((el) => {
  observer.observe(el);
});
    </script>
<script type="text/javascript" style="display:none;" async>
</script>
<script type="text/javascript" data-cfasync="false"></script></body></html>