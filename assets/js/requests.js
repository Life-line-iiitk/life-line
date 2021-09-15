function toggledata() {
    var x = document.getElementsByClassName("urgent");
    var i;
    for (i = 0; i < x.length; i++) {
        if (x[i].style.display === "none") {
            x[i].style.display = "block";
        } else {
            x[i].style.display = "none";
        }
    }

    setTimeout(toggledata, 1300);
}

function display(evt, tabname) {
    var i, buttons, tabcontent;
    tabcontent = document.getElementsByClassName("content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    buttons = document.getElementsByClassName('tabs');
    for (i = 0; i < buttons.length; i++) {
        buttons[i].className = buttons[i].className.replace("btn-danger", " btn-outline-danger ");
    }
    document.getElementById(tabname).style.display = "block";
    evt.currentTarget.className = "btn btn-danger btn-lg tabs mt-2";
}