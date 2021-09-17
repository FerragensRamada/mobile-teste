<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class weekcomics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:weekcomics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $apikey = include '../publickey.php';
      $now = time();
      $privateKey = include '../privatekey.php';
      $hash = md5($now . $privateKey . $apikey);

      $response = Http::get('https://gateway.marvel.com:443/v1/public/comics?ts=' . $now . '&apikey=' . $apikey . '&hash=' . $hash  . "&dateDescriptor=lastWeek" );
      $res = json_decode($response);
      $results = $res->data->results;

      Comic::firstOrCreate([
        'comicid' => $request->input('id'),
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'ean' => $request->input('ean'),
        'price' => $request->input('price')
      ]);
    }
}
