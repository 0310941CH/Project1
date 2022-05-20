
function dropdown(number) {
    var dropdownnumber = 'dropdownicon' + number;
    var dropdownlist = 'list' + number;
    var colorbottom = 'colorbottom' + number;
    var tab = 'tab' + number;
    if(document.getElementById(dropdownnumber).style.transform != 'rotate(180deg)') {
        document.getElementById(dropdownnumber).style.transition = '0.4s ease-in-out';
    document.getElementById(dropdownnumber).style.transform = 'rotate(180deg)';
    document.getElementById(dropdownlist).style.display = 'block';
    document.getElementById(colorbottom).style.display = 'block';
    console.log("open");
    var opacity = 0;
    opacitychanger();
    function opacitychanger() {
        if(opacity<1) {
            if(document.getElementById(tab).classList.contains('tabs2')) {
                document.getElementById('tab4').style.filter  = 'none';

            }
            opacity = opacity + 0.01;
            document.getElementById(tab).style.color = 'black';
            document.getElementById(tab).style.backgroundColor = 'var(--blackorwhitebackground)';
            document.getElementById(dropdownnumber).style.filter  = 'none';
            setInterval(opacitychanger,20)
            document.getElementById(dropdownlist).style.opacity = opacity;
            document.getElementById(colorbottom).style.opacity = opacity;
        
        }
    }
    }
    else {document.getElementById(dropdownnumber).style.transition = '0.4s ease-in-out';
    document.getElementById(dropdownnumber).style.transform = 'rotate(0deg)';
    var opacity = 1;
    opacitychanger2();
    function opacitychanger2() {
        if(opacity>0) {
            opacity = opacity - 1;
            document.getElementById(dropdownlist).style.opacity = opacity;

            if(!document.getElementById(tab).classList.contains('selectedtab')) {
                document.getElementById(dropdownnumber).style.filter  = 'var(--imagefilterwhite)';
                document.getElementById(tab).style.color = 'white';
                document.getElementById(tab).style.backgroundColor = 'rgba(0, 0, 0, 0)';
            }
            if(document.getElementById(tab).classList.contains('tabs2')) {
                document.getElementById('tab4').style.filter  = 'var(--imagefilterwhite)';

            }

            
            document.getElementById(colorbottom).style.opacity = opacity;
            setTimeout(() => {
                document.getElementById(dropdownlist).style.display = 'none';
                document.getElementById(colorbottom).style.display = 'none';
                console.log("close");
            }, 200);


        }
    }
}

}