<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Form;

class PostForm extends Form
{
    use WithFileUploads;

    #[Rule('nullable|image|max:2048')] // 2MB Max
    public $image;

    #[Rule('required|min:3')]
    public $title;

    #[Rule('required|min:3')]
    public $body;

    public function save()
    {

        if ($this->image) {
            $imagePath = $this->image->store('public/photos');
        } else {
            $imagePath = null;
        }

        Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'created_by' => Auth::id(),
            'image' => $imagePath,
        ]);
    }
}
