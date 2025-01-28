<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostGrid extends Component
{
    public function render()
    {
        $posts = Post::with('featuredMedia')->orderBy('id', 'desc')->paginate(15);

        return view('livewire.post-grid', [
            'posts' => $posts
        ]);
   }

   public function open($postId)
   {
        $this->dispatch('show-popup', $postId);
   }
}
