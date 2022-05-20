function zoomin(number) {
    var flyer = 'flyer' + number;
    var texttop = document.getElementById(flyer).children[0];
    var imagemiddle = document.getElementById(flyer).children[1];
    var buttonbottom = document.getElementById(flyer).children[2];
    texttop.style.fontSize = '25px';
    texttop.style.width = '250px';
    texttop.style.padding = '25px';
    buttonbottom.style.width = '250px';
    buttonbottom.style.padding = '25px';
    imagemiddle.style.width = '300px';

}
function zoomout(number) {
    var flyer = 'flyer' + number;
    var texttop = document.getElementById(flyer).children[0];
    var imagemiddle = document.getElementById(flyer).children[1];
    var buttonbottom = document.getElementById(flyer).children[2];
    texttop.style.fontSize = '';
    texttop.style.width = '';
    texttop.style.padding = '';
    buttonbottom.style.width = '';
    buttonbottom.style.padding = '';
    imagemiddle.style.width = '';
}