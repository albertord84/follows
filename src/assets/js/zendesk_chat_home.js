window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4QMQc3y0X75kW162SosdvI6XoWRNlUzo";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

$zopim(function() {
    $zopim.livechat.departments.filter("");
    $zopim.livechat.departments.setVisitorDepartment("Atendimento ao cliente");
    $zopim.livechat.setOnConnected(function() {
        var dep = $zopim.livechat.departments.getDepartment("Atendimento ao cliente");
        if(dep.status=="offline"){
            $zopim.livechat.setStatus("offline");
        }
        else{
            $zopim.livechat.button.show();
        }
    })
});
