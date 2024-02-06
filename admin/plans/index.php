<div class="bg-white p-8 rounded-md shadow-md mt-3">
    <div class="flex justify-between gap-3">
        <h2 class="text-2xl font-semibold mb-6">All Plans</h2>
        <a href="<?= site_url('wp-admin/admin.php?page=investment-plans&action=create') ?>">
            <button class="px-4 py-1 rounded-full text-white bg-blue-600">
                Add New Plan
            </button>
        </a>
    </div>
    <div class="overflow-x-auto bg-white">
        <table class="min-w-full bg-white border border-gray-300">
            <!-- Table headers -->
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Plan Name</th>
                    <th class="py-2 px-4 border-b text-left">Min Amount</th>
                    <th class="py-2 px-4 border-b text-left">Max Amount</th>
                    <th class="py-2 px-4 border-b text-left">Profit</th>
                    <th class="py-2 px-4 border-b text-left">Duration</th>
                    <th class="py-2 px-4 border-b text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($plans as $k => $plan): ?>
                <tr class="text-center">
                    <td class="py-2 px-4 border-b"><?= $k+1 ?></td>
                    <td class="py-2 px-4 border-b"><?= $plan->plan_name ?></td>
                    <td class="py-2 px-4 border-b"><?= $plan->min_amount ?></td>
                    <td class="py-2 px-4 border-b"><?= $plan->max_amount ?></td>
                    <td class="py-2 px-4 border-b"><?= $plan->profit ?></td>
                    <td class="py-2 px-4 border-b"><?= $plan->duration ?></td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex justify-center gap-2 md:gap-4">
                            <a href="<?= site_url('wp-admin/admin.php?page=investment-plans&action=edit&plan_id='.$plan->id) ?>">
                                <i class="dashicons-before dashicons-edit-page"></i>
                            </a>
                            <a href="<?= site_url('wp-admin/admin.php?page=investment-plans&action=delete&plan_id='.$plan->id) ?>">
                            <i class="dashicons-before dashicons-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
