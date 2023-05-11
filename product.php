<?php
require('koneksi.php');
?>

<!DOCTYPE html>
<html>

<body>
        <h1>Classic Models</h1>
        <div>
            <a href="#product" id="#product">Product</a>
            <a href="index.php" id="#customers">Customers</a>
        </div>
        <table border="2" cellpadding="5" cellspacing="4">
            <thead>
                <tr bgcolor="#DC9238">
                    <th colspan="10">Products</th>
                </tr>
                <tr class="button-insert">
                <tr bgcolor="#DC9217">
                    <th colspan="12">
                        <button class="home-button"><a href="insert-product.php" id="#insert">Insert</a></button>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Line</th>
                    <th>Product Scale</th>
                    <th>Product Vendor</th>
                    <th>Product Description</th>
                    <th>Quantity InStock</th>
                    <th>Buy Price</th>
                    <th>MSRP</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM products";
                $result = $conn->query($query);
                $i = 1; ?>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["productCode"] ?></td>
                    <td><?php echo $row["productName"] ?></td>
                    <td><?php echo $row["productLine"] ?></td>
                    <td><?php echo $row["productScale"] ?></td>
                    <td><?php echo $row["productVendor"] ?></td>
                    <td><?php echo $row["productDescription"] ?></td>
                    <td><?php echo $row["quantityInStock"] ?></td>
                    <td><?php echo $row["buyPrice"] ?></td>
                    <td><?php echo $row["MSRP"] ?></td>
                    <td>
                        <a href="updateproduct.php?productCode=<?php echo $row["productCode"]; ?>"
                            class="buttons">Update</a>
                        <form method="POST" action="deleteproduct.php">
                            <input type="hidden" name="productCode" value="<?php echo $row['productCode']; ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>