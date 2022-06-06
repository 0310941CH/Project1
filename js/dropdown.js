
function dropdown(number) {try {
    // all variabeles getis the idname with the number of the dropdown
    var dropdownnumber = 'dropdownicon' + number;
    var dropdownlist = 'list' + number;
    var colorbottom = 'colorbottom' + number;
    var tab = 'tab' + number;
    //looks if it needs to go up or down
    if(document.getElementById(dropdownnumber).style.transform != 'rotate(180deg)') {
    // turns the dropdown image upside down
    document.getElementById(dropdownnumber).style.transform = 'rotate(180deg)';
    //displays the list with items and the buttom color anch changes the color of text and background
    document.getElementById(dropdownlist).style.display = 'block';
    document.getElementById(colorbottom).style.display = 'block';
    document.getElementById(tab).style.color = 'var(--blackorwhitetextcolor)';
    document.getElementById(tab).style.backgroundColor = 'var(--blackorwhitebackground)';
    //slowly changes the opacity to fade in the dropdown smooth
    var opacity = 0;
    opacitychanger();
    function opacitychanger() {
        if(opacity<1) {
            //checks if its the login dropdown to change the color of the image
            if(document.getElementById(tab).classList.contains('tabs2')) {
                document.getElementById('tab4').style.filter  = 'none';
            }
            opacity = opacity + 0.01;
            //changes color of dropdown icon
            document.getElementById(dropdownnumber).style.filter  = 'none';
            setInterval(opacitychanger,20)
            //sets the opacity to dropdownlist and the colorbottom
            document.getElementById(dropdownlist).style.opacity = opacity;
            document.getElementById(colorbottom).style.opacity = opacity;
        
        }
    }
    }
    //runs when dropdown needs to go up
    else {document.getElementById(dropdownnumber).style.transition = '0.4s ease-in-out';
    //rotates image to go up
    document.getElementById(dropdownnumber).style.transform = 'rotate(0deg)';
        //slowly changes the opacity to fade out the dropdown smooth

    opacitychanger2();
    function opacitychanger2() {
            opacity = 0;
            document.getElementById(dropdownlist).style.opacity = opacity;
            //checks if your allready in the tab or not
            if(!document.getElementById(tab).classList.contains('selectedtab') && (!document.getElementById(tab).classList.contains('selectedlogin'))) {
                document.getElementById(dropdownnumber).style.filter  = 'var(--imagefilterwhite)';
                document.getElementById(tab).style.color = 'white';
                document.getElementById(tab).style.backgroundColor = 'rgba(0, 0, 0, 0)';
            }
                //checks if its the logindropdown to change the color of the image
            if(document.getElementById(tab).classList.contains('tabs2') && (!document.getElementById(tab).classList.contains('selectedlogin'))) {
                document.getElementById('tab4').style.filter  = 'var(--imagefilterallwayswhite)';

            }

            
            document.getElementById(colorbottom).style.opacity = opacity;
            //sets the display to none when it is fully faded out
            setTimeout(() => {
                document.getElementById(dropdownlist).style.display = 'none';
                document.getElementById(colorbottom).style.display = 'none';
                
            }, 200);


        
    }
}
} catch (error) {
    console.log("DROPDOWN ERROR");

  }
}
