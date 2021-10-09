<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\School;
use Livewire\WithPagination;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class Students extends Component
{
    use WithPagination;

    public $sortField = 'name';
    public $sortAsc = true;
    public $search = '';
    public $school_id = '';
    public $sudent_id = '';
    public $sudent_name;
    public $sudent_class;
    public $sudent_stage;
    public $sudent_mobile;
    public $sudent_status;
    public $modalFormVisible = false;
    public $changeStatus= '';

    public function changeStatus($status)
    {
        $this->changeStatus = $status;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function showUpdateModal($id)
    {
        $this->modalFormReset();
        $this->modalFormVisible = true;
        $this->sudent_id = $id;
        $this->loadModalData();
    }

    public function loadModalData()
    {
        $data = Student::find($this->sudent_id);
        $this->school_id = $data->school_id;
        $this->sudent_name = $data->name;
        $this->sudent_class = $data->class;
        $this->sudent_stage = $data->stage;
        $this->sudent_mobile = $data->mobile;
        $this->sudent_status = $data->status;
    }

    public function modelData()
    {
        $data = [
            'school_id' =>  $this->school_id,
            'mobile' => $this->sudent_mobile,
            'status' =>  $this->sudent_status,
        ];

        return $data;
    }

    public function rules()
    {
        return [
            'school_id' => ['required'],
            'sudent_mobile' => ['numeric', 'digits_between:10,12'],
            'sudent_status' => ['required'],
        ];
    }

    public function modalFormReset()
    {
        $this->school_id = null;
        $this->sudent_mobile = null;
        $this->sudent_status = null;
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate();
        $student = Student::where('id', $this->sudent_id)->first();

        $student->update($this->modelData());

        $this->modalFormVisible = false;

        $this->alert('success', 'تم حفظ البيانات', [
            'position'  =>  'center',
            'timer'  =>  3000,
            'toast'  =>  true,
            'text'  =>  null,
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function render()
    {
        $schools = School::orderBy('name')->get();
        $students = Student::search($this->search)->Where('status', 'like','%'.$this->changeStatus.'%')->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(50);

        return view('livewire.students', [
            'schools' => $schools,
            'students' => $students
        ]);
    }
}
