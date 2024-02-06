<div class="container mx-auto p-8">
    <div class="mb-8 max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Edit Plan : <?= ucfirst($plan->plan_name) ?></h2>
        <form action="add_plan.php" method="post">
            <div class="mb-4">
                <label for="plan_name" class="block text-sm font-medium text-gray-600">Plan Name:</label>
                <input type="text" id="plan_name" name="plan_name" value="<?= $plan->plan_name ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="min_amount" class="block text-sm font-medium text-gray-600">Min Amount:</label>
                <input type="number" id="min_amount" name="min_amount" value="<?= $plan->min_amount ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="max_amount" class="block text-sm font-medium text-gray-600">Max Amount:</label>
                <input type="number" id="max_amount" name="max_amount" value="<?= $plan->max_amount ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="profit" class="block text-sm font-medium text-gray-600">Profit:</label>
                <input type="number" id="profit" name="profit" value="<?= $plan->profit ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-600">Duration (in days):</label>
                <input type="number" id="duration" name="duration" value="<?= $plan->duration ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea id="description" name="description" rows="4" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500"><?= $plan->description ?></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full">Add Plan</button>
        </form>
    </div>
</div>
