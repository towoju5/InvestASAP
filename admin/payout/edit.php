<div class="container mx-auto p-8">
<div class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">result Details</h2>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Amount</label>
            <p class="text-gray-900"><?= $result->amount ?></p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Wallet Address</label>
            <p class="text-gray-900"><?= $result->wallet_address ?></p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Payment Method</label>
            <p class="text-gray-900"><?= $result->payment_method ?></p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Status</label>
            <p class="text-gray-900"><?= $result->status ?></p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Date</label>
            <p class="text-gray-900"><?= $result->date ?></p>
        </div>
        
        <!-- Update Form -->
        <form action="" method="POST" class="mt-6">
            <label for="status" class="block text-gray-700 font-bold mb-2">Update Status</label>
            <select name="status" id="status" class="block w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option <?php if($result->status == "pending") { echo "selected"; } ?> value="pending">Pending</option>
                <option <?php if($result->status == "completed") { echo "selected"; } ?> value="completed">Completed</option>
                <option <?php if($result->status == "cancelled") { echo "selected"; } ?> value="cancelled">Cancelled</option>
            </select>
            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update
            </button>
        </form>
    </div>
</div>
