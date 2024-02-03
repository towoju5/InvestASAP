<?php include_once plugin_dir_path( __FILE__ ) . '/partials/invest-asap-public-display.php' ?>
<div class="container mx-auto p-4">
    <h2 class="text-3xl font-bold mb-4">Investment Plans</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Investment Plan -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-2">Basic Plan</h3>
            <p class="text-md border-b border-gray-100 py-2 font-medium">Profit: 30%</p>
            <p class="text-md border-b border-gray-100 py-2 font-normal">Minimum deposit: $ <?= number_format(300, 2) ?></p>
            <p class="text-md border-b border-gray-100 py-2 font-normal">Maximum deposit: $ <?= number_format(30000, 2) ?></p>
            <p class="text-md border-b border-gray-100 py-2 font-normal">Investment Duration: 30 Days</p>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Invest Now
            </button>
        </div>

        <!-- Investment Plan -->

    </div>
</div>