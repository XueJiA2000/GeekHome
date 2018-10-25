// JavaScript Document

// CreateXMLHttpRequest
function CreateXMLHttpRequest(){
    var xmlHttp;
    if(window.XMLHttpRequest){ // Initialize Mozilla XMLHttpRequest object
    	xmlHttp = new XMLHttpRequest();
    }else if(window.ActiveXObject){ //Initialize for IE/Windows ActiveX version
        try{
        	xmlHttp = new ActiveXObject("Msxml2.XMLHTTP.3.0");
        } catch (e) {
            try{
            	xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e) {
            	newsstring = "对不起，您的浏览器不支持XMLHttpRequest对象！";
            }
        }   
    }
    return xmlHttp;
}