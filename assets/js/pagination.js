const paginationssection = document.getElementById("flightpgination");
const numpagination      = document.getElementById("numpagination");
var currentpage = 1;


var flight = [];
 xhttp=new XMLHttpRequest();
 xhttp.onreadystatechange=function()
    {
        if (this.readyState==4 && this.status==200)
        {
            for(let i in JSON.parse(this.this.responseText))
            {
                flight.push(JSON.parse(this.this.responseText)[i]);
            }
        }
    }
 xhttp.open("GET","AjaxSearchController?destination=true",true);
 xhttp.send();
var numpage = Math.ceil(flight.length/12);

 if(currentpage == 1)
 {
     for(let i = 0; i<flight.length ; i++)
     {

     }
 }