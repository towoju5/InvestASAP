<div class="bg-white p-8 rounded-md shadow-md mt-3">
    <div class="flex justify-between gap-3">
        <h2 class="text-2xl font-semibold mb-6">My Deposits</h2>
    </div>
    <div class="overflow-x-auto bg-white">
        <table class="min-w-full bg-white border border-gray-300">
            <!-- Table headers -->
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Amount</th>
                    <th class="py-2 px-4 border-b text-left">Currency</th>
                    <th class="py-2 px-4 border-b text-left">Status</th>
                    <th class="py-2 px-4 border-b text-left">Date</th>
                    <th class="py-2 px-4 border-b text-left hidden">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($deposits as $k => $deposit): ?>
                <tr class="text-center">
                    <td class="py-2 px-4 border-b"><?= $k+1 ?></td>
                    <td class="py-2 px-4 border-b"><?= $deposit->amount ?></td>
                    <td class="py-2 px-4 border-b"><?= $deposit->payment_method ?></td>
                    <td class="py-2 px-4 border-b"><span class="bg-blue-600 text-white rounded-full px-4 py-1"> <?= ucfirst($deposit->status) ?></span></td>
                    <td class="py-2 px-4 border-b"><?= $deposit->date ?></td>
                    <td class="py-2 px-4 border-b hidden">
                        <div class="flex justify-center gap-2 md:gap-4">
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
