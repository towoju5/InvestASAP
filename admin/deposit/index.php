<div class="bg-white p-8 rounded-md shadow-md mt-3">
    <div class="flex justify-between gap-3">
        <h2 class="text-2xl font-semibold mb-6">All Deposits</h2>
        <a href="<?= site_url('wp-admin/admin.php?page=investment-plans&action=create') ?>">
            <button class="px-4 py-1 rounded-full text-white bg-blue-600">
                Add New deposit
            </button>
        </a>
    </div>
    <div class="overflow-x-auto bg-white">
        <table class="min-w-full bg-white border border-gray-300">
            <!-- Table headers -->
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">User</th>
                    <th class="py-2 px-4 border-b text-left">Amount</th>
                    <th class="py-2 px-4 border-b text-left">Date</th>
                    <th class="py-2 px-4 border-b text-left">Status</th>
                    <th class="py-2 px-4 border-b text-left">Expiration</th>
                    <th class="py-2 px-4 border-b text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($deposits as $k => $deposit): ?>
                <tr class="text-center">
                    <td class="py-2 px-4 border-b"><?= $k+1 ?></td>
                    <td class="py-2 px-4 border-b"><?= ucfirst(get_username_by_id($deposit->user_id)) ?></td>
                    <td class="py-2 px-4 border-b"><?= $deposit->amount ?></td>
                    <td class="py-2 px-4 border-b"><?= $deposit->date ?></td>
                    <td class="py-2 px-4 border-b"><?= $deposit->status ?></td>
                    <td class="py-2 px-4 border-b"><?= $deposit->expiration ?></td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex justify-center gap-2 md:gap-4">
                            <a href="<?= site_url('wp-admin/admin.php?page=investment-plans&action=edit&plan_id='.$deposit->id) ?>">
                                <i class="dashicons-before dashicons-edit-page"></i>
                            </a>
                            <a href="<?= site_url('wp-admin/admin.php?page=investment-plans&action=delete&plan_id='.$deposit->id) ?>">
                                <i class="dashicons-before dashicons-eyes"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
