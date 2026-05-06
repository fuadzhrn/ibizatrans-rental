<section id="pricelist-rental-mobil" class="layanan-pricelist section">
    <div class="container">
        <h2 class="section-title">Pricelist Rental Mobil</h2>
        <p class="section-sub">Pilih layanan lepas kunci atau include driver sesuai kebutuhan perjalanan Anda.</p>

        @php
            $fallbackVehiclePrices = collect([
                ['vehicle_name' => 'Innova Reborn', 'self_drive_per_day_price' => 650000, 'self_drive_24h_price' => 700000, 'driver_price' => 950000, 'driver_note' => 'City tour maksimal 12 jam'],
                ['vehicle_name' => 'Innova Zenix', 'self_drive_per_day_price' => 800000, 'self_drive_24h_price' => 850000, 'driver_price' => null, 'driver_note' => 'City tour maksimal 12 jam'],
                ['vehicle_name' => 'Terios', 'self_drive_per_day_price' => 375000, 'self_drive_24h_price' => 400000, 'driver_price' => 850000, 'driver_note' => 'City tour maksimal 12 jam'],
                ['vehicle_name' => 'All New Avanza/Xenia Type E', 'self_drive_per_day_price' => 350000, 'self_drive_24h_price' => 375000, 'driver_price' => null, 'driver_note' => 'City tour maksimal 12 jam'],
                ['vehicle_name' => 'All New Avanza/Xenia Type G', 'self_drive_per_day_price' => 375000, 'self_drive_24h_price' => 400000, 'driver_price' => null, 'driver_note' => 'City tour maksimal 12 jam'],
                ['vehicle_name' => 'All New Avanza/Xenia', 'self_drive_per_day_price' => null, 'self_drive_24h_price' => null, 'driver_price' => 750000, 'driver_note' => 'City tour maksimal 12 jam'],
                ['vehicle_name' => 'All New Agya/Ayla', 'self_drive_per_day_price' => 325000, 'self_drive_24h_price' => 350000, 'driver_price' => null, 'driver_note' => 'City tour maksimal 12 jam'],
                ['vehicle_name' => 'Ayla/Brio', 'self_drive_per_day_price' => null, 'self_drive_24h_price' => null, 'driver_price' => 650000, 'driver_note' => 'City tour maksimal 12 jam'],
                ['vehicle_name' => 'Brio', 'self_drive_per_day_price' => 325000, 'self_drive_24h_price' => 350000, 'driver_price' => null, 'driver_note' => 'City tour maksimal 12 jam'],
                ['vehicle_name' => 'Hiace Commuter', 'self_drive_per_day_price' => null, 'self_drive_24h_price' => null, 'driver_price' => 1400000, 'driver_note' => 'City tour maksimal 12 jam'],
            ]);

            $prices = (isset($vehiclePrices) && $vehiclePrices->count() > 0) ? $vehiclePrices : $fallbackVehiclePrices;

            $formatIbizaPrice = function ($price) {
                if (is_null($price)) {
                    return '-';
                }

                return number_format($price / 1000, 0, ',', '.') . 'K';
            };

            $nameResolver = function ($item) {
                if (is_array($item)) {
                    return $item['vehicle_name'] ?? '-';
                }

                return $item->vehicle?->name ?? $item->vehicle_name ?? '-';
            };

            $selfDriveRows = $prices->filter(function ($item) {
                $perDay = is_array($item) ? ($item['self_drive_per_day_price'] ?? null) : $item->self_drive_per_day_price;
                $h24 = is_array($item) ? ($item['self_drive_24h_price'] ?? null) : $item->self_drive_24h_price;
                return !is_null($perDay) || !is_null($h24);
            });

            $driverRows = $prices->filter(function ($item) {
                $driver = is_array($item) ? ($item['driver_price'] ?? null) : $item->driver_price;
                return !is_null($driver);
            });

            $driverNote = 'City tour maksimal 12 jam';
            if ($driverRows->count() > 0) {
                $firstDriver = $driverRows->first();
                $driverNote = is_array($firstDriver)
                    ? ($firstDriver['driver_note'] ?? $driverNote)
                    : ($firstDriver->driver_note ?? $driverNote);
            }
        @endphp

        <div class="pricelist-grid">
            <article class="pricing-card">
                <div class="pricing-card__head">
                    <span class="pricing-badge"><i class="ri-price-tag-3-line"></i> Lepas Kunci</span>
                </div>
                <table class="pricing-table">
                    <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Per Day</th>
                            <th>24 Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($selfDriveRows as $row)
                            @php
                                $perDay = is_array($row) ? ($row['self_drive_per_day_price'] ?? null) : $row->self_drive_per_day_price;
                                $h24 = is_array($row) ? ($row['self_drive_24h_price'] ?? null) : $row->self_drive_24h_price;
                            @endphp
                            <tr>
                                <td>{{ $nameResolver($row) }}</td>
                                <td>{{ $formatIbizaPrice($perDay) }}</td>
                                <td>{{ $formatIbizaPrice($h24) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Data harga lepas kunci belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </article>

            <article class="pricing-card">
                <div class="pricing-card__head">
                    <span class="pricing-badge"><i class="ri-user-star-line"></i> Include Driver</span>
                    <p class="pricing-note-top">Untuk {{ strtolower($driverNote) }}.</p>
                </div>
                <table class="pricing-table pricing-table--driver">
                    <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($driverRows as $row)
                            @php
                                $driver = is_array($row) ? ($row['driver_price'] ?? null) : $row->driver_price;
                            @endphp
                            <tr>
                                <td>{{ $nameResolver($row) }}</td>
                                <td>{{ $formatIbizaPrice($driver) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Data harga include driver belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </article>
        </div>

        <div class="pricing-footnote">
            <p><i class="ri-check-line"></i> Harga dapat berubah sewaktu-waktu.</p>
            <p><i class="ri-check-line"></i> Untuk pilihan mobil lainnya, silakan hubungi admin.</p>
            <p><i class="ri-check-line"></i> Ketersediaan unit mengikuti jadwal booking.</p>
        </div>

        <div class="pricelist-action">
            <a class="btn btn-primary" href="https://wa.me/6285703399966?text=Halo%20Ibiza%20Trans%2C%20saya%20ingin%20cek%20ketersediaan%20unit%20rental%20mobil." target="_blank">Tanya Ketersediaan Unit</a>
        </div>
    </div>
</section>
