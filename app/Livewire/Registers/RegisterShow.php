<?php

namespace App\Livewire\Registers;

use App\Models\Register;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Validate;

class RegisterShow extends Component
{
    public Register $register;

    #[Validate('required', as: 'Data da Célula')]
    public $cell_date;

    #[Validate('required', as: 'Total de Pessoas Presentes')]
    public $totPeople;

    #[Validate('required', as: 'Total de Visitantes Presentes')]
    public $totVisitors;

    #[Validate('required', as: 'Nomes das Pessoas Presentes')]
    public $namePeople;

    #[Validate(as: 'Nomes dos Visitantes Presentes')]
    public $nameVisitors;

    #[Validate('required', as: 'Total de Batismos')]
    public $totBaptism;

    #[Validate(as: 'Nomes dos Batizados')]
    public $nameBaptism;

    #[Validate('required', as: 'Total de Conversões')]
    public $totConversions;

    #[Validate(as: 'Nomes dos Convertidos')]
    public $nameConversions;

    #[Validate('required', as: 'Valor Arrecadado de Ofertas')]
    public $offer;

    #[Validate(as: 'Observações')]
    public $obs;

    public function mount(Register $register)
    {
        $this->register = $register;

        $this->cell_date = $register->cell_date->format('d/m/Y');
        $this->totPeople = $register->totPeople;
        $this->totVisitors = $register->totVisitors;
        $this->namePeople = $register->namePeople;
        $this->nameVisitors = $register->nameVisitors;
        $this->totBaptism = $register->totBaptism;
        $this->nameBaptism = $register->nameBaptism;
        $this->totConversions = $register->totConversions;
        $this->nameConversions = $register->nameConversions;

        $this->obs = $register->obs;
        $this->offer = number_format($register->offer, 2, ',', '.');
    }

    public function render()
    {
        return view('livewire.registers.register-show');
    }

    public function save()
    {
        $register = $this->register;
        $register->cell_date = Carbon::createFromFormat('d/m/Y', $this->cell_date);
        $register->offer = (float) str_replace(',', '.', $this->offer);
        $register->totPeople = $this->totPeople;
        $register->totVisitors = $this->totVisitors;
        $register->namePeople = $this->namePeople;
        $register->nameVisitors = $this->nameVisitors;

        $register->totBaptism = $this->totBaptism;
        $register->nameBaptism = $this->nameBaptism;

        $register->totConversions = $this->totConversions;
        $register->nameConversions = $this->nameConversions;
        $register->obs = $this->obs;

        $register->save();

        return redirect()->route('registers.index');
    }

    public function delete()
    {
        $this->register->delete();
        return redirect()->route('registers.index');
    }
}
