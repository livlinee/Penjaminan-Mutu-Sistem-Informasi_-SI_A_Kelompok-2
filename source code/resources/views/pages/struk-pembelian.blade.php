<!DOCTYPE html>
<html>

<head>
    <title>Struk Pembelian Cyber Cafe</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h1 style="color: #2F855A;">Pembayaran Berhasil!</h1>
        <p>Hai **{{ $data['nama_pelanggan'] }}**,</p>
        <p>Terima kasih atas pesanan Anda di Cyber Cafe. Pesanan Anda sedang kami siapkan.</p>

        <hr style="border: 0; border-top: 1px solid #eee;">

        <h2 style="color: #2F855A;">Detail Pesanan</h2>
        <p>
            <strong>Order ID:</strong> {{ $data['order_group_id'] }}<br>
            <strong>Waktu:</strong> {{ $data['waktu'] }}<br>
            <strong>Nomor Meja:</strong> {{ $data['nomor_meja'] }}
        </p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f9f9f9;">
                    <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Item</th>
                    <th style="padding: 8px; border: 1px solid #ddd; text-align: right;">Harga</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop item dari keranjang --}}
                @foreach ($data['items'] as $item)
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd;">
                            {{ $item['name'] }} ({{ $item['quantity'] }}x)
                        </td>
                        <td style="padding: 8px; border: 1px solid #ddd; text-align: right;">
                            Rp. {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="font-weight: bold;">
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: right;">Total Pembayaran</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: right;">
                        Rp. {{ number_format($data['total'], 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>

        <p style="margin-top: 20px;">Terima kasih telah berkunjung!</p>
    </div>
</body>

</html>
