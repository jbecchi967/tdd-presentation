<?php

require_once "sources/ProductsRepository.php";

$productsRepository = new ProductsRepository();

?>

<!DOCTYPE html>
<html>
<title>Demo project</title>
<body>
<div>
    <table>
        <tr>
            <th>Product</th>
            <th>Inventory</th>
            <th>Sold</th>
        </tr>
        <?php $products = $productsRepository->findAll(); ?>

        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['description'] ?> </td>
                <td><?php echo $product['inventory'] ?></td>
                <td><?php echo $product['sold'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</br>
<p>Calculator:</p>
<form action="" method="post">
    <table>
        <tr>
            <td><input type="number" name="number1" id="input_first"/></td>
        </tr>
        <tr>
            <td><input type="number" name="number2" id="input_second"/></td>
        </tr>
        <tr>
            <td>
                <button type="submit" id="btn_plus" name="btn_plus">+</button>
                <button type="submit" id="btn_minus" name="btn_minus">-</button>
            </td>
        </tr>
        <tr>
            <td><label id="label_result"><?php

                    if (isset($_POST['btn_plus'])) {
                        $result = $_POST['number1'] + $_POST['number2'];
                        echo $result;
                    }

                    if (isset($_POST['btn_minus'])) {
                        $result = $_POST['number1'] - $_POST['number2'];
                        echo $result;
                    }

                    ?></label></td>
        </tr>
    </table>
</form>

</br>
<p>Order:</p>
<form>
    <table>
        <tr>
            <td><label id="label_product">Product: </label></td>
            <td><input type="text" name="product[name]" id="input_product"/></td>
        </tr>
        <tr>
            <td><label id="label_amount">Amount: </label></td>
            <td><input type="number" name="product[amount]" id="input_amount"/></td>
        </tr>
        <tr>
            <td>
                <button type="submit" id="btn_order">Order</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>