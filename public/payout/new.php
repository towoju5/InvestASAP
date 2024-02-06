<div class="flex items-center justify-center mt-16">

    <div class="bg-white p-8 rounded-md shadow-md max-w-md w-full">

        <form action="" method="post">
            <h2 class="text-2xl font-semibold mb-6">Select Payment Method for <?= $plan->plan_name ?? 'N/A' ?></h2>
            <input type="hidden" name="new_deposit" value="1">
            <input type="hidden" name="plan_id" value="<?= $_GET['PLANID'] ?? 0 ?>">
            <!-- Payment Method Dropdown -->
            <div class="mb-4">
                <label for="payment_method" class="block text-sm font-medium text-gray-600">Payment Method:</label>
                <select id="payment_method" name="payment_method" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <!-- Add more payment methods as needed -->
                </select>
            </div>

            <!-- Amount Input Field -->
            <div class="mb-6">
                <label for="amount" class="block text-sm font-medium text-gray-600">Amount:</label>
                <input type="text" id="amount" name="amount" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full">Submit</button>
        </form>

    </div>
</div>