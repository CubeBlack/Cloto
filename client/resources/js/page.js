page = [];
term = new Terminal();
sTerm = new Terminal();
//- - - - - Pop
page.loaded = function(){
	//------------ configuracao
	term.server = "http://cloto/server/server-terminal.php";
	term.workerUrl = "http://cloto/client/resources/js/terminal_v1.1worker.js";
	//------------------
	page.search();
}
//- - - - - PopUp
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
//- - - - - search
page.search = function(){
	sTerm.com("dado.search( ,json",page.rSearch);
	
}
page.rSearch = function(msg){
	retorno = "";
	if(msg[0]!="["){
		console.log(msg);
		return;
	}
	
	dados = JSON.parse(msg);
		for(dNum = 0; dNum < dados.length;dNum++){
		retorno += "<dado>";
			retorno += "<valor>";
				retorno += dados[dNum].id + " - ";
				retorno += dados[dNum].dado;
			retorno += "</valor>";
			retorno += "<tag>";
				retorno += dados[dNum].tag;
			retorno += "</tag>";
			retorno +="<editar>" ;
				retorno +="<input onClick='page.notaDrop("+dados[dNum].id+")' type='button' value=Apagar>" ;
				retorno +="<a onClick='page.notaDrop("+dados[dNum].id+")' >Apagar</a>" ;
				retorno +="<input type='button' value=Editar>" ;
			retorno +="</editar>" ;
		retorno += "</dado>";
	}
	document.getElementById("content").innerHTML = retorno;;
	page.search();
}
console.log("page.js");