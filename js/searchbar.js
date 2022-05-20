
function searchbarshower() {
    
    document.getElementById('search2').style.padding = ' 5px 5px 5px 200px';
    document.getElementById('search2').style.transition = '0.4s ease-in-out';
    setTimeout(searchbarshower2,400)
    document.getElementById('submitbutton').style.display = 'block';


}
function searchbarshower2() {
<<<<<<< HEAD
    document.getElementById('search').style.display = 'inline-block';
    document.getElementById('search').style.width = '150px';
    document.getElementById('xicon').style.display = 'inline-block';
=======
    document.getElementById('search').style.display = 'block';
    document.getElementById('search').style.width = '150px';
    document.getElementById('xicon').style.display = 'block';
>>>>>>> 75e74c4b65e5c018865d37685dadc2d16afaae25
}

function searchbarhider() {
    document.getElementById('search').style.display = 'none';
    document.getElementById('search').style.width = '0px';
    document.getElementById('xicon').style.display = 'none';
    document.getElementById('search2').style.padding = ' 5px 5px 5px 5px';
    document.getElementById('submitbutton').style.display = 'none';
<<<<<<< HEAD
}
function a()
{
document.write("<form id='form1' name='form1'action=''>");
document.write(" <td><input name='name' type='text' id='name'/></td>");
 document.write("<td><input name='address' type='text' id='address'/></td>");
=======
>>>>>>> 75e74c4b65e5c018865d37685dadc2d16afaae25
}