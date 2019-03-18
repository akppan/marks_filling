function enainpts(){
    var x = document.getElementById("noos").value;
    if(x<=10){
        for (let index = 1; index <= x; index++) {
            document.getElementById("s"+index).toggleAttribute("disabled",false);
        }
    }
}

function prev(){
    px = document.getElementById("noos").value;
}

function current(){
    cx = document.getElementById("noos").value;
    if(cx<=px){
        for (let index = 1; index <= px; index++) {
            document.getElementById("s"+index).setAttribute("disabled","true");
        }
        enainpts();
    }
    enainpts();
}

function change(){
    var crs = document.getElementById("select1").value;
    document.getElementById("course").value=crs;
}

function maxip(s){
    if(int(s)>100){
        $(this).value=100;
    }
}

window.onhashchange = function() {
	window.location.replace("file:///C:/xampp/htdocs/php/scratchcoder/index.html");
	alert("Do not go back");
}

window.onbeforeunload = function(e) {
	//e.returnValue = window.location.replace("file:///C:/xampp/htdocs/php/scratchcoder/index.html");
	alert("Do not refresh");
}