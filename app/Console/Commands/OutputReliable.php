<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Symfony\Component\VarDumper\Caster\ImgStub;
use function PHPUnit\Framework\arrayHasKey;

class OutputReliable extends Command
{
    protected $signature = 'output_reliable';

    protected $description = 'Command description';

    public function handle(): void
    {
        $coins_cryptorank = file(storage_path('repository/coins_cryptorank_json.txt'));
        foreach ($coins_cryptorank as &$json_coin2) {
            $json_coin2 = json_decode($json_coin2);
        }
        $cryptorank_symbols_count_arr = array_count_values(array_column($coins_cryptorank, 'symbol'));
        foreach ($cryptorank_symbols_count_arr as $symbol=>$count) {
            if ( $count == 1 ) {
                $cr_coins_single_list[] = $symbol;
            } else {
                $cr_coins_multiple_list[] = $symbol;
        }   }
        $coins_cry_single_as = [];
        foreach ($coins_cryptorank as $coin) {
            if ( in_array($coin->symbol, $cr_coins_single_list) ) {
                $coins_cry_single_as[$coin->symbol] = $coin;
        }   }


        $coins_marketcap = file(storage_path('repository/coins_marketcap_json_2023-12-27.txt'));
        foreach ($coins_marketcap as &$json_coin) {
            $json_coin = json_decode($json_coin);
        }
        $marketcap_symbols_count_arr = array_count_values(array_column($coins_marketcap, 'symbol'));
        foreach ($marketcap_symbols_count_arr as $symbol=>$count) {
            if ( $count == 1 ) {
                $mc_coins_single_list[] = $symbol;
            } else {
                $mc_coins_multiple_list[] = $symbol;
        }   }
        $coins_mcap_single_as = [];
        foreach ($coins_marketcap as $coin) {
            if ( in_array($coin->symbol, $mc_coins_single_list) ) {
                $coins_mcap_single_as[$coin->symbol] = $coin;
        }   }


        $intersectable = array_intersect($cr_coins_single_list, $mc_coins_single_list);
        foreach ($intersectable as $symbol) {
            $cryptorank_name = $coins_cry_single_as[$symbol]->name;
            $marketcap_name = $coins_mcap_single_as[$symbol]->name;
            $cryptorank_slug = $coins_cry_single_as[$symbol]->slug;
            $marketcap_slug = $coins_mcap_single_as[$symbol]->slug;
            $cryptorank_img = $coins_cry_single_as[$symbol]->img;

            $intersectable_coins_arr[] = json_encode([
                    'name'   => $cryptorank_name == $marketcap_name ? $cryptorank_name : compact('cryptorank_name', 'marketcap_name'),
                    'slug'   => $cryptorank_slug == $marketcap_slug ? $cryptorank_slug : compact('cryptorank_slug', 'marketcap_slug'),
                    'img'    => compact('cryptorank_img'),
                    'symbol' => $symbol,
                ], JSON_UNESCAPED_UNICODE);
        }


        $output_file_path = storage_path('repository/coins_intersectable_json.txt');
        file_put_contents($output_file_path, implode("\n", $intersectable_coins_arr));
        $this->warn($output_file_path);
    }


}

