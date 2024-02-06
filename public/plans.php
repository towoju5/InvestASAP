<?php include_once plugin_dir_path( __FILE__ ) . '/partials/invest-asap-public-display.php' ?>
<div class="container mx-auto p-4">
    <h2 class="text-3xl font-bold mb-4">Investment Plans</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php foreach ($plans as $k => $plan): ?>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-2"><?= ucfirst($plan->plan_name) ?></h3>
            <p class="text-md border-b border-gray-100 py-2 font-medium">Profit: <?= $plan->profit ?>%</p>
            <p class="text-md border-b border-gray-100 py-2 font-normal">Minimum deposit: $<?= number_format($plan->min_amount, 2) ?></p>
            <p class="text-md border-b border-gray-100 py-2 font-normal">Maximum deposit: $<?= number_format($plan->max_amount, 2) ?></p>
            <p class="text-md border-b border-gray-100 py-2 font-normal">Investment Duration: <?= $plan->duration ?> Days</p>
            <p class="text-gray-700"><?= $plan->description ?> </p>
            <a href="<?= site_url('wp-admin/admin.php?page=investment-plans&PLANID='.$plan->id) ?>">
                <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Select plan
                </button>
            </a>
        </div>
        <?php endforeach ?>
    </div>
</div>
