<div class="container">
    <h2>Add New Employee</h2>
    <form method="POST" action="index.php?action=create">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <button type="submit" class="btn" style="background-color: #007bff; color: white; font-size: 18px; padding: 10px 20px; border-radius: 5px;">Add</button>
        <a href="index.php" class="btn" style="background-color: #6c757d; color: white; font-size: 18px; padding: 10px 20px; border-radius: 5px;">Cancel</a>
    </form>
</div>
