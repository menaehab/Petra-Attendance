<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\Level;
use App\Models\Course;
use Livewire\Component;

class TaskEdit extends Component
{
    public Task $task;
    public $title;
    public $description;

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('keywords.title_required'),
        ];
    }

    public function update()
    {
        $this->validate($this->rules());

        $this->task->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        session()->flash('success', __('keywords.task_updated_successfully'));

        return redirect()->route('tasks.index');
    }


    public function render()
    {
        return view('livewire.task-edit');
    }
}
