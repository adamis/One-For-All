<?php
    include_once 'Autoload.php';
    use engine\Acl;
?>
<!doctype html>
<html lang="pt-br">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Barramento</h5>  
                <p class="card-text">
                    Todas as suas apis serão listadas aqui!
                    <br>
                    <span style="font-size: 10px; font-weight: bold;">Build 1.0 29/01/2021 23:27:10</span>
                </p>                 
            </div>
        </div>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <style>       

            /*the container must be positioned relative:*/
            .custom-select {
            position: relative;
            font-family: Arial;
            }

            .custom-select select {
            display: none; /*hide original SELECT element:*/
            }

            .select-selected {
            background-color: DodgerBlue;
            }

            /*style the arrow inside the select element:*/
            .select-selected:after {
            position: absolute;
            content: "";
            top: 14px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #fff transparent transparent transparent;
            }

            /*point the arrow upwards when the select box is open (active):*/
            .select-selected.select-arrow-active:after {
            border-color: transparent transparent #fff transparent;
            top: 7px;
            }

            /*style the items (options), including the selected item:*/
            .select-items div,.select-selected {
            color: #ffffff;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
            cursor: pointer;
            user-select: none;
            }

            /*style items (options):*/
            .select-items {
            position: absolute;
            background-color: DodgerBlue;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
            }

            /*hide the items when the select box is closed:*/
            .select-hide {
            display: none;
            }

            .select-items div:hover, .same-as-selected {
            background-color: rgba(0, 0, 0, 0.1);
            }

            pre {
                background-color: ghostwhite;
                border: 1px solid silver;
                padding: 10px 20px;
                margin: 20px; 
            }
            .json-key {
                color: brown;
            }
            .json-value {
                color: navy;
            }
            .json-string {
                color: olive;
            }


            table {
                margin-bottom: 0px !important;   
                border-spacing: 0 !important;   
            }

            .titles{
                background-color: #212529;
                color:white;                
            }

            .coluna1{
                background-color: #f5f5f5;                
                color:gray;                
            }
            .coluna2{
                background-color: #ffffff;                
                color:gray;   
                text-decoration: none;           
            }
            .formstyle {
                background-color: #ffffff;                
                padding: 10px;
                float:left; 
                border:solid 1px #bdbdbd; 
                border-radius:4px;
            }
            .shadow { 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 8px 16px 0 rgba(0, 0, 0, 0.16); 
            }
            .btnColapse {
                margin: 10px 0;
            }
            .btnDefault {
                margin-top: 10px;
                margin-bottom: 10px;
            }


        </style>


<?php

    $acls = new Acl();
    $permission =  $acls->getAcls();
    
    $tempName = "";
    $script = "";

    $arrTemp = Array();
    $cont = 0;
    $host = str_replace('barramento.php','',$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $host = str_replace('barramento','',$host).'api/';

    foreach($permission as $item) { //foreach element in $arr        
        if($tempName != $item[2]){            
            $tempName = $item[2];            
            $arrTemp[$cont]= 'http://'.$host.$item[2];
            $cont++;
        }
    }
    
    $cont = 0;

    foreach ($arrTemp as $temp) {
        echo '<div  class="table-responsive" style="padding:20px 20px; float:left;">';
            echo '<div class="table-responsive shadow" style="background-color: #212529; float:left; border:solid 1px #bdbdbd; border-radius:4px;">';
                echo '<table class="table" >';

                    echo '<tr>';
                        echo '<td  colspan="10" class="titles">';
                            echo $temp;
                        echo '</td>';    
                    echo '</tr>';
            
                    $th = '';
                    $th .= '<th scope="col">';
                        $th .= 'Type:';
                    $th .= '</th>';

                    $td = '';
                    $td .= '<td scope="row">';
                        $td .= 'Função:';
                    $td .=  '</td>';    

                    foreach ($permission as $key) {
                        if(('http://'.$host.$key[2]) == $temp){                

                                $th .= '<th scope="col">';
                                    $th .= ''.$key[0];
                                $th .= '</th>';

                                $td .= '<td >';
                                    $td .=  "<a title='http://".$host.$key[2].'/'.$key[1]."' target='_blank' href='http://".$host.$key[2].'/'.$key[1]."'>".$key[1]."</a>";
                                $td .=  '</td>';    

                        }            
                    }

                   
                    echo '<tr class="coluna1">';
                        echo strtoupper($th);
                    echo '</tr>';
                    
                    echo '<tr class="coluna2">';
                        echo $td;
                    echo '</tr>';        

                echo '</table>';                
            echo '</div>';

?>
            <a id="toggleBtn<?=$cont?>" class="btn btn-primary btnColapse" data-toggle="collapse" href="#collapseForm<?=$cont?>" role="button" aria-expanded="false" aria-controls="collapseForm<?=$cont?>">
                Testar(+)
            </a>            


            <div id="collapseForm<?=$cont?>" class="collapse table-responsive shadow formstyle">
                    
                    <form id="gz-form<?=$cont?>">

                        <div class="form-group">
                                                        
                            <label for="exampleInputEmail1">Função:</label>                            
                            <select>
<?php
                            foreach ($permission as $key) {
                                if(('http://'.$host.$key[2]) == $temp){                
                                    echo '<option value="'.$key[0].':'.$key[1].'" >'.$key[1].'</option>';
                                }            
                            }
?>                            
                            </select>
                            <small id="emailHelp" class="form-text text-muted">Selecione a função que deseja testar!</small>    

                        </div>
                        

                        <div id="add<?=$cont?>">
                            <div id="group0" class="form-group">
                                
                                <div class="form-row">
                                    
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Chave">
                                    </div>

                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Valor">
                                    </div>
                                    
                                    <div onclick="deleteParam('0')" class="btn btn-outline-danger" style="margin-right:10px;">Remover</div>
                                    
                                </div>

                            </div>
                        </div>
                            
                        <div class="form-group btnDefault">
                            <div onclick="addParam(<?=$cont?>)" class="btn btn-success">Adicionar</div>
<?php
                            foreach ($permission as $key) {
                                if(('http://'.$host.$key[2]) == $temp){
                                 echo '<div onclick="exec(\''.$host.$key[2].'/\','.$cont.')" class="btn btn-primary">Executar</div>';
                                 break;
                                }
                            }
?>                            
                        </div>                        
                        
                    </form>

                    <form id="formTextArea<?=$cont?>">
                        <div class="form-group">
                            <label for="formControlTextArea<?=$cont?>">Result:</label>
                            <label id="label<?=$cont?>" for="formControlTextArea<?=$cont?>">-</label>                            
                            <pre style="height:180px; overflow:auto;"><code id="formControlTextArea<?=$cont?>" rows="10"></code></pre>                            
                        </div>
                    </form>
            </div>

        </div>

 <?php   
    $script .= '
        $(\'#collapseForm'.$cont.'\').on(\'show.bs.collapse\', function () {        
            document.getElementById(\'toggleBtn'.$cont.'\').innerHTML=\'Testar(-)\';
        });

        $(\'#collapseForm'.$cont.'\').on(\'hidden.bs.collapse\', function () {        
            document.getElementById(\'toggleBtn'.$cont.'\').innerHTML=\'Testar(+)\';
        });
                
';

        $cont++;
    }
?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    <script src="https://wtag.com.br/res/js/jsmin-1.0.0.js"></script>

    <script type="text/javascript">
        <?php echo $script; ?>

        //-------------- PRETTY --------------------------
        if (!library)
        var library = {};

        library.json = {
        replacer: function(match, pIndent, pKey, pVal, pEnd) {
            var key = '<span class=json-key>';
            var val = '<span class=json-value>';
            var str = '<span class=json-string>';
            var r = pIndent || '';
            if (pKey)
                r = r + key + pKey.replace(/[": ]/g, '') + '</span>: ';
            if (pVal)
                r = r + (pVal[0] == '"' ? str : val) + pVal + '</span>';
            return r + (pEnd || '');
            },
        prettyPrint: function(obj) {
            var jsonLine = /^( *)("[\w]+": )?("[^"]*"|[\w.+-]*)?([,[{])?$/mg;
            return JSON.stringify(obj, null, 3)
                .replace(/&/g, '&amp;').replace(/\\"/g, '&quot;')
                .replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(jsonLine, library.json.replacer);
            }
        };
        //-------------- FIM PRETTY --------------------------


        var contControl = new Array();

        function addParam(id) {
            console.log(contControl);
            contControl[id] = (contControl[id] == null)?1:contControl[id]; 
            
            var div = document.getElementById('add'+id);
            //div.innerHTML= div.innerHTML+
            $("#add"+id).append(
            '<div id="group'+contControl[id]+'" class="form-group"> '+
                '<div class="form-row"> '+
                    
                    '<div class="col"> '+
                        '<input type="text" class="form-control" placeholder="Chave"> '+
                    '</div> '+

                    '<div class="col"> '+
                        '<input type="text" class="form-control" placeholder="Valor"> '+                        
                    '</div> '+
                    
                    '<div onclick="deleteParam('+contControl[id]+')" class="btn btn-outline-danger">Remover</div>'+
                    
                '</div> '+
            '</div>');

            contControl[id] = contControl[id]+1;
        }

        function deleteParam(groupId) {
            var node = document.getElementById('group'+groupId);
            if (node.parentNode) {
                node.parentNode.removeChild(node);
            }
        }

        function exec(url,idForm) {
            var type;
            var funcName;
            var params ="";
                        
            var result = getForm(idForm).split('<gz>');

            for (let index = 0; index < result.length;index++) {
                if(index == 0){
                    var func = result[index].split(':');
                    type = func[0];
                    funcName = func[1];

                }else{

                    if(index%2 == 1){                        
                        params += result[index];                         
                    }else{                        
                        params += "="+result[index]; 
                        
                        if(index+1 != result.length){
                            params += "&";
                        }
                    }
                    
                }                
            }           
            //alert(params);

            if(type == 'GET'){
                request(type,"http://"+url+funcName +"?"+ params, null, 'resultconsole',idForm);            
            }else{
                request(type,"http://"+url+funcName, params, 'resultconsole',idForm);            
            }
            

        }

        function resultconsole(msg,status,idForm){
            //alert(status+": "+msg+" - "+idForm);
            
            var div = document.getElementById('label'+idForm);
            div.innerHTML = status;
            
            var textArea = document.getElementById('formControlTextArea'+idForm);
            //textArea.html(library.json.prettyPrint(msg));
            //var jsonPretty = JSON.stringify(JSON.parse(msg),null,2); 
            if(status == 200){
                textArea.innerHTML = library.json.prettyPrint(JSON.parse(msg));
            }else{
                textArea.innerHTML = msg;
            }
            
        }

        function request(method, url, object, callback,idForm) {
            var request = new XMLHttpRequest();
            request.open(method, url, true);			
            request.setRequestHeader("Accept-Language", "pt-BR");
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
            request.onreadystatechange = function() {
                if (request.readyState == 4 && (request.status == 200 || request.status == 300)) {
                    
                        if (callback != null) {                            
                            eval(callback + "('" + request.responseText + "','"+request.status+"','"+idForm+"')");
                        }
                    
                } else if (request.readyState == 4 && request.status == 400) {
                    try {                                            
                        eval(callback + "('" + request.responseText + "','"+request.status+"','"+idForm+"')");
                    } catch (error) {
                        console.log(error);
                        eval(callback + "('{\"erro\":\""+error+"\"}','"+request.status+"','"+idForm+"')");
                    }
                } else if (request.readyState == 4 && request.status == 500) {
                    if (callback != null) {
                        eval(callback + "('Internal Server Error','"+request.status+"','"+idForm+"')");
                    } else {
                        alert("500 Internal Server Error");
                    }
                } else if (request.readyState == 4 && (request.status == 404 || request.status == 501)) {
                    if (callback != null) {
                        eval(callback + "('Not Implemented','"+request.status+"','"+idForm+"')");
                    } else {
                        alert("501 Not Implemented");
                    }
                } else if (request.readyState == 4 && request.status == 502) {
                    if (callback != null) {
                        eval(callback + "('Bad Gateway','"+request.status+"','"+idForm+"')");
                    } else {
                        alert("502 Bad Gateway");
                    }
                } else if (request.readyState == 4 && (request.status == 0 || request.status == 503)) {
                    if (callback != null) {
                        eval(callback + "('Service Unavailable','"+request.status+"','"+idForm+"')");
                    } else {
                        alert("503 Service Unavailable");
                    }
                } else if (request.readyState == 4 && request.status == 504) {
                    if (callback != null) {                        
                        eval(callback + "('Gateway Timeout','"+request.status+"','"+idForm+"')");
                    } else {
                        alert("504 Gateway Timeout");
                    }
                } else if (request.readyState == 4 && request.status == 505) {
                    if (callback != null) {
                        eval(callback + "('HTTP Version Not Supported','"+request.status+"','"+idForm+"')");
                    } else {
                        alert("505 HTTP Version Not Supported");
                    }
                }
            };
            var data = "";
            if (method == "POST" || method == "PUT") {
                data = object;//"request=" + JSON.stringify(object);
            }
            request.send(data);
        }

        function getForm(idForm) {
            var one = true;
            var option = true;
            var get = "";
            var repeat = false;

            if (gI("gz-form"+idForm) != undefined) {
                var fields = gI("gz-form"+idForm);
                
                for (var i = 0; i < gL(fields); i++) {
                    if (gY(fields.elements[i]) != "submit") {
                        if (i == 0 || repeat) {
                            repeat = false;

                            if (gY(fields.elements[i]) == "checkbox") 
                                get = fields.elements[i].checked;
                            else {
                                if (gC(fields.elements[i]).indexOf("gz-option") > 0) {
                                    var options = fields.elements[i].options;
                                    
                                    for (var j = 0; j < options.length; j++) {
                                        option = false;
                                        
                                        if (j == 0)
                                            get = options[j].value;
                                        else
                                            get += "<,>" + options[j].value;
                                    }
                                } else {
                                    if (gY(fields.elements[i]) == "textarea") {
                                        /*
                                        * @see nicEdit.js
                                        */	
                                        var textStyle = document.getElementsByClassName("nicEdit-main");
                                        
                                        if (gH(textStyle[0]) != undefined)
                                            get = gH(textStyle[0]);			
                                        else {
                                            var normalized_enters = gV(fields.elements[i]).replace(/\r|\n/g, "\r\n");
                                            var text_with_br = normalized_enters.replace(/\r\n/g, "<br />");
                                            
                                            get = (gL(gV(fields.elements[i])) == 0) ? 
                                                    "null" : text_with_br;
                                        }
                                    } else {
                                        if (gC(fields.elements[i]).includes("gz-datalist-") > 0) {
                                            var datalist = gC(fields.elements[i]).split("gz-datalist-")[1];
                                            for (var j = 0; j < gI(datalist.split("-to-")[0]).options.length; j++) {
                                                if (gI(datalist.split("-to-")[0]).options[j].value == 
                                                        document.getElementsByName(datalist.split("-to-")[1])[0].value) {
                                                    get = gI(datalist.split("-to-")[0]).options[j].getAttribute("data-id");
                                                    j = gI(datalist.split("-to-")[0]).options.length;
                                                }
                                            }
                                        } else if (gY(fields.elements[i]) == "file")
                                            repeat = true;
                                        else			
                                            get = (gL(gV(fields.elements[i])) == 0) ? 
                                                    "null" : gV(fields.elements[i]);
                                    }
                                }
                            }
                        } else {
                            if (gY(fields.elements[i]) == "checkbox") 
                                get += "<gz>" + fields.elements[i].checked;
                            else {
                                if (gC(fields.elements[i]).indexOf("gz-option") > 0) {
                                    var options = fields.elements[i].options;
                                    
                                    for (var j = 0; j < options.length; j++) {
                                        if (option)
                                            get += options[j].value;
                                        else
                                            get += "<,>" + options[j].value;
                                    }
                                } else {	
                                    if (gY(fields.elements[i]) == "textarea") {
                                        /*
                                        * @see nicEdit.js
                                        */
                                        var textStyle = document.getElementsByClassName("nicEdit-main");

                                        if (gH(textStyle[0]) != undefined)
                                            get += "<gz>" + gH(textStyle[0]);				
                                        else {
                                            var normalized_enters = gV(fields.elements[i]).replace(/\r|\n/g, "\r\n");
                                            var text_with_br = normalized_enters.replace(/\r\n/g, "<br />");
                                            
                                            get += "<gz>" + 
                                                    ((gL(gV(fields.elements[i])) == 0) 
                                                    ? "null" : text_with_br);
                                        }
                                    } else {
                                        if (gC(fields.elements[i]).includes("gz-datalist-") > 0) {
                                            var datalist = gC(fields.elements[i]).split("gz-datalist-")[1];
                                            for (var j = 0; j < gI(datalist.split("-to-")[0]).options.length; j++) {
                                                if (gI(datalist.split("-to-")[0]).options[j].value == 
                                                        document.getElementsByName(datalist.split("-to-")[1])[0].value) {
                                                    if (get != "") {
                                                        get += "<gz>" + gI(datalist.split("-to-")[0]).options[j].getAttribute("data-id");
                                                    } else {	
                                                        get += gI(datalist.split("-to-")[0]).options[j].getAttribute("data-id");
                                                    }
                                                    j = gI(datalist.split("-to-")[0]).options.length;
                                                }
                                            }
                                        } else if (gY(fields.elements[i]) != "file") {
                                            if (get != "") {
                                                one = false;
                                                
                                                get += "<gz>" + 
                                                        ((gL(gV(fields.elements[i])) == 0) 
                                                        ? "null" : gV(fields.elements[i]));
                                            } else {
                                                one = true;
                                                
                                                get += ((gL(gV(fields.elements[i])) == 0) 
                                                        ? "null" : gV(fields.elements[i]));	
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if (one)
                get += "<gz>";
                
            return get;
        }
    </script>

</html>