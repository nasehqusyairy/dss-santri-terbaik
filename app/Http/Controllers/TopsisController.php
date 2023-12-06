<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Criteria;
use App\Models\Student;
use Illuminate\Http\Request;

class TopsisController extends Controller
{

    public function home()
    {
        return view('topsis', [
            'title' => 'The Best Student According to DSS (TOPSIS Method)',
            'ranking' => $this->splussmin(),
        ]);
    }

    public function normalization()
    {
        return view('matrixes.topsis.normalization', [
            'title' => 'Normalization Matrix',
            'students' => Student::all(),
            'dividing' => $this->dividingValue(),
            'criterias' => Criteria::all(),
        ]);
    }

    public function weightrating()
    {
        return view('matrixes.topsis.weightrating', [
            'title' => 'Weight Rating Matrix',
            'students' => Student::all(),
            'dividing' => $this->dividingValue(),
            'criterias' => Criteria::all(),
        ]);
    }

    public function dividingValue()
    {
        $assessments = Assessment::all();
        $squared_totals = [];

        foreach ($assessments as $assessment) {
            $squared_value = pow($assessment->score, 2);
            if (!isset($squared_totals[$assessment->criteria->name])) {
                $squared_totals[$assessment->criteria->name] = 0;
            }
            $squared_totals[$assessment->criteria->name] += $squared_value;
        }

        $dividing_values = [];
        foreach ($squared_totals as $criteria_name => $total) {
            $dividing_values[$criteria_name] = sqrt($total);
        }
        // dd($dividing_values);
        return $dividing_values;
    }
    public function maxmin()
    {
        $assessments = Assessment::all();
        $values = [];

        foreach ($assessments as $assessment) {
            if (!isset($values[$assessment->criteria->name])) {
                $values[$assessment->criteria->name] = [];
            }
            $values[$assessment->criteria->name][] = $assessment->score;
        }

        $maxmin_values = [];
        foreach ($values as $criteria_name => $values) {
            $maxmin_values[$criteria_name] = [
                'max' => max($values),
                'min' => min($values),
            ];
        }
        // dd($maxmin_values);
        return $maxmin_values;
    }
    public function aplusamin()
    {
        $values = $this->weightratingValues();
        $aplusamin_values = [];
        foreach ($values as $criteria_name => $values) {
            $aplusamin_values[$criteria_name] = [
                'aplus' => max($values),
                'amin' => min($values),
            ];
        }

        // dd($aplusamin_values);
        return $aplusamin_values;
    }

    public function weightratingValues()
    {
        $assessments = Assessment::all();
        $dividingValues = $this->dividingValue();
        $values = [];

        foreach ($assessments as $assessment) {
            $calculated_value = $assessment->score / $dividingValues[$assessment->criteria->name] * $assessment->criteria->weight;
            if (!isset($values[$assessment->criteria->name])) {
                $values[$assessment->criteria->name] = [];
            }
            $values[$assessment->criteria->name][$assessment->student->name] = $calculated_value;
        }

        // dd($values);
        return $values;
    }
    public function splussmin()
    {
        $students = Student::all();
        $aplusamin = $this->aplusamin();
        $weightratingValues = $this->weightratingValues();

        $splussmin_values = [];

        foreach ($students as $student) {
            if ($student->criterias->count() > 0) {
                $splus = 0;
                $smin = 0;
                foreach ($student->criterias->sortByDesc('weight') as $criteria) {
                    $splus += pow($weightratingValues[$criteria->name][$student->name] - $aplusamin[$criteria->name]['aplus'], 2);
                    $smin += pow($weightratingValues[$criteria->name][$student->name] - $aplusamin[$criteria->name]['amin'], 2);
                }
                $splussmin_values[] = [
                    'student' => $student,
                    'splus' => sqrt($splus),
                    'smin' => sqrt($smin),
                ];
            }
        }
        // dd($splussmin_values);
        usort($splussmin_values, function ($a, $b) {
            $valueA = $a['smin'] / ($a['splus'] + $a['smin']);
            $valueB = $b['smin'] / ($b['splus'] + $b['smin']);
            return $valueB <=> $valueA;
        });

        return $splussmin_values;
    }
}
