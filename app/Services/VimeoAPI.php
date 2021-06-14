<?php
namespace App\Services;

use Vimeo\Laravel\VimeoManager;
use Vimeo\Vimeo;

class VimeoAPI
{

    public $vimeoApi;

    function __construct(VimeoManager $api) {
        $this->vimeoApi = $api;
    }

    public function get()
    {
        return $this->vimeoApi->request('/tutorial', [], 'GET');
    }

    public function upload(string $filePath) : string
    {
        return $this->vimeoApi->upload($filePath, [
            'name'=>'test obs vapi',
            'description'=>'just random video with vscode'
        ]);
    }

    public function uploadStatus(string $uri)
    {
        $response = $this->vimeoApi->request($uri . '?fields=transcode.status');
        if ($response['body']['transcode']['status'] === 'complete') {
            print 'Your video finished transcoding.';
        } elseif ($response['body']['transcode']['status'] === 'in_progress') {
            print 'Your video is still transcoding.';
        } else {
            print 'Your video encountered an error during transcoding.';
        }
    }

}
