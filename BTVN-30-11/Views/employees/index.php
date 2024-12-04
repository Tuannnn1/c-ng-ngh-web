<div class="container">
    <a href="index.php?action=create" class="btn mt-4" style="background-color: #28a745; color: white; font-size: 18px; padding: 10px 20px; border-radius: 5px;">Add</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($employee = $employees->fetch_assoc()): ?>
                <tr>
                    <td><?= $employee['id'] ?></td>
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['email'] ?></td>
                    <td><?= $employee['phone'] ?></td>
                    <td><?= $employee['address'] ?></td>
                    <td><?= $employee['created_at'] ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?= $employee['id'] ?>" class="btn" style="background-color: #ffc107; color: white; font-size: 16px; padding: 8px 15px; border-radius: 5px;">Edit</a>
                        <a href="index.php?action=delete&id=<?= $employee['id'] ?>" class="btn" style="background-color: #dc3545; color: white; font-size: 16px; padding: 8px 15px; border-radius: 5px;">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
