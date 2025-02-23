<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class PostPopup extends Component
{
    public $showPopup = false;

    public $postId = null;

    public function render()
    {
        $post = is_null($this->postId)
            ? null
            : Post::with('media')->find($this->postId);

        return view('livewire.post-popup', [
            'post' => $post,
        ]);
    }

    public function closePopup()
    {
        $this->showPopup = false;
    }

    #[On('show-popup')]
    public function showPopup($postId)
    {
        $this->postId = $postId;
        $this->showPopup = true;
    }
}
