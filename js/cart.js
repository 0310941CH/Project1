function cartUp(number) { // To add a number to the quantity at shoppingcart.php & calculate the price with updated quantity
    var quantity = "quantity" + number; //quantity + id number
    if (document.getElementById(quantity).value < 10) {
        document.getElementById(quantity).stepUp(); // Adds 1 to the quantity
        document.getElementById("cartcount").stepUp(); // Adds 1 to total products
        var price = "priceOutput" + number; //PriceOutput + id number
        var productPrice = "productPrice" + number; //ProductPrice + id number
        var cost = document.getElementById(productPrice).value;// Gets the product price
        var productQuantity = document.getElementById(quantity).value;// Gets the quantity
        var outputPrice = productQuantity * cost; // Calculate total price
        document.getElementById(price).value = "€ " + outputPrice; // Output the total price back to shoppingcart.php
    }
}

function cartDown(number) { // To substract a number to the quantity at shoppingcart.php & calculate the price with updated quantity
    var quantity = "quantity" + number;
    if (document.getElementById(quantity).value > 1) {
        document.getElementById(quantity).stepDown(); // Substracts 1 from the quantity
        document.getElementById("cartcount").stepDown();
        var price = "priceOutput" + number;
        var productPrice = "productPrice" + number;
        var cost = document.getElementById(productPrice).value;
        var productQuantity = document.getElementById(quantity).value;
        var outputPrice = cost * productQuantity;
        document.getElementById(price).value = "€ " + outputPrice;
    }
}
// update total price of the shoppingcart 
function total() {
    var totalloop = true;
    var count = 0;
    var totalprice = 0;
    while (totalloop == true) {
        count++
        var productprice2 = "priceOutput" + count;
        try {
            if (typeof document.getElementById(productprice2).value != "undefined") { // update price if value is not undefined
                var price2 = parseInt(document.getElementById(productprice2).value.replace("€", ""));
                totalprice += price2
            }
        }
        catch {
            document.getElementById("priceTotal").value = "€ " + totalprice;
            var totalloop = false;
        }

    }
}
