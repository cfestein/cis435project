<?php include('partials/navbar.php') ?>
<div class="container-fluid">
    <table class="table mt-5 text-center table-striped table-hover">
        <thead>
            <tr>

                <th scope="col">ID #</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Description</th>
                <th scope="col">Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($products as $product) { ?>
                <tr>

                    <td><?= $product['product_id'] ?> </td>
                    <th scope="row"><img class="bd-placeholder-img card-img-top" style="width: 150px;" src="product_images/<?= $product["image"] ?>" /></th>
                    <td><?= $product['product_name'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td style="width=100px;">$ <?= number_format((float)$product["price"], 2, '.', '') ?></td>
                    <td><button type="submit" class="btn btn-primary btn-sm">Edit</button></td>
                    <td><button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button type="submit" class="d-grid gap-2 col-4 btn btn-primary btn-lg justify-content-center mb-5 mt-5 mx-auto">ADD</button>
</div>

<script>
    $("#checkout_button").hide();
</script>
<?php include('partials/footer.php') ?>