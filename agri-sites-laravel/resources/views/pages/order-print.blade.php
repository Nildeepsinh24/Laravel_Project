<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $order->order_number }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            color: #333;
        }

        .invoice-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 40px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 40px;
            border-bottom: 3px solid #28a745;
            padding-bottom: 20px;
        }

        .company-info h1 {
            font-size: 28px;
            color: #28a745;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .company-info p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        .invoice-title {
            text-align: right;
        }

        .invoice-title h2 {
            font-size: 24px;
            color: #28a745;
            margin-bottom: 10px;
        }

        .invoice-meta {
            display: flex;
            justify-content: flex-end;
            gap: 30px;
            margin-bottom: 30px;
        }

        .meta-box {
            text-align: right;
        }

        .meta-box label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .meta-box span {
            display: block;
            color: #666;
            font-size: 14px;
        }

        .invoice-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 30px;
        }

        .invoice-section h3 {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            text-transform: uppercase;
            border-bottom: 2px solid #28a745;
            padding-bottom: 8px;
        }

        .invoice-section p {
            color: #666;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 5px;
        }

        .items-section {
            grid-column: 1 / -1;
            margin: 30px 0;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .items-table thead {
            background-color: #f0f0f0;
            border-bottom: 2px solid #28a745;
        }

        .items-table th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
            color: #333;
            font-size: 14px;
        }

        .items-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }

        .items-table tr:last-child td {
            border-bottom: 2px solid #28a745;
        }

        .text-right {
            text-align: right;
        }

        .totals-section {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
        }

        .totals-box {
            width: 300px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 14px;
            border-bottom: 1px solid #ddd;
        }

        .total-row.final {
            padding: 15px 0;
            font-size: 18px;
            font-weight: bold;
            border-bottom: none;
            border-top: 2px solid #28a745;
        }

        .total-row.final span:last-child {
            color: #28a745;
        }

        .notes-section {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-left: 4px solid #28a745;
            grid-column: 1 / -1;
        }

        .notes-section h3 {
            margin-bottom: 10px;
            border: none;
            padding: 0;
        }

        .notes-section p {
            margin: 0;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #666;
            font-size: 12px;
        }

        .print-button {
            text-align: center;
            margin-bottom: 20px;
        }

        .print-button button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 30px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .print-button button:hover {
            background-color: #218838;
        }

        /* Print Styles for Microsoft Print and browser print dialog */
        @media print {
            body {
                background-color: white;
                padding: 0;
            }

            .invoice-container {
                box-shadow: none;
                max-width: 100%;
                padding: 20px;
                margin: 0;
            }

            .print-button {
                display: none;
            }

            /* Optimize for A4 paper */
            @page {
                size: A4;
                margin: 0.5in;
            }

            /* Prevent page breaks within sections */
            .invoice-section,
            .items-table,
            .totals-section {
                page-break-inside: avoid;
            }

            /* Ensure colors print correctly */
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            /* Hide navigation and footer */
            header, nav, footer, .navigation {
                display: none !important;
            }

            /* Ensure all text is visible */
            body, p, td, th, h1, h2, h3 {
                background: white;
                color: black;
            }

            .invoice-header {
                border-bottom: 3px solid #000;
            }

            .meta-box span,
            .invoice-section p {
                color: #000;
            }

            .items-table thead {
                background-color: #ddd;
                border-bottom: 2px solid #000;
            }

            .items-table tr:last-child td {
                border-bottom: 2px solid #000;
            }

            .totals-box .total-row.final {
                border-top: 2px solid #000;
            }

            .total-row.final span:last-child {
                color: #000;
            }

            .notes-section {
                border-left: 4px solid #000;
                background-color: #f9f9f9;
            }
        }

        /* Additional print styles for Microsoft Edge and Chrome */
        @media print {
            /* Ensure margins are respected */
            @page {
                margin-top: 0.5cm;
                margin-right: 0.5cm;
                margin-bottom: 0.5cm;
                margin-left: 0.5cm;
            }

            /* Prevent orphaned lines */
            body {
                orphans: 3;
                widows: 3;
            }

            /* Ensure table doesn't break mid-row */
            tr {
                page-break-inside: avoid;
            }
        }

        /* Screen-only styles */
        @media screen {
            .invoice-container {
                margin-top: 20px;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="print-button">
        <button onclick="window.print();">🖨️ Print Invoice</button>
    </div>

    <div class="invoice-container">
        <div class="invoice-header">
            <div class="company-info">
                <h1>Agri Sites</h1>
                <p>Premium Agricultural Products & Solutions<br>
                Email: info@agrisites.com<br>
                Phone: 1-800-AGRI-SITES<br>
                Address: 123 Farm Road, Agricultural Valley, AG 12345</p>
            </div>
            <div class="invoice-title">
                <h2>INVOICE</h2>
            </div>
        </div>

        <div class="invoice-meta">
            <div class="meta-box">
                <label>Invoice #</label>
                <span>{{ $order->order_number }}</span>
            </div>
            <div class="meta-box">
                <label>Invoice Date</label>
                <span>{{ $order->created_at->format('F d, Y') }}</span>
            </div>
            <div class="meta-box">
                <label>Status</label>
                <span>{{ ucfirst($order->status) }}</span>
            </div>
        </div>

        <div class="invoice-body">
            <div class="invoice-section">
                <h3>Bill To</h3>
                <p><strong>{{ $order->first_name }} {{ $order->last_name }}</strong></p>
                <p>{{ $order->address }}</p>
                <p>{{ $order->city }}, {{ $order->state }} {{ $order->zip }}</p>
                <p>{{ $order->country }}</p>
                <p>Email: {{ $order->email }}</p>
                <p>Phone: {{ $order->phone }}</p>
            </div>

            <div class="invoice-section">
                <h3>Payment Details</h3>
                <p><strong>Payment Method:</strong></p>
                <p>
                    @if($order->payment_method === 'cod')
                        Cash on Delivery (COD)
                    @else
                        Credit/Debit Card
                    @endif
                </p>
                <p><strong>Total Amount:</strong></p>
                <p style="font-size: 18px; color: #28a745; font-weight: bold;">₹{{ number_format($order->total_amount, 2) }}</p>
            </div>

            <div class="items-section">
                <h3>Order Items</h3>
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Unit Price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td class="text-right">{{ $item->quantity }}</td>
                            <td class="text-right">₹{{ number_format($item->unit_price, 2) }}</td>
                            <td class="text-right"><strong>₹{{ number_format($item->total_price, 2) }}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="totals-section">
                <div class="totals-box">
                    <div class="total-row">
                        <span>Subtotal:</span>
                        <span>₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                    <div class="total-row">
                        <span>Shipping:</span>
                        <span>Free</span>
                    </div>
                    <div class="total-row">
                        <span>Tax:</span>
                        <span>Included</span>
                    </div>
                    <div class="total-row final">
                        <span>Total Amount:</span>
                        <span>₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>

            @if($order->notes)
            <div class="notes-section">
                <h3>Order Notes</h3>
                <p>{{ $order->notes }}</p>
            </div>
            @endif
        </div>

        <div class="footer">
            <p>Thank you for your business! If you have any questions, please contact us at info@agrisites.com</p>
            <p>Generated on {{ now()->format('F d, Y H:i A') }} | Invoice for Order {{ $order->order_number }}</p>
        </div>
    </div>

    <script>
        // Auto-trigger print dialog when page loads (optional)
        // Uncomment below if you want to auto-open print dialog
        // window.addEventListener('load', function() {
        //     window.print();
        // });
    </script>
</body>
</html>
