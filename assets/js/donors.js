function display(evt, tabname) {
    var i, buttons, tabcontent;
    tabcontent = document.getElementsByClassName("content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    if (tabname == "organ") {
        document.getElementById("mapbtn").style.display = "none";
    }
    else {
        document.getElementById("mapbtn").style.display = "block";
    }
    buttons = document.getElementsByClassName('tabs');
    for (i = 0; i < buttons.length; i++) {
        buttons[i].className = buttons[i].className.replace("btn-danger", " btn-outline-danger ");
    }
    document.getElementById(tabname).style.display = "block";
    evt.currentTarget.className = "btn btn-danger btn-lg tabs mt-2";
}