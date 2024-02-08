<div class="bg-white p-8 rounded-md shadow-md mt-3">
    <div class="flex justify-between gap-3">
        <h2 class="text-2xl font-semibold mb-6">Withdrawal History</h2>

        <a href="<?= site_url('wp-admin/admin.php?page=payout-history&action=create') ?>">
            <button class="px-4 py-1 rounded-full text-white bg-blue-600">
                Withdraw Now
            </button>
        </a>
    </div>
    <div class="overflow-x-auto bg-white">
        <table class="min-w-full bg-white border border-gray-300">
            <!-- Table headers -->
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Currency</th>
                    <th class="py-2 px-4 border-b text-left">Amount</th>
                    <th class="py-2 px-4 border-b text-left">Wallet</th>
                    <th class="py-2 px-4 border-b text-left">Payment Method</th>
                    <th class="py-2 px-4 border-b text-left">Status</th>
                    <!-- <th class="py-2 px-4 border-b text-left">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach($payouts as $k => $payout): ?>
                <tr class="text-center">
                    <td class="py-2 px-4 border-b"><?= $k+1 ?></td>
                    <td class="py-2 px-4 border-b"><?= $payout->currency ?></td>
                    <td class="py-2 px-4 border-b"><?= $payout->amount ?></td>
                    <td class="py-2 px-4 border-b"><?= $payout->wallet_address ?></td>
                    <td class="py-2 px-4 border-b"><?= $payout->payment_method ?></td>
                    <td class="py-2 px-4 border-b">
                        <span class="bg-blue-600 text-white rounded-full px-4 py-1">
                            <?= ucfirst($payout->status) ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>