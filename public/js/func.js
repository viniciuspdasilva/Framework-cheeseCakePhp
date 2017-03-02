function generateXMLHttp() {
    if(typeof XMLHttpRequest != "undefined"){
        return new XMLHttpRequest();
    }else{
        if(window.ActiveXObject){
            var versions = ["MSXML2.XMLHttp.5.0", 
                "MSXML2.XMLHttp.4.0",
                "MSXML2.XMLHttp.3.0",
                "MSXML2.XMLHttp",
                "Microsoft.XMLHttp"];
            
        }
    }
    for(var i=0; i < versions.length; i++){
        try{
            return new ActiveXObject(versions[i]);
        }catch (e){}
    }
    alert('Seu navegador não pode trabalhar com Ajax!');
}

function getById() {
    var id = document.getElementById('codUnidade').value;
    var result = document.getElementById('unidadeInput');
    var XMLHttp = generateXMLHttp();

    XMLHttp.open("get","dadosUnidadeRFB.php?id=" + id, true);
    XMLHttp.onreadystatechange = function (){
        if (XMLHttp.readyState ==4){
            if(XMLHttp.status == 200){
                result.innerHTML = XMLHttp.responseText;

            }else{
                result.innerHTML = "Um erro ocorreu: " + XMLHttp.statusText;
            }
        }
    };
    XMLHttp.send(null);
}

