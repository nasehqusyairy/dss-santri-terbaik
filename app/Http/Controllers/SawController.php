<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Criteria;
use App\Models\Student;
use Illuminate\Http\Request;

class SawController extends Controller
{

    public function decision()
    {
        return view('matrixes.saw.decision', [
            'title' => 'Decision Matrix',
            'students' => Student::all(),
            'criterias' => Criteria::all(),
            'maxmin' => $this->maxmin(),
        ]);
    }

    public function normalization()
    {
        return view('matrixes.saw.normalization', [
            'title' => 'Normalization Matrix',
            'students' => Student::all(),
            'criterias' => Criteria::all(),
            'maxmin' => $this->maxmin(),
        ]);
    }

    public function optimization()
    {
        return view('matrixes.saw.optimization', [
            'title' => 'Optimization Matrix',
            'students' => Student::all(),
            'criterias' => Criteria::all(),
            'maxmin' => $this->maxmin(),
        ]);
    }

    public function ranking()
    {
        $students = Student::all();
        $criterias = Criteria::all();
        $maxmin = $this->maxmin(); // assuming maxmin() is in the same class

        $ranking = [];

        foreach ($students as $student) {
            if ($student->criterias->count() === $criterias->count()) {
                $final = 0;
                foreach ($student->criterias->sortByDesc('weight') as $criteria) {
                    $value = ((($criteria->pivot->score * $criteria->weight) / $maxmin[$criteria->name]['max']) * $criteria->weight);
                    $final += $value;
                }
                $ranking[] = [
                    'name' => $student->name,
                    'group' => $student->group->name,
                    'score' => $final,
                ];
            }
        }
        usort($ranking, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });
        return $ranking;
    }

    public static function maxmin()
    {
        $students = Student::all();
        $criterias = Criteria::all();
        $calculated_values = [];

        foreach ($students as $student) {
            if ($student->criterias->count() === $criterias->count()) {
                foreach ($student->assessments as $assessment) {
                    $calculated_value = ($assessment->score * $assessment->criteria->weight);
                    $calculated_values[$assessment->criteria->name][] = $calculated_value;
                }
            }
        }

        $maxmin_values = [];
        foreach ($calculated_values as $criteria_name => $values) {
            $maxmin_values[$criteria_name] = [
                'max' => max($values),
                'min' => min($values),
            ];
        }

        return $maxmin_values;
    }

    public function home()
    {
        return view('saw', [
            'title' => 'The Best Student According to DSS (SAW Method)',
            'ranking' => $this->ranking()
        ]);
    }
}
