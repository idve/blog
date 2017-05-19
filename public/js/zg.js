/**
 * Created by zg on 2017/5/9.
 */
var msg=document.getElementById("errormsg");
var bt=document.getElementsByClassName("btn");
var error=function(id,name){
    var user=document.getElementById(id);
    if(user.value==""){
        msg.innerHTML=name+"不能为空";
        bt[0].disabled="disabled";
    }else{
        msg.innerHTML="";
        bt[0].disabled="";
    }
}