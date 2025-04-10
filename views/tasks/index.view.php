<?php require base_path('partials/head.php') ?>
<?php require base_path('partials/nav.php') ?>
<?php require base_path('partials/banner.php') ?>



<div class="container">
    <h1>Tasks</h1>
    
    <?php if (Core\Session::has('success')): ?>
        <div class="alert alert-success">
            <?= Core\Session::get('success') ?>
        </div>
    <?php endif; ?>

    <a href="/tasks/create" class="btn btn-primary mb-3">Add New Task</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Assignees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= htmlspecialchars($task['title']) ?></td>
                <td><?= htmlspecialchars(substr($task['description'], 0, 50)) . (strlen($task['description']) > 50 ? '...' : '') ?></td>
                <td>
                    <form action="/tasks/<?= $task['id'] ?>/status" method="POST" class="d-inline">
                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                            <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="in_progress" <?= $task['status'] === 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                            <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                        </select>
                    </form>
                </td>
                <td><?= $task['assignees'] ?? 'Unassigned' ?></td>
                <td>
                    <a href="/tasks/<?= $task['id'] ?>/edit" class="btn btn-sm btn-primary">Edit</a>
                    <form action="/tasks/<?= $task['id'] ?>" method="POST" class="d-inline">
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