<?php
foreach ($data as $product) {
            echo "<a href='product.php?pid=" . $product["id"] . "'>";
            echo "<div class='productinner'>";
            echo "<div class='imagesize'>";
            echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='products'>";
            echo "</div>";
            echo "<div class='innerinfo'>";
            echo "<br>";
            echo "<br>";
            echo "<b>";
            echo $product["productname"];
            echo "</b>";
            echo "</div> ";
            echo " <p class='pricetext'> € " . $product["price"] . "</p>";
            echo "</div></a>";
        }
