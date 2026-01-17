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
            padding: 10px;
            color: #333;
        }

        .invoice-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            border-bottom: 2px solid #28a745;
            padding-bottom: 15px;
        }

        .company-info h1 {
            font-size: 22px;
            color: #28a745;
            margin-bottom: 3px;
            font-weight: bold;
        }

        .company-info p {
            color: #666;
            font-size: 12px;
            line-height: 1.4;
        }

        .invoice-title {
            text-align: right;
        }

        .invoice-title h2 {
            font-size: 20px;
            color: #28a745;
            margin-bottom: 8px;
        }

        .invoice-meta {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            margin-bottom: 20px;
        }

        .meta-box {
            text-align: right;
        }

        .meta-box label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 3px;
            font-size: 13px;
        }

        .meta-box span {
            display: block;
            color: #666;
            font-size: 12px;
        }

        .invoice-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .invoice-section h3 {
            font-size: 12px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            text-transform: uppercase;
            border-bottom: 1px solid #28a745;
            padding-bottom: 5px;
        }

        .invoice-section p {
            color: #666;
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 3px;
        }

        .items-section {
            grid-column: 1 / -1;
            margin: 15px 0;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .items-table thead {
            background-color: #f0f0f0;
            border-bottom: 1px solid #28a745;
        }

        .items-table th {
            padding: 8px;
            text-align: left;
            font-weight: bold;
            color: #333;
            font-size: 12px;
        }

        .items-table td {
            padding: 6px 8px;
            border-bottom: 1px solid #ddd;
            color: #666;
            font-size: 12px;
        }

        .items-table tr:last-child td {
            border-bottom: 1px solid #28a745;
        }

        .text-right {
            text-align: right;
        }

        .totals-section {
            margin-top: 15px;
            display: flex;
            justify-content: flex-end;
        }

        .totals-box {
            width: 250px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            font-size: 12px;
            border-bottom: 1px solid #ddd;
        }

        .total-row.final {
            padding: 10px 0;
            font-size: 15px;
            font-weight: bold;
            border-bottom: none;
            border-top: 1px solid #28a745;
        }

        .total-row.final span:last-child {
            color: #28a745;
        }

        .notes-section {
            margin-top: 15px;
            padding: 12px;
            background-color: #f9f9f9;
            border-left: 3px solid #28a745;
            grid-column: 1 / -1;
        }

        .notes-section h3 {
            margin-bottom: 8px;
            border: none;
            padding: 0;
            font-size: 12px;
        }

        .notes-section p {
            margin: 0;
            font-size: 11px;
        }

        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #666;
            font-size: 11px;
        }

        .print-button {
            text-align: center;
            margin-bottom: 20px;
        }

        .print-button button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 20px;
            font-size: 13px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .print-button button:hover {
            background-color: #218838;
        }

        /* Print Styles for single page */
        @media print {
            body {
                background-color: white;
                padding: 0;
                margin: 0;
            }

            .invoice-container {
                box-shadow: none;
                max-width: 100%;
                padding: 15px;
                margin: 0;
            }

            .print-button {
                display: none;
            }

            /* Optimize for A4 paper - single page */
            @page {
                size: A4;
                margin: 0.4in;
                @bottom-center {
                    content: "";
                }
                @top-center {
                    content: "";
                }
            }

            /* Prevent page breaks */
            .invoice-header,
            .invoice-meta,
            .invoice-body,
            .items-section,
            .totals-section,
            .notes-section,
            .footer {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }

            .invoice-container {
                height: 100%;
                display: flex;
                flex-direction: column;
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
                <span>{{ now()->format('F d, Y g:i A') }}</span>
            </div>
            <div class="meta-box">
                <label>Note</label>
                <span style="font-size: 11px; color: #666;">Returns are accepted<br>only within 7 days.</span>
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
                        <span>₹{{ number_format($order->total_amount / 1.10, 2) }}</span>
                    </div>
                    <div class="total-row">
                        <span>Tax (10%):</span>
                        <span>₹{{ number_format($order->total_amount / 1.10 * 0.10, 2) }}</span>
                    </div>
                    <div class="total-row">
                        <span>Shipping:</span>
                        <span>Free</span>
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
            <p>Thank you for choosing us! If you have any questions, please contact us at info@agrisites.com</p>
            <p>Generated on {{ now()->format('F d, Y g:i A') }} | Invoice for Order {{ $order->order_number }}</p>
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
