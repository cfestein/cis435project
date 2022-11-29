<?php include('partials/navbar.php') ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Product Image</th>
            <th scope="col">Product #</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) { ?>
            <tr>
                <th scope="row" style="width: 50px;"><?php $product['image'] ?></th>
                <td><?php $product['product_id'] ?> </td>
                <td><?php $product['prodcut_name'] ?></td>
                <td><?php $product['product_description'] ?></td>
                <td><?php $product['price'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include('partials/footer.php') ?>