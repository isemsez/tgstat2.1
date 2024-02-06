<?php

namespace App\Console\Commands;

use Exception;
use File;
use Http;
use Illuminate\Console\Command;

class SaveHtmlPages extends Command
{
    protected $signature = 'save_pages';

    protected $description = 'Get url pages and save them in repository.';

    public function handle(): void
    {
        $coins_reverse = [];
        $coins = file(storage_path('repository/coins_intersectable_json.txt'));
        foreach ($coins as &$coin) {
            $coin = json_decode($coin);
            array_unshift($coins_reverse, $coin);
        }
        $this->info(count($coins) . ' coins.');

        $mcap_dir = storage_path('repository/coinmarketcap');
        file_exists($mcap_dir) ? File::deleteDirectory($mcap_dir) : '';
        mkdir($mcap_dir);

        $cry_dir = storage_path('repository/cryptorank');
        file_exists($cry_dir) ? File::deleteDirectory($cry_dir) : '';
        mkdir($cry_dir);


        $ix = count($coins) + 1;
        foreach ($coins_reverse as $coin) {
            $ix--;
            $slug = $this->get_slug($coin);
            $url_marketcap = "https://coinmarketcap.com/currencies/$slug/";
            try {
                $html_marketcap = Http::get($url_marketcap)->body();
                $bytes = file_put_contents("$mcap_dir/$slug.html", $html_marketcap);
                if ( $bytes == 17162 ) {
                    $this->error("Page not found  -  $url_marketcap");
                }
            } catch (Exception $e) {
                $this->info("  Not downloaded  -  marketcap  -  $slug\n" . __METHOD__ . ", " . __LINE__. ", " . json_encode($e->getMessage()));
            }

            $slug = $this->get_slug($coin, 'cryptorank');
            $url_cry = "https://cryptorank.io/price/$slug";
            try {
                $html_cry = Http::get($url_cry)->body();
                $bytes = file_put_contents("$cry_dir/$slug.html", $html_cry);
                if ( $bytes == 17162 ) {
                    $this->error("Page not found  -  $url_cry");
                }
            } catch (Exception $e) {
                $this->info("  Not downloaded  -  cryptorank  -  $slug\n" . __METHOD__ . ", " . __LINE__. ", " . json_encode($e->getMessage()));
            }

            $this->info($ix);
            sleep(1);
        }

    }

    private function get_slug($coin, $site = 'marketcap') {
        throw_unless(in_array($site, ['marketcap','cryptorank']), new Exception('Wrong site as parameter ' . $site . '.')) ;
        if ( gettype($coin->slug) == 'object' ) {
            $site .= '_slug';
            return $coin->slug->$site;
        }
        return $coin->slug;
    }

}

