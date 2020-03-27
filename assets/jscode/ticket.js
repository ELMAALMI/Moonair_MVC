
var line_infos = document.getElementById("days-list");
var line_infos_return = document.getElementById("days-list_return");

/* ################################################## 

            NEXT BUTTON FOR FUTURE DAYS

   ################################################## */

function goingNext(method)
{
    if(method == "")
        $("#days-list").hide(200); 
    else
        $("#days-list_return").hide(200);
     
    var last = document.getElementById("last"+method);
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function()
    {
        if (this.readyState==4 && this.status==200)
        {
            if(method == "")
                document.getElementById("days-list").innerHTML= this.responseText;
            else
                document.getElementById("days-list_return").innerHTML= this.responseText;
        }
    }
    if(method == "")
        xhttp.open("GET","phpClass/Ticket.php?key="+last.innerHTML+"&way=next&line_num="+line_infos.dataset.line+"&line_way="+line_infos.dataset.way+"&method="+method,true);
    else
        xhttp.open("GET","phpClass/Ticket.php?key="+last.innerHTML+"&way=next&line_num="+line_infos_return.dataset.line+"&line_way="+line_infos_return.dataset.wayreturn+"&method="+method,true);
    
    xhttp.send();
    if(method == "")
        $("#days-list").show(200); 
    else
        $("#days-list_return").show(200);
     
}
        
/* ################################################## 

            PREVIOUS BUTTON FOR PAST DAYS

   ################################################## */

function goingPrevious(method)
{
    if(method == "")
        $("#days-list").hide(200); 
    else
        $("#days-list_return").hide(200);
    
    var first = document.getElementById("first_row"+method);
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function()
    {
        if (this.readyState==4 && this.status==200)
        {
            if(method == "")
                document.getElementById("days-list").innerHTML= this.responseText;
            else
                document.getElementById("days-list_return").innerHTML= this.responseText;
        }
    }
    if(method == "")
            xhttp.open("GET","phpClass/Ticket.php?key="+first.innerHTML+"&way=prev&line_num="+line_infos.dataset.line+"&line_way="+line_infos.dataset.way+"&method="+method,true);
    else
            xhttp.open("GET","phpClass/Ticket.php?key="+first.innerHTML+"&way=prev&line_num="+line_infos_return.dataset.line+"&line_way="+line_infos_return.dataset.wayreturn+"&method="+method,true);

    xhttp.send();
    if(method == "")
        $("#days-list").show(200); 
    else
        $("#days-list_return").show(200);
    
}

/* ################################################## 

        GENERATING THE TICKET OF CHOOSEN FLIGHT

   ################################################## */
        
function flightDetails(flight_num, method)
{
    var flight_on = document.getElementById("flight-"+flight_num);
    var selector = document.querySelector("#days-list"+method+" .active");
    if(selector != null)
        selector.classList.remove("active");
    flight_on.classList.add("active");
            
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function()
    {
        if (this.readyState==4 && this.status==200)
        {
            if(method != "_return")
                document.getElementById("ticket-container").innerHTML= this.responseText;
            else
                document.getElementById("ticket-container-return").innerHTML= this.responseText;
        }
    }
    if(method != "_return")
        xhttp.open("GET","phpClass/Ticket.php?flight="+flight_num+"&line_num="+line_infos.dataset.line+"&line_way="+line_infos.dataset.way+"&method="+method,true);
    else
        xhttp.open("GET","phpClass/Ticket.php?flight="+flight_num+"&line_num="+line_infos_return.dataset.line+"&line_way="+line_infos_return.dataset.wayreturn+"&method="+method,true);
    xhttp.send();
    if(method != "_return")
        $("#ticket-container").show(350);
    else
        $("#ticket-container-return").show(350);
}

/* ################################################## 

            BUTTON OF HIDING TICKET

   ################################################## */

function hideTicket(method)
{
    if(method != "_return")
    {
        $("#ticket-container").hide(400);
        $("#days-list .active").removeClass("active");
        $("#container_resv").show(200); 
        $("#ticket-container").removeClass("confirmed");
        $(".next.action-button").prop("disabled", true);
        $(".next.action-button").addClass("disabled-btn");
        $(".next.disabled-btn").removeClass("action-button");
    }
    else
    {
        $("#ticket-container-return").hide(400);
        $("#days-list_return .active").removeClass("active");
        $("#container_resv_return").show(200); 
        $("#ticket-container-return").removeClass("confirmed");
        $(".next.action-button").prop("disabled", true);
        $(".next.action-button").addClass("disabled-btn");
        $(".next.disabled-btn").removeClass("action-button");
    }
}

/* ################################################## 

        BUTTON FOR CONFIRMING CHOOSEN TICKET

   ################################################## */

function confirmeTicket()
{   
    $("#container_resv").hide(500);
    $("#ticket-container").addClass("confirmed");
    $(".next.disabled-btn").prop("disabled", false);
    
    $(".next.disabled-btn").addClass("action-button");
    $(".next.action-button").removeClass("disabled-btn");
}

function confirmeTicket_return()
{   
    $("#container_resv_return").hide(500);
    $("#ticket-container-return").addClass("confirmed");
    $(".next.disabled-btn-return").prop("disabled", false);
    
    $(".next.disabled-btn-return").addClass("action-button");
    $(".next.action-button").removeClass("disabled-btn-return");
}

/* ################################################## 

            SWITCHING BETWEEN PASSANGERS FROMS

   ################################################## */

function switchPassanger(passanger_num)
{
    var selector = document.querySelector(".passengers-list-nb .active-passanger");
    selector.classList.remove("active-passanger");
    var lastChar = passanger_num[passanger_num.length -1];
    
    if(passanger_num.toLowerCase().indexOf("adult") >= 0)
        $("#adultNb"+ lastChar).attr('class', 'active-passanger');
    else
        $("#childNb"+ lastChar).attr('class', 'active-passanger');
    $('.passangers-infos').not('#'+passanger_num).hide();
    $('#'+passanger_num).show();
}


/* ################################################## 

                GENERATE PASSANGERS FORM

   ################################################## */


for(var i=0; i< adults; i++)
{
    $(".passengers-list-nb").append("<li id='adultNb"+(i+1)+"' "+((i==0) ? "class='active-passanger'" : "")+" onclick=\"switchPassanger('adult-info-"+(i+1)+"');\"><i class='fa fa-user-\circle'></i> Adult "+(i+1)+"</li>");
    $(".passangers-details").append("<div class='passangers-infos' id='adult-info-"+(i+1)+"' "+((i!=0) ? "style='display: none'" : "")+" '>\
                                        <h3 class='choosen_traveler'>Adult "+(i+1)+"</h3>\
                                        <div class='passenger-form'>\
                                            <p>Last Name <span style='color: red'>*</span></p>\
                                            <p>First Name <span style='color: red'>*</span></p>\
                                            <p>Passport Code <span style='color: red'>*</span></p>\
                                            <input type='text' name='adult_lname_"+(i+1)+"' required/>\
                                            <input type='text' name='adult_fname_"+(i+1)+"' required/>\
                                            <input type='text' name='adult_pcode_"+(i+1)+"' required/>\
                                            <p>Sexe <span style='color: red'>*</span></p>\
                                            <p>Birthday</p>\
                                            <p>Nationality <span style='color: red'>*</span></p>\
                                            <select name='adult_sexe_"+(i+1)+"' required>\
                                                <option></option>\
                                                <option value='Male'>Male</option>\
                                                <option value='Female'>Female</option>\
                                            </select>\
                                            <input type='date' name='adult_birth_"+(i+1)+"' />\
                                            <select name='adult_nationality_"+(i+1)+"' required>\
                                                <option></option>\
                                                <option value='moroccan'>Moroccan</option>\
                                                <option value='moroccan'>Moroccan</option>\
                                                <option value='moroccan'>Moroccan</option>\
                                                <option value='moroccan'>Moroccan</option>\
                                            </select>\
                                            <p>Phone Number</p>\
                                            <i></i>\
                                            <i></i>\
                                            <input type='text' name='adult_phone_"+(i+1)+"' />\
                                        </div>\
                                    </div>");
}

if(childs != 0)
{

    for(var i=0; i< childs; i++)
    {
        $(".passengers-list-nb").append("<li id='childNb"+(i+1)+"' onclick=\"switchPassanger('child-info-"+(i+1)+"');\"><i class='fa fa-user-circle'></i> Child "+(i+1)+"</li>");
        $(".passangers-details").append("<div class='passangers-infos' id='child-info-"+(i+1)+"' style='display: none'>\
                                            <h3 class='choosen_traveler'>Child "+(i+1)+"</h3>\
                                            <div class='passenger-form'>\
                                                <p>Last Name <span style='color: red'>*</span></p>\
                                                <p>First Name <span style='color: red'>*</span></p>\
                                                <p>Passport Code <span style='color: red'>*</span></p>\
                                                <input type='text' name='child_lname_"+(i+1)+"' required/>\
                                                <input type='text' name='child_fname_"+(i+1)+"' required/>\
                                                <input type='text' name='child_pcode_"+(i+1)+"' required/>\
                                                <p>Sexe <span style='color: red'>*</span></p>\
                                                <p>Birthday</p>\
                                                <p>Nationality <span style='color: red'>*</span></p>\
                                                <select name='child_sexe_"+(i+1)+"' required>\
                                                    <option></option>\
                                                    <option value='Male'>Male</option>\
                                                    <option value='Female'>Female</option>\
                                                </select>\
                                                <input type='date' name='child_birth_"+(i+1)+"' />\
                                                <select name='child_nationality_"+(i+1)+"' required>\
                                                    <option></option>\
                                                    <option value='moroccan'>Moroccan</option>\
                                                    <option value='moroccan'>Moroccan</option>\
                                                    <option value='moroccan'>Moroccan</option>\
                                                    <option value='moroccan'>Moroccan</option>\
                                                </select>\
                                            </div>\
                                        </div>");
    }
}
