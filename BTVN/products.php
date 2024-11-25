<?php
// Khởi tạo mảng sản phẩm (bạn có thể thay thế phần này bằng cơ sở dữ liệu trong thực tế)
$products = [
    ['id' => 1, 'name' => 'Sản phẩm A', 'quantity' => 100, 'price' => 500],
    ['id' => 2, 'name' => 'Sản phẩm B', 'quantity' => 150, 'price' => 300],
    ['id' => 3, 'name' => 'Sản phẩm C', 'quantity' => 200, 'price' => 150],
    ['id' => 4, 'name' => 'Sản phẩm D', 'quantity' => 50, 'price' => 1200],
    ['id' => 5, 'name' => 'Sản phẩm E', 'quantity' => 75, 'price' => 800],
];

// Thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProduct'])) {
    $newProduct = [
        'id' => count($products) + 1, // Tự động tăng id
        'name' => $_POST['name'],
        'quantity' => $_POST['quantity'],
        'price' => $_POST['price'],
    ];
    $products[] = $newProduct;
}

// Chỉnh sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editProduct'])) {
    $id = $_POST['id'];
    foreach ($products as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $_POST['name'];
            $product['quantity'] = $_POST['quantity'];
            $product['price'] = $_POST['price'];
        }
    }
}

// Xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteProduct'])) {
    $id = $_POST['id'];
    foreach ($products as $key => $product) {
        if ($product['id'] == $id) {
            unset($products[$key]);
        }
    }
}
?>

<?php include('header.php'); ?>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Products</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Số Lượng</th>
                        <th>Giá Cả</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars($product['quantity']) ?></td>
                            <td><?= htmlspecialchars($product['price']) ?> VNĐ</td>
                            <td>
                                <a href="#editProductModal" class="edit" data-toggle="modal" 
                                    data-id="<?= $product['id'] ?>"
                                    data-name="<?= htmlspecialchars($product['name']) ?>"
                                    data-quantity="<?= htmlspecialchars($product['quantity']) ?>"
                                    data-price="<?= htmlspecialchars($product['price']) ?>">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                                <a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?= $product['id'] ?>">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- JavaScript for handling modal data population -->
<script>
    $(document).ready(function() {
        // Edit Product Modal
        $('#editProductModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var quantity = button.data('quantity');
            var price = button.data('price');
            
            var modal = $(this);
            modal.find('#edit-id').val(id);
            modal.find('#edit-name').val(name);
            modal.find('#edit-quantity').val(quantity);
            modal.find('#edit-price').val(price);
        });

        // Delete Product Modal
        $('#deleteProductModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            
            var modal = $(this);
            modal.find('#delete-id').val(id);
        });
    });
</script>
