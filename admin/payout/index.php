<div class="bg-white p-8 rounded-md shadow-md mt-3">
    <div class="flex justify-between gap-3">
        <h2 class="text-2xl font-semibold mb-6">All Payouts</h2>
        <a href="<?= site_url('wp-admin/admin.php?page=investment-payouts&action=create') ?>">
            <button class="px-4 py-1 rounded-full text-white bg-blue-600">
                Add New Payout
            </button>
        </a>
    </div>
    <div class="overflow-x-auto bg-white">
        <table class="min-w-full bg-white border border-gray-300">
            <!-- Table headers -->
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Payout Name</th>
                    <th class="py-2 px-4 border-b text-left">Amount</th>
                    <th class="py-2 px-4 border-b text-left">Wallet address</th>
                    <th class="py-2 px-4 border-b text-left">Payment Method</th>
                    <th class="py-2 px-4 border-b text-left">Status</th>
                    <th class="py-2 px-4 border-b text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($payouts as $k => $payout): ?>
                <tr class="text-center">
                    <td class="py-2 px-4 border-b"><?= $k+1 ?></td>
                    <td class="py-2 px-4 border-b"><?= $payout->payout_name ?></td>
                    <td class="py-2 px-4 border-b"><?= $payout->amount ?></td>
                    <td class="py-2 px-4 border-b"><?= $payout->wallet_address ?></td>
                    <td class="py-2 px-4 border-b"><?= $payout->payment_method ?></td>
                    <td class="py-2 px-4 border-b"><?= $payout->status ?></td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex justify-center gap-2 md:gap-4">
                            <a href="<?= site_url('wp-admin/admin.php?page=investment-payouts&action=edit&payout_id='.$payout->id) ?>">
                                <i class="dashicons-before dashicons-edit-page"></i>
                            </a>
                            <a href="<?= site_url('wp-admin/admin.php?page=investment-payouts&action=delete&payout_id='.$payout->id) ?>">
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
