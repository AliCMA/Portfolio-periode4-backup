/* Hier maak je een variabelen voor alle games */
let allGames = document.getElementsByClassName("game");

/* Nu lopen we door allGames met een forloop */
//for(let i = 0; i < allGames.length; i++){
//}


window.scrollTo(0,0);
setInterval(function(){
    	document.getElementsByTagName("body")[0].style.overflow = "auto";
},1500);

/* Zo haal je de filters op, want alle checkboxes hebben een class van filter */
let filters = document.getElementsByClassName("filter");
for(let i = 0; i < filters.length; i++){
    filters[i].checked = true;
}



//soulslike filter
//als je op de filter klikt staat het aan en uit bij de console
let soulslikeFilter = document.getElementById("checkbox-soulslike");
soulslikeFilter.onchange = function(){
    if(soulslikeFilter.checked === true){
        for(let i = 0; i < allGames.length; i++){
            if(allGames[i].dataset.category === "soulslike"){
                allGames[i].style.display = "block";
            }
        }
    }
        else{
            /* Nu lopen we door allGames met een forloop */
            for(let i = 0; i < allGames.length; i++){
            if(allGames[i].dataset.category === "soulslike"){
                allGames[i].style.display= "none";
            }
        } 
    }
}


let rpgFilter = document.getElementById("checkbox-rpg");
rpgFilter.onchange = function(){
    if(rpgFilter.checked === true){
        for(let i = 0; i < allGames.length; i++){
            if(allGames[i].dataset.category === "rpg"){
                allGames[i].style.display = "block";
            }
        }
    }
        else{
            /* Nu lopen we door allGames met een forloop */
            for(let i = 0; i < allGames.length; i++){
            if(allGames[i].dataset.category === "rpg"){
                allGames[i].style.display= "none";
            }
        } 
    }
}


let actionFilter = document.getElementById("checkbox-action");
actionFilter.onchange = function(){
    if(actionFilter.checked === true){
        for(let i = 0; i < allGames.length; i++){
            if(allGames[i].dataset.category === "action"){
                allGames[i].style.display = "block";
            }
        }
    }
        else{
            /* Nu lopen we door allGames met een forloop */
            for(let i = 0; i < allGames.length; i++){
            if(allGames[i].dataset.category === "action"){
                allGames[i].style.display= "none";
            }
        } 
    }
}


