<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Admin Dashboard">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" class="<?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/user" class="<?= urlIs('/user') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Users</a>
                        <?php if ($_SESSION['user'] ?? false): ?>
                            <a href="/task" class="<?= urlIs('/task') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Tasks</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <?php if ($_SESSION['user'] ?? false): ?>
                    <form method="POST" action="/session">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="text-white bg-red-600 hover:bg-red-700 px-3 py-2 rounded-md text-sm font-medium">Log Out</button>
                    </form>
                <?php else: ?>
                    <a href="/register" class="<?= urlIs('/register') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    <a href="/login" class="<?= urlIs('/login') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</nav>
