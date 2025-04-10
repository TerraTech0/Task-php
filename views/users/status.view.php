<?php require base_path('partials/head.php') ?>
<?php require base_path('partials/nav.php') ?>
<?php require base_path('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/users" class="text-blue-500 underline">go back to all users...</a>
        </p>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Change User Status
                </h3>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <?= htmlspecialchars($user['name']) ?>
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Current Status</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $user['status'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                <?= $user['status'] ? 'Active' : 'Inactive' ?>
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>
            
            <form method="POST" action="/user/status" class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                
                <div class="flex items-center mb-4">
                    <input id="active-status" name="status" type="radio" value="1" 
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500" 
                        <?= $user['status'] ? 'checked' : '' ?>>
                    <label for="active-status" class="ml-2 block text-sm text-gray-900">
                        Active
                    </label>
                    
                    <input id="inactive-status" name="status" type="radio" value="0" 
                        class="ml-4 h-4 w-4 text-indigo-600 focus:ring-indigo-500" 
                        <?= !$user['status'] ? 'checked' : '' ?>>
                    <label for="inactive-status" class="ml-2 block text-sm text-gray-900">
                        Inactive
                    </label>
                </div>
                
                <button type="submit" 
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Update Status
                </button>
            </form>
        </div>
    </div>
</main>

<?php require base_path('partials/footer.php') ?>