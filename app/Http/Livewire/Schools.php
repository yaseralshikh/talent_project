<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\School;
use App\Models\Student;

use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;


class Schools extends Component
{
    public $school_id = '';
    public $sudent_id = '';
    public $sudent_mobile;
    public $sudent_status;
    public $modalFormVisible = false;

    public function changeSchool($value)
    {
        $this->school_id = $value;
    }

    public function showUpdateModal($id)
    {
        $this->sudent_id = $id;
        $this->modalFormVisible = true;
        $this->modalFormReset();
    }

    public function modelData()
    {
        $data = [
            'mobile' => $this->sudent_mobile,
            'status' => 1,
        ];

        return $data;
    }

    public function modalFormReset()
    {
        $this->sudent_mobile = null;
        $this->resetValidation();
    }

    public function rules()
    {
        return [
            'sudent_mobile' => ['required', 'numeric', 'digits_between:10,12'],
        ];
    }

    public function update()
    {
        $this->validate();
        $student = Student::where('id', $this->sudent_id)->first();

        $student->update($this->modelData());

        $this->modalFormVisible = false;

        $this->alert('success', 'تم حفظ رقم الهاتف', [
            'position'  =>  'center',
            'timer'  =>  3000,
            'toast'  =>  true,
            'text'  =>  null,
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }

    public function render()
    {
        $activeStud = Student::where('status', true)->count();
        $disActiveStud = Student::where('status', false)->count();

        $pieChartModel   =
            (new PieChartModel())
                ->setTitle('الطلاب المحدث بياناتهم')
                ->addSlice('محدث', $activeStud, '#22D430')
                ->addSlice('غير محدث', $disActiveStud, '#D43322');

        $schools = School::orderBy('name')->get();
        $students = Student::where('school_id', $this->school_id)->orderBy('name')->get();

        return view('livewire.schools', [
            'schools' => $schools,
            'students' => $students,
            'pieChartModel' => $pieChartModel
        ]);
    }
}
