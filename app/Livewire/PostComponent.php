<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class PostComponent extends Component
{
    public PostForm $form;

    use WithFileUploads;

    use WithPagination;

    public $postId;

    public $isOpen = 0;

    public function create()
    {
        $this->reset('form.title', 'form.body', 'postId');
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;

        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate();
        $this->form->save();
        session()->flash('success', 'Post created successfully.');
        $this->reset('form.title', 'form.body', 'form.image');
        $this->closeModal();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $id;
        $this->form->title = $post->title;
        $this->form->body = $post->body;

        $this->openModal();
    }

    public function update()
    {
        if ($this->postId) {
            $post = Post::findOrFail($this->postId);
            $post->update([
                'title' => $this->form->title,
                'body' => $this->form->body,
            ]);
            session()->flash('success', 'Post updated successfully.');
            $this->closeModal();
            $this->reset('title', 'body', 'image', 'postId');
        }
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('success', 'Post deleted successfully.');
        $this->reset('title', 'body');
    }

    public function render()
    {
        Auth::loginUsingId(1);

        return view('livewire.post-component', [
            'posts' => Post::paginate(5),
        ]);
    }
}
