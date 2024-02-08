<div class="flex items-center justify-center mt-16">

    <div class="bg-white p-8 rounded-md shadow-md max-w-md w-full">

    <form action="" method="post">
            <h2 class="text-2xl font-semibold mb-6">Select Payment Method for <?= $plan->plan_name ?? 'N/A' ?></h2>
            <input type="hidden" name="new_withdrawal" value="1">
            <!-- Payment Method Dropdown -->
            <div class="mb-4">
                <label for="payment_method" class="block text-sm font-medium text-gray-600">Payment Method:</label>
                <select id="payment_method" name="payment_method" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                    <option value="BTC">Bitcoin</option>
                    <option value="LTC">Litecoin</option>
                    <option value="BNB">Binance Coin</option>
                    <option value="TRX">Tron Network</option>
                    <option value="DOGE">Doge Coin</option>
                    <option value="USDTTRC20">USDT TRC20</option>
                    <option value="BCH">Bitcoin Cash</option>
                    <option value="ETH">Ethereum</option>
                    <option value="USDTERC20">USDT ERC20</option>
                    <option value="BUSD">Binance USD</option>
                </select>
            </div>

            <!-- Amount Input Field -->
            <div class="mb-6">
                <label for="amount" class="block text-sm font-medium text-gray-600">Amount:</label>
                <input type="number" id="amount" name="amount" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
            </div>

            <!-- Amount Input Field -->
            <div class="mb-6">
                <label for="amount" class="block text-sm font-medium text-gray-600"> Wallet Address:</label>
                <input type="text" id="wallet_address" name="wallet_address" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full">Submit</button>
        </form>


    </div>
</div>