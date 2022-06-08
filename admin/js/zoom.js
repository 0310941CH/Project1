function zoomin(number) {try {
    //puts the flyerid in an variable
    var flyer = 'flyer' + number;
    //puts the childs in an variable
    var texttop = document.getElementById(flyer).children[0];
    var imagemiddle = document.getElementById(flyer).children[1];
    var buttonbottom = document.getElementById(flyer).children[2];
    //changes styling
    texttop.style.fontSize = '20px';
    texttop.style.width = '200px';
    texttop.style.padding = '25px';
    buttonbottom.style.width = '200px';
    buttonbottom.style.padding = '25px';
    imagemiddle.style.width = '250px';
}catch (error) {
        console.log("DROPDOWN ERROR");
    
      }
}
function zoomout(number) {try {
    //puts the flyerid in an variable
    var flyer = 'flyer' + number;
    //puts the childs in an variable
    var texttop = document.getElementById(flyer).children[0];
    var imagemiddle = document.getElementById(flyer).children[1];
    var buttonbottom = document.getElementById(flyer).children[2];
    //removes styling
    texttop.style.fontSize = '';
    texttop.style.width = '';
    texttop.style.padding = '';
    buttonbottom.style.width = '';
    buttonbottom.style.padding = '';
    imagemiddle.style.width = '';
}catch (error) {
    console.log("DROPDOWN ERROR");

  }
}