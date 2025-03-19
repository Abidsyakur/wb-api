<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class FetchApiData extends Command
{
    protected $signature = 'fetch:api-data';
    protected $description = 'Fetch data from WB API and store in database';

    public function handle()
    {
        try {
            $apiUrl = 'http://89.108.115.241:6969';
            $apiKey = 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie';
            $endpoint = '/products';

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
            ])->get($apiUrl . $endpoint);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data as $item) {
                    Product::updateOrCreate(
                        ['id' => $item['id']],
                        [
                            'name' => $item['name'],
                            'description' => $item['description'] ?? null,
                            'price' => $item['price'],
                        ]
                    );
                }

                $this->info('Data berhasil diambil dan disimpan ke database.');
            } else {
                $this->error('Gagal mengambil data dari API. Status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            $this->error('Terjadi error: ' . $e->getMessage());
        }
    }
}