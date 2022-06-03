function iconchange() { if (document.getElementById("burgerline1").style.top !== "10px")
{
    document.getElementById("burgerline1").style.top = "10px"
    document.getElementById("burgerline1").style.transform = "rotate(45deg)";
    document.getElementById("burgerline3").style.top = "-10px"
    document.getElementById("burgerline3").style.transform = "rotate(135deg)";
    document.getElementById("burgerline2").style.backgroundColor = "rgba(0, 0, 0, 0)";
}
else {
    document.getElementById("burgerline1").style.top = "0px"
    document.getElementById("burgerline1").style.transform = "rotate(0deg)";
    document.getElementById("burgerline3").style.top = "0px"
    document.getElementById("burgerline3").style.transform = "rotate(0deg)";
    document.getElementById("burgerline2").style.backgroundColor = "white";
}
}