/* ################################################## 

                CUSTOM DATE PICKER 

   ################################################## */
var dateToday = new Date();
var dates = $("#pick-from, #pick-to").datepicker({
    dateFormat: 'yy-mm-dd',
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "pick-from" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
        
    }
});

/* ################################################## 

            DROPDOWN LIST OF AIRPORTS

   ################################################## */


function dropdownList(input)
{
    if(input == "first")
    {
        $(".dropdown-pin").show(300);
        $(".dropdown-pin").css({"left":"8rem"});
        $(".flying_from").show(300);
        $(".flying_to").hide(300);
    }
    else
    {
        $(".dropdown-pin").show(300);
        $(".dropdown-pin").css({"left":"22rem"});
        $(".flying_to").show(300);
        $(".flying_from").hide(300);
    }
}

/* ################################################## 

        SCROLL DOWN ANIMATION ONLICK THE INPUT

   ################################################## */

function scrollDownInput()
{
    $("html, body").animate({ scrollTop: $(".ftco-animated").offset().top+100 }, 500);
}

/* ################################################## 

        SHOWING SECOND ROW IN RESERVATION FORM 

   ################################################## */

function showCalendar(way)
{
    $("#ndRowResv").show(500);
    
    if(way == "return")
        $("#return-div").show(500);
    else
        $("#return-div").hide(500);
}

/* ################################################## 

                EMPTY FIRST INPUT

   ################################################## */

$('#from-destination').blur(function(){
        if(!$(this).val()){
            $("#to-destination").prop("disabled", true);
        } else{
            $("#to-destination").prop("disabled", false);
        }
    });


/* ################################################## 

                    BUTTON HIDE

   ################################################## */

function btnHide(btnName)
{
    $(btnName).hide(500);
    $(".dropdown-pin").hide(300);
}

/* ################################################## 

                    AUTOCOMPLETE INPUT

   ################################################## */

$('#flying-from').on("click", "li", function(e) {
    e.preventDefault();
    $("#from-destination").val($(this).text());
    $(".dropdown-pin").hide(150);
    $(".flying_from").hide(300);
});

$('#flying-to').on("click", "li", function(e) {
    e.preventDefault();
    $("#to-destination").val($(this).text());
    $(".dropdown-pin").hide(150);
    $(".flying_to").hide(300);
});

/* ################################################## 

                SHOWING LIST OF AIRPORTS

   ################################################## */

function search_from()
{
    var search = document.getElementById("from-destination");
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function()
    {
        if (this.readyState==4 && this.status==200)
        {
            document.getElementById("flying-from").innerHTML= this.responseText;
        }
    }
    if(search.value != "")
        xhttp.open("GET","phpclass/airports.php?fromairp="+search.value,true);
    else
        xhttp.open("GET","phpclass/airports.php?fromairp=none",true);

    xhttp.send();

}


function search_to()
{
    var search = document.getElementById("to-destination");
    var oldInput = document.getElementById("from-destination");
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function()
    {
        if (this.readyState==4 && this.status==200)
        {
            document.getElementById("flying-to").innerHTML= this.responseText;
        }
    }
    if(search.value != "")
        xhttp.open("GET","phpclass/airports.php?fromairp="+oldInput.value+"&toairp="+search.value,true);
    else
        xhttp.open("GET","phpclass/airports.php?toairp=none",true);

    xhttp.send();

}