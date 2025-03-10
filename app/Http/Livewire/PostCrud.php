<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostCrud extends Component
{
    public $posts;
    public $title, $content, $postId;
    public $isEditMode = false;

    // Mount to get posts
    public function mount()
    {
        $this->posts = Post::all();
    }

    // Render the view
    public function render()
    {
        return view('livewire.post-crud');
    }

    // Store new post
    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Post created successfully!');
        $this->resetFields();
        $this->posts = Post::all();
    }

    // Edit existing post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->isEditMode = true;
    }

    // Update post
    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::find($this->postId);
        $post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Post updated successfully!');
        $this->resetFields();
        $this->posts = Post::all();
    }

    // Delete post
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        session()->flash('message', 'Post deleted successfully!');
        $this->posts = Post::all();
    }

    // Reset fields
    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->isEditMode = false;
        $this->postId = null;
    }
}

