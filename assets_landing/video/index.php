<!DOCTYPE html>
<html>

<head>
    <title>Form Input</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .entry {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Form Input</h1>
    <form id="expenseForm" method="POST" action="process.php">
        <div id="entries">
            <div class="entry">
                <label for="description">Description:</label>
                <input type="text" name="description" class="description">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" class="amount">
                <label for="remark">Remark:</label>
                <input type="text" name="remark" class="remark">
                <button type="button" class="removeEntry">Remove</button>
            </div>
        </div>
        <button type="button" id="addEntry">Add Entry</button>
        <br><br>
        <label for="cashAdvance">Cash Advance:</label>
        <input type="number" id="cashAdvance" name="cashAdvance">
        <br><br>
        <label for="totalAmount">Total Amount:</label>
        <input type="text" id="totalAmount" name="totalAmount" readonly>
        <br><br>
        <label for="paymentStatus">Payment Status:</label>
        <input type="text" id="paymentStatus" name="paymentStatus" readonly>
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <script>
        $(document).ready(function() {
            // Add entry
            $("#addEntry").click(function() {
                var entry = '<div class="entry">' +
                    '<label for="description">Description:</label>' +
                    '<input type="text" name="description" class="description">' +
                    '<label for="amount">Amount:</label>' +
                    '<input type="number" name="amount" class="amount">' +
                    '<label for="remark">Remark:</label>' +
                    '<input type="text" name="remark" class="remark">' +
                    '<button type="button" class="removeEntry">Remove</button>' +
                    '</div>';
                $("#entries").append(entry);
            });

            // Remove entry
            $(document).on('click', '.removeEntry', function() {
                $(this).closest('.entry').remove();
                calculateTotalAndPaymentStatus();
            });

            // Calculate total amount and payment status
            function calculateTotalAndPaymentStatus() {
                var total = 0;
                $('.amount').each(function() {
                    var amount = parseFloat($(this).val()) || 0;
                    total += amount;
                });

                var cashAdvance = parseFloat($("#cashAdvance").val()) || 0;
                $("#totalAmount").val(total.toFixed(2));

                var paymentStatus = "";
                if (total > cashAdvance) {
                    paymentStatus = "Overpaid (" + (total - cashAdvance).toFixed(2) + ")";
                } else if (total < cashAdvance) {
                    paymentStatus = "Underpaid (" + (cashAdvance - total).toFixed(2) + ")";
                } else {
                    paymentStatus = "Paid";
                }
                $("#paymentStatus").val(paymentStatus);
            }

            // Calculate on initial load
            calculateTotalAndPaymentStatus();

            // Recalculate on input change
            $('.amount, #cashAdvance').on('input', calculateTotalAndPaymentStatus);
        });
    </script>
</body>

</html>