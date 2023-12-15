<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    public function chair_condition($id)
    {
        $chair = Chair::find($id);
        $chair->condition = "2";
        $chair->update();

        return response()->json([
            'message' => 'your data were updated successfully',
        ]);
    }
}
