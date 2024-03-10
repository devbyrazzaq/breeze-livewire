<?php

namespace App\Livewire\Forms;

use App\Enums\PriorityType;
use App\Enums\StatusType;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate('required', message: 'Title tidak boleh kosong')]
    #[Validate('min:3', message: "Title tidak boleh  kurang dari 3 karakter")]
    public $title;

    #[Validate('required', message: 'Slug tidak boleh kosong')]
    #[Validate('min:3', message: "Slug tidak boleh kurang dari 3 karakter")]
    public $slug;

    #[Validate('required', message: 'Slug tidak boleh kosong')]
    #[Validate('min:12', message: "Slug tidak boleh kurang dari 12 karakter")]
    public $description;

    #[Validate('required', message: 'Silahkan pilih status')]
    #[Validate([new Enum(StatusType::class)])]
    public $status;

    #[Validate('required', message: 'Silahkan pilih prioritas')]
    #[Validate([new Enum(PriorityType::class)])]
    public $priority;

    #[Validate('required', message: 'Deadline tidak boleh kosong')]
    #[Validate('date')]
    public $deadline;

    public function createTask()
    {
        $this->validate();
        auth()->user()->tasks()->create($this->all());
    }
}
