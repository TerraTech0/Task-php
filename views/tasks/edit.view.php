<?php require base_path('partials/head.php') ?>
<?php require base_path('partials/nav.php') ?>
<?php require base_path('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php if (isset($_SESSION['task']) && $_SESSION['user']['is_admin']): ?>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form method="POST" action="/task">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">

                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <div class="mt-1">
                                        <input
                                            id="title"
                                            name="title"
                                            type="text"
                                            required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            value="<?= htmlspecialchars($user['title']) ?>"
                                        >
                                        <?php if (isset($errors['title'])) : ?>
                                            <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <div class="mt-1">
                                        <input
                                            id="description"
                                            name="description"
                                            type="description"
                                            required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            value="<?= htmlspecialchars($user['description']) ?>"
                                        >
                                        <?php if (isset($errors['description'])) : ?>
                                            <p class="text-red-500 text-xs mt-2"><?= $errors['description'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="status" class="block text-sm font-medium text-gray-700">
                                            <input
                                                id="status"
                                                name="status"
                                                type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                <?= $user['status'] ? 'checked' : '' ?>
                                            >
                                            Active User
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button
                                    type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                >
                                    Update Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="rounded-md bg-red-50 p-4">
                <div class="flex">
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Access Denied</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <p>You don't have administrator privileges to access this page.</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require base_path('partials/footer.php') ?>