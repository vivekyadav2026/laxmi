<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - {{ $application->application_number }} - Foundida</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 text-gray-800">
    <div class="max-w-3xl mx-auto bg-white p-10 rounded-2xl shadow-lg border border-gray-200" id="invoice">
        <div class="flex justify-between items-start border-b border-gray-200 pb-6 mb-6">
            <div>
                <h1 class="text-3xl font-extrabold text-[#0B1F3A]">Foundida</h1>
                <p class="text-xs text-gray-500">Legal & Startup Growth Platform</p>
                <p class="text-xs text-gray-500">GSTIN: 07AAAAA0000A1Z5</p>
            </div>
            <div class="text-right">
                <h2 class="text-xl font-bold text-[#D4A843]">TAX INVOICE</h2>
                <p class="text-xs text-gray-500 font-mono mt-1">Invoice #: INV-{{ $application->application_number }}</p>
                <p class="text-xs text-gray-500">Date: {{ $application->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-8 text-xs">
            <div>
                <h3 class="font-bold text-gray-400 uppercase mb-1">Billed To</h3>
                <p class="font-bold text-gray-900 text-sm">{{ $application->founder_name }}</p>
                <p>{{ $application->startup_name }}</p>
                <p>{{ $application->email }} | {{ $application->mobile }}</p>
            </div>
            <div class="text-right">
                <h3 class="font-bold text-gray-400 uppercase mb-1">Payment Info</h3>
                <p>Status: <span class="font-bold text-emerald-600 uppercase">{{ $application->payment_status }}</span></p>
                <p>Payment ID: <span class="font-mono">{{ $application->payment_id ?: 'N/A' }}</span></p>
            </div>
        </div>

        <table class="w-full text-left border-collapse mb-8 text-xs">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-500 font-bold uppercase">
                    <th class="p-3">Description</th>
                    <th class="p-3 text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-100">
                    <td class="p-3">
                        <span class="font-bold text-sm block">Funding Application Assistance ({{ $application->package_name }} Package)</span>
                        <span class="text-gray-400">Opportunity: {{ $application->program->name }}</span>
                    </td>
                    <td class="p-3 text-right font-bold text-sm">₹{{ number_format($application->package_price, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-between items-end border-t border-gray-200 pt-6">
            <div class="text-[10px] text-gray-400 max-w-sm">
                Thank you for choosing Foundida. This is a computer generated invoice and requires no physical signature.
            </div>
            <div class="text-right">
                <span class="text-xs text-gray-500 block uppercase font-bold">Total Paid</span>
                <span class="text-2xl font-extrabold text-[#0B1F3A]">₹{{ number_format($application->package_price, 2) }}</span>
            </div>
        </div>
    </div>

    <div class="text-center mt-6">
        <button onclick="window.print()" class="bg-[#0B1F3A] text-white px-6 py-2 rounded-xl text-xs font-bold shadow-md">
            Print Invoice
        </button>
    </div>
</body>
</html>
