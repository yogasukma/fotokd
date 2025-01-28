<?php

namespace App\Console\Commands;

use App\Models\Media;
use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class CapturePhoto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:capture-photo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Capture photo and content from katadata';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mainPage = $this->scrap("https://katadata.co.id/foto");

        $mainPage->filter(".content-text")->each(function(Crawler $node) {
            $url = $node->filter('a')->attr('href');
            $title = $node->filter('.content-title')->text();
            $title = str_replace("[Foto] ", "", $title);

            $words = explode("/", $url);
            $id = $words[4];

            $this->info($title);

            $findPost = Post::where("guid", $id)->first();

            if (!$findPost) {
                $post = Post::create([
                    'guid' => $id,
                    'title' => $title,
                    'url' => $url
                ]);

                $postPage = $this->scrap($url);

                $postPage->filter(".gallery-item")->each(function(Crawler $childNode) use($post) {
                    $imageUrl = $childNode->filter('img')->attr('src');
                    $imageDescription = $childNode->filter('img')->attr('alt');

                    $words = explode("/", $imageUrl);
                    $imageName = $words[8];

                    $imageFile = $this->getContentUrl($imageUrl);
                    Storage::put(sprintf("images/%s/%s", $post->guid, $imageName), $imageFile);

                    $imageAuthor = $childNode->filter('.img-credit')->text();

                    Media::create([
                        'post_guid' => $post->guid,
                        'filename' => $imageName,
                        'description' => $imageDescription,
                        'author' => $imageAuthor
                    ]);
                });
            }
        });
    }

    private function scrap($url) 
    {
        $page = $this->getContentUrl($url);

        $html = new Crawler($page);

        return $html;
    }

    private function getContentUrl($url)
    {
        $client = new Client();

        $request = $client->request('GET', $url);

        $page = $request->getBody()->getContents();

        return $page;
    }
}
