<?php

namespace App\Http\Controllers;

use App\Models\Cell;
use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CellController extends Controller
{
    public function selectCell()
    {
        $cells = Auth::user()->cells;
        return view('selectCell', compact('cells'));
    }
    public function register(Cell $cell)
    {
        return view('register', compact('cell'));
    }

    public function saveRegister(Request $request)
    {
        $register = new Register([
            "totPeople" => $request->totPeople,
            "namePeople" =>  $request->namePeople,
            "totVisitors" =>  $request->totVisitors,
            "nameVisitors" =>  $request->nameVisitors,
            "totBaptism" =>  $request->totBaptism,
            "nameBaptism" =>  $request->nameBaptism,
            "totConversions" =>  $request->totConversions,
            "nameConversions" =>  $request->nameConversions,
            "obs" =>  $request->obs,
        ]);

        $register->cell_date = Carbon::createFromFormat('d/m/Y', $request->cell_date);
        $register->offer = (double) str_replace(',', '.', $request->offer);

        $register->user()->associate(Auth::user());
        $register->cell()->associate($request->cellID);

        $register->save();


        return redirect()->route('cells.register', $request->cellID)->with('success', 'Registro cadastrado com sucesso!');
    }
}
