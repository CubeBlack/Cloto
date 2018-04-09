page = [];
page.checkPop = false;
page.popUp = function(){
	this.checkPop = !this.checkPop;
	if(this.checkPop){
		document.getElementById("popUp").style = "display:block;";
	}
	else{
		document.getElementById("popUp").style = "display:none;";
	}
}
page.popContent = function(content=""){
	document.getElementById("popUp-content").innerHTML = content;
}
console.log("page.js");