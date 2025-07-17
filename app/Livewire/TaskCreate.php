<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\Level;
use App\Models\Course;
use Livewire\Component;

class TaskCreate extends Component
{
    public $title;
    public $description;
    public $course_id;
    public $level_id;
    public $levels;
    public $courses = [];

    public function updatedLevelId($value)
    {
        $this->courses = Course::where('level_id', $value)->get();
        $this->course_id = null;
        $this->title = null;
        $this->description = null;
        if ($value == null) {
            $this->courses = [];
        }
    }

    public function rules() {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
        ];
    }
    public function messages() {
        return [
            'title.required' => __('keywords.title_required'),
            'description.required' => __('keywords.description_required'),
            'course_id.required' => __('keywords.course_required'),
        ];
    }
    public function create() {
        $this->validate($this->rules());
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'course_id' => $this->course_id,
        ]);
        return redirect()->route('tasks.index')->with('success', __('keywords.task_created_successfully'));
    }
    public function mount()
    {
        $this->levels = Level::all();
    }

    public function render()
    {
        return view('livewire.task-create', [
            'levels' => $this->levels,
        ]);
    }
}
