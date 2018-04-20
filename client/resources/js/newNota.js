/*
Quando executa um novo comando
a funcção de resposta troca
não sei ainda porque
*/
content = "";

page.novaNota = function(){
	//formularioio para nova nota
	this.popContent(content);
	this.popUp();
}
page.rNovaNota = function(msg){
	console.log(msg);
	page.popUp();
};
page.novaNotaAplic = function(){
	com = "dado.novo(";
	com += document.getElementById("novaNotaDado").value;
	com += ",";
	com += document.getElementById("novaNotaTag").value;
	console.log(com);
	term.com(com,page.rNovaNota);
	this.popContent(loading);
};
page.notaDrop = function(id){
	com = "dado.drop(" + id + ")";
	console.log(com);
	term.com(com,page.rNotaDrop);
};
page.rNotaDrop = function(){
	
};
content = "";
content += "<form>";
content += "<label>Dado</label>";

content += "<textarea id='novaNotaDado'>";
content += "</textarea>";
content += "<label>Tags</label>";
content += "<textarea id='novaNotaTag'>";
content += "</textarea>";
content += "<input  onClick='page.novaNotaAplic()' type='button' value='Salvar'>";
content += "</form>";

loading = "Loading..." ;

console.log("newNota.js");