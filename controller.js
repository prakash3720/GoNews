window.addEventListener("load",init);

function init()
{
    ajaxnews('https://newsapi.org/v2/top-headlines?country=in&apiKey=a1af60f84c7d4b3eb142e47bf65dd34d');
   
    document.querySelector(".slider").addEventListener("click",openslidemenu);    
    document.querySelector(".btn-close").addEventListener("click",closeslidemenu);
    var nm= document.querySelectorAll(".main-nav a , .side-nav :not(:first-child)");
    for(var i=0; i<nm.length;i++)
	{
        nm[i].addEventListener("click",getData);
    }

   document.querySelector("header h1 a").addEventListener("click",loadhome);

}

function loadhome()
{
    document.querySelector(".news").innerHTML="";
    ajaxnews('https://newsapi.org/v2/top-headlines?country=in&apiKey=a1af60f84c7d4b3eb142e47bf65dd34d');
}


function getData(event)
{
	var a=event.target.innerHTML;
    document.querySelector(".news").innerHTML="";
    ajaxnews('https://newsapi.org/v2/top-headlines?country=in&category='+a+'&apiKey=a1af60f84c7d4b3eb142e47bf65dd34d');
}

function openslidemenu()
{
    document.querySelector("#side-menu").style.width='250px';
    document.querySelector("#side-menu").style.zIndex='20';

}
function closeslidemenu(){
    document.querySelector("#side-menu").style.width='0';
}



function getDate()
{
    var today = new Date();
    var weekday = new Array(7);
	weekday[0] =  "Sunday";
	weekday[1] = "Monday";
	weekday[2] = "Tuesday";
	weekday[3] = "Wednesday";
	weekday[4] = "Thursday";
	weekday[5] = "Friday";
	weekday[6] = "Saturday";
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear()+'<br>'+' ('+weekday[today.getDay()]+')';
    document.querySelector(".date").innerHTML=date;
}


function addItem(a)
{
 
    document.querySelector(".news").innerHTML=document.querySelector(".news").innerHTML+` <section class="info"><img src="${a.urlToImage}" alt="news"> <div><h2>${a.title}</h2>  <p>${a.description}</p> <a href="${a.url}" >Read More</a> </div> </section>`;
    
}