
        var next = document.getElementById("next_to");
        var previous = document.getElementById("prev_to_date");
        var line_infos = document.getElementById("days-list");

        next.onclick = function()
        {
            $(".available-days-container").hide(200); 
            var last = document.getElementById("last");
            xhttp=new XMLHttpRequest();
            xhttp.onreadystatechange=function()
            {
                if (this.readyState==4 && this.status==200)
                {
                    document.getElementById("days-list").innerHTML= this.responseText;
                }
            }
            xhttp.open("GET","phpClass/Ticket.php?key="+last.innerHTML+"&way=next&line_num="+line_infos.dataset.line+"&line_way="+line_infos.dataset.way,true);
            console.log("GET","phpClass/Ticket.php?key="+last.innerHTML+"&way=next&line_num="+line_infos.dataset.line+"&line_way="+line_infos.dataset.way,true);
            xhttp.send();
            $(".available-days-container").show(200); 
        }
        
        previous.onclick = function()
        {
            $(".available-days-container").hide(200); 
            var first = document.getElementById("first_row");
            xhttp=new XMLHttpRequest();
            xhttp.onreadystatechange=function()
            {
                if (this.readyState==4 && this.status==200)
                {
                    document.getElementById("days-list").innerHTML= this.responseText;
                }
            }
            xhttp.open("GET","phpClass/Ticket.php?key="+first.innerHTML+"&way=prev&line_num="+line_infos.dataset.line+"&line_way="+line_infos.dataset.way,true);
            xhttp.send();
            $(".available-days-container").show(200); 
        }
        
        function flightDetails(flight_num)
        {
            var flight_on = document.getElementById("flight-"+flight_num);
            var selector = document.querySelector(".available-days-container .active");
            if(selector != null)
                selector.classList.remove("active");
            flight_on.classList.add("active");
            
            xhttp=new XMLHttpRequest();
            xhttp.onreadystatechange=function()
            {
                if (this.readyState==4 && this.status==200)
                {
                    document.getElementById("ticket-container").innerHTML= this.responseText;
                }
            }
            xhttp.open("GET","phpClass/Ticket.php?flight="+flight_num+"&line_num="+line_infos.dataset.line+"&line_way="+line_infos.dataset.way,true);
            xhttp.send();
            $("#ticket-container").show(350);
        }

function hideTicket()
{
    $("#ticket-container").hide(400);
    $(".available-days-container .active").removeClass("active");
    $("#container_resv").show(200); 
    $(".ticket").removeClass("confirmed");
}

function confirmeTicket()
{
    $("#container_resv").hide(500);
    $(".ticket").addClass("confirmed");
}
        
