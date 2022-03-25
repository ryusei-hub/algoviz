var nextcord = [0,19];
//var nextcordright = [0,19];
var first = 0;
var last = 19;
var leftelement = "";
var rightelement = "";
var leftpos = "";
var rightpos = "";
var j = 0;
var z = 0;
var pivotValue = 0;
let execute = "";
var position = 0;
var needsort = ["0","bar19"];
function sortleft(){
    position++
    console.log(position);
    if (position<4){
        if(position === 1){
            nextcord = [0,19];
        }else if(position == 2){
            var cord = document.getElementById(needsort[position]).style.left;
            cord = parseInt(cord.replace("px",""))/30;
            nextcord[1] = cord;
        }else if(position == 3){
            var cord = document.getElementById(needsort[position]).style.left;
            cord = parseInt(cord.replace("px",""))/30;
            nextcord[0] = cord;
            nextcord[1] = 19;
        }else{

        }
    }else{
        if (parseInt(needsort[position].replace("bar",""))<1 || parseInt(needsort[position].replace("bar",""))>19){

        }
        else{
            if (position%2 == 0){
                if (parseInt(needsort[position].replace("bar",""))<(parseInt(needsort[position/2].replace("bar","")))){
                    var startcord = 0;
                }
                else{
                    var startcord = document.getElementById(needsort[position/2]).style.left;
                    startcord = parseInt(startcord.replace("px",""))/30+1;
                }
                var finishcord = document.getElementById(needsort[position]).style.left;
                finishcord = parseInt(finishcord.replace("px",""))/30;
                nextcord[1] = finishcord;
                nextcord[0] = startcord;
            }else if (position%2 == 1){
                var left = parseInt(needsort[position].replace("bar",""));
                var right = parseInt(needsort[(position-1)/2+1].replace("bar",""));
                if (left>right){
                    var finishcord = 19;
                }
                else{
                    var finishcord = document.getElementById(needsort[(position-1)/2+1]).style.left;
                    finishcord = parseInt(finishcord.replace("px",""))/30-1;
                }

                var startcord = document.getElementById(needsort[position]).style.left;
                startcord = parseInt(startcord.replace("px",""))/30;
                nextcord[1] = finishcord;
                nextcord[0] = startcord;
            }
        }

    }
    if ((nextcord[0]<0) || ( nextcord[0] == nextcord[1]) || (nextcord[1]>19)){

    }
    else{
        first = nextcord[0];
        last = nextcord[1];
        j = last-1;
        z = first;
        execute = setInterval(partition,200);
        console.log(first);
        console.log(last);
    }

}
function sortright(){
    for (x = 0 ; x <19 ;x++){
        leftelement = document.getElementById("bar"+x.toString());
        rightelement = document.getElementById("bar"+(x+1).toString());
        if(parseInt(leftelement.textContent) > parseInt(rightelement.textContent)){
            rightpos = leftelement.style.left;
            leftpos = rightelement.style.left;
            leftelement.style.left = leftpos;
            rightelement.style.left = rightpos;
            leftelementid = leftelement.id;
            leftelement.id = rightelement.id;
            rightelement.id = leftelementid;
        }
    }
}
function partition(){
    pivotValue = parseInt(document.getElementById("bar"+last.toString()).textContent);
    document.getElementById("bar"+last.toString()).style.backgroundColor = "gray";
    if ((z<=j) && (z < last+1)){
        if (z>=1){
            leftelement.style.backgroundColor = "white";
        }
        if (j<=17){
            rightelement.style.backgroundColor = "white";
        }
        compare();
        z++;
    }
    else{
        leftelement.style.backgroundColor = "white";
        rightelement.style.backgroundColor = "white";
        leftelement = document.getElementById("bar"+z.toString());
        rightelement = document.getElementById("bar"+last.toString());
        rightpos = leftelement.style.left;
        leftpos = rightelement.style.left;
        leftelement.style.left = leftpos;
        rightelement.style.left = rightpos;
        leftelementid = leftelement.id;
        leftelement.id = rightelement.id;
        rightelement.id = leftelementid;
        var nextleft = parseInt(rightpos.replace("px",""))/30 - 1 ;
        var nextright = parseInt(rightpos.replace("px",""))/30 + 1 ;
        clearInterval(execute);
        needsort[position] = leftelementid;
        console.log(needsort.includes("bar"+nextleft.toString()));
        if (needsort.includes("bar"+nextleft.toString())){
            needsort.pop();
            position = position -1
        }
        else{
            needsort.push("bar"+nextleft.toString());
        }
        if (needsort.includes("bar"+nextright.toString())){
            needsort.pop();
            position = position -1
        }
        else{
            needsort.push("bar"+nextright.toString());
        }
        console.log(needsort);
    }
}
function compare(){
    leftelement = document.getElementById("bar"+z.toString());
    leftelement.style.backgroundColor = "blue";
    rightelement = document.getElementById("bar"+j.toString());
    rightelement.style.backgroundColor = "red";
    if(parseInt(leftelement.textContent) >= pivotValue){
        if(parseInt(rightelement.textContent) <= pivotValue){
            rightpos = leftelement.style.left;
            leftpos = rightelement.style.left;
            leftelement.style.left = leftpos;
            rightelement.style.left = rightpos;
            leftelementid = leftelement.id;
            leftelement.id = rightelement.id;
            rightelement.id = leftelementid;
            j = j-1;
        }
        else{
            z = z-1;
            j = j-1;
        }
    }
}
function randgen(){
    var num_of_bars = 20;
    var heightofbars = 1;
    var para = document.createElement("div");
    for(i = 0;i<num_of_bars;i++){
        var para = document.createElement("div");
        heightofbars = Math.floor(Math.random() * 300) + 1;
        heightofbar = "height:"+heightofbars.toString()+"px"
        para.setAttribute('id', 'bar'+i.toString());
        para.textContent = heightofbars;
        para.setAttribute("style",heightofbar+";background:white;width:25px; position: absolute;")
        para.style.bottom = 0 + "px";
        para.style.left = 30*i + "px";
        document.getElementById("container").appendChild(para);
    }
}
