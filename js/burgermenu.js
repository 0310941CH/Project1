
function iconchange() { 
    //looks if it needs to go up or down
    if (document.getElementById("burgerline1").style.top !== "10px") 
{
    //makes the cross icon (animated)
    document.getElementById("burgerline1").style.top = "10px"
    document.getElementById("burgerline1").style.transform = "rotate(45deg)";
    document.getElementById("burgerline3").style.top = "-10px"
    document.getElementById("burgerline3").style.transform = "rotate(135deg)";
    //hides the middle line
    document.getElementById("burgerline2").style.backgroundColor = "rgba(0, 0, 0, 0)";
    //changes the color
    document.getElementById("burgerline3").style.backgroundColor = "black"
    document.getElementById("burgerline1").style.backgroundColor = "black"
    document.getElementById("burgerlines").style.backgroundColor = "white"
    //makes the items menu visable
    document.getElementById("burgermenuitems").style.display= "flex"
    var count = 0;
    //slowly loops tru
    setTimeout(itemshower, 50)
    function itemshower() {

        try {
            //sets the opacity to 1 and makes it visable
            document.getElementById("burgermenuitems").children[count].children[0].style.opacity = "1"
            document.getElementById("burgermenuitems").children[count].style.opacity = "1"
        document.getElementById("burgermenuitems").children[count].style.display = "flex"
        //adds one to go to the next list element
        count++
        //repeats untill error
        setTimeout(itemshower, 50);
        }
        catch {
            //saves the number of the list element where it crashed
            localStorage.setItem('countofmenus', count)
        }
    
}
    
}
else {
     //makes the burger icon (animated)
    document.getElementById("burgerline1").style.top = "0px"
    document.getElementById("burgerline1").style.transform = "rotate(0deg)";
    document.getElementById("burgerline3").style.top = "0px"
    document.getElementById("burgerline3").style.transform = "rotate(0deg)";
     //shows the middle line
    document.getElementById("burgerline2").style.backgroundColor = "white";
    //changes the color
    document.getElementById("burgerline1").style.backgroundColor = "white"
    document.getElementById("burgerline3").style.backgroundColor = "white"
    document.getElementById("burgerlines").style.backgroundColor = ""
    //gets the amount of list items
    var count = localStorage.getItem('countofmenus') -1;
        //slowly loops tru
    setTimeout(itemhider, 50)
    function itemhider() {

        try {
            //sets the opacity to 1 and makes it invisable
        document.getElementById("burgermenuitems").children[count].style.opacity = "0"
        document.getElementById("burgermenuitems").children[count].children[0].style.opacity = "0"
        //subtracts one to go to the next list element
        count--
        //repeats untill error
        setTimeout(itemhider, 50);
        }
        catch {
            //hides the whole burgermenu items
            document.getElementById("burgermenuitems").style.display = "none";
        }
    
}
    
}
}