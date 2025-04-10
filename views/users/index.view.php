<?php require base_path('partials/head.php') ?>
<?php require base_path('partials/nav.php') ?>
<?php require base_path('partials/banner.php') ?>

<div class="container">
    <h1>Users</h1>

    <?php if (Core\Session::has('success')): ?>
        <div class="alert alert-success">
            <?= Core\Session::get('success') ?>
        </div>
    <?php endif; ?>

    <a href="/users/create" class="btn btn-primary mb-3">Add New User</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td>
                        <span class="badge <?= $user['status'] === 'active' ? 'bg-success' : 'bg-secondary' ?>">
                            <?= ucfirst($user['status']) ?>
                        </span>
                    </td>
                    <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                    <td>
                        <form action="/users/<?= $user['id'] ?>/status" method="POST" class="d-inline">
                            <button type="submit"
                                class="btn btn-sm <?= $user['status'] === 'active' ? 'btn-warning' : 'btn-success' ?>">
                                <?= $user['status'] === 'active' ? 'Deactivate' : 'Activate' ?>
                            </button>
                        </form>
                        <a href="/users/<?= $user['id'] ?>/edit" class="btn btn-sm btn-primary">Edit</a>
                        <form action="/users/<?= $user['id'] ?>" method="POST" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require base_path('partials/footer.php') ?>