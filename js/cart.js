function cartUp(number) {
    var quantity = "quantity" + number;
    console.log(quantity)
    document.getElementById(quantity).stepUp();
}

function cartDown(number) {
    var quantity = "quantity" + number;
    console.log(quantity)
    document.getElementById(quantity).stepDown();
}