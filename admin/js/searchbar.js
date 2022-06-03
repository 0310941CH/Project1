
function searchbarshower() {try {
    //slides out the image padding
    document.getElementById('search2').style.padding = ' 5px 5px 5px 200px';
    document.getElementById('search2').style.transition = '0.4s ease-in-out';
    setTimeout(searchbarshower2,400)
    //makes the hidden send button visible ontop top thhe search icon
    document.getElementById('submitbutton').style.display = 'block';
} catch (error) {
    console.error("CANT SHOW SEARCHBAR");

  }

}
//showes the other partes then the slide is over
function searchbarshower2() {try {
    //shows the iput field and crossicon to close 
    document.getElementById('search').style.display = 'block';
    document.getElementById('search').style.width = '150px';
    document.getElementById('xicon').style.display = 'block';
} catch (error) {
    console.error("CANT SHOW SEARCHBAR");

  }
}

function searchbarhider() {
    try {
        //hides the inputfield and crossicon
    document.getElementById('search').style.display = 'none';
    document.getElementById('search').style.width = '0px';
    document.getElementById('xicon').style.display = 'none';
    //slides in the image padding
    document.getElementById('search2').style.padding = ' 5px 5px 5px 5px';
    //hides the submit button
    document.getElementById('submitbutton').style.display = 'none';
} catch (error) {
    console.error("CANT CLOSE SEARCHBAR");

  }
}