<?php
foreach ($data as $product) {
            echo "<a href='product.php?pid=" . $product["id"] . "'>";
            echo "<div class='productinner'>";
            echo "<div class='imagesize'>";
            echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='products'>" . "<br>";
            echo "</div>" . "<br>";
            echo "<div class='innerinfo'>";
            echo $product["productname"] . "<br>";
            echo "</div> " . "<br>";
            echo "<div class='pricebutton'>";
            echo "€ " . $product["price"];
            echo "<br>";
            echo "<br>";
            echo "</div>";
            echo "</div></a>";
        }
