
function searchbarshower() {
    
    document.getElementById('search2').style.padding = ' 5px 5px 5px 200px';
    document.getElementById('search2').style.transition = '0.4s ease-in-out';
    setTimeout(searchbarshower2,400)
    document.getElementById('submitbutton').style.display = 'block';


}
function searchbarshower2() {
    document.getElementById('search').style.display = 'block';
    document.getElementById('search').style.width = '150px';
    document.getElementById('xicon').style.display = 'block';
}

function searchbarhider() {
    document.getElementById('search').style.display = 'none';
    document.getElementById('search').style.width = '0px';
    document.getElementById('xicon').style.display = 'none';
    document.getElementById('search2').style.padding = ' 5px 5px 5px 5px';
    document.getElementById('submitbutton').style.display = 'none';
}