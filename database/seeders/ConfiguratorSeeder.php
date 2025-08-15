<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\{
    Configurator,
    ConfiguratorStep,
    ConfiguratorField,
    FieldOption,
    FieldCondition
};

class ConfiguratorSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Konfigurator
        $configurator = Configurator::create([
            'name' => 'Tende konfigurator',
            'slug' => 'tende-konfigurator',
        ]);

        // 2. Prvi korak
        $step1 = ConfiguratorStep::create([
            'configurator_id' => $configurator->id,
            'step_number' => 1,
            'title' => 'Odaberite tip tende',
        ]);

        $field1 = ConfiguratorField::create([
            'step_id' => $step1->id,
            'label' => 'Tip tende',
            'name' => 'tip_tende',
            'type' => 'select',
            'required' => true,
            'order' => 1,
        ]);

        FieldOption::insert([
            ['field_id' => $field1->id, 'label' => 'Klizna', 'value' => 'klizna', 'order' => 1],
            ['field_id' => $field1->id, 'label' => 'Bočna', 'value' => 'bocna', 'order' => 2],
        ]);

        // 3. Drugi korak
        $step2 = ConfiguratorStep::create([
            'configurator_id' => $configurator->id,
            'step_number' => 2,
            'title' => 'Unesite dodatne informacije',
        ]);

        // Polje prikazano samo ako je tip_tende = klizna
        $field2 = ConfiguratorField::create([
            'step_id' => $step2->id,
            'label' => 'Širina (cm)',
            'name' => 'sirina',
            'type' => 'number',
            'required' => true,
            'order' => 1,
        ]);

        FieldCondition::create([
            'field_id' => $field2->id,
            'depends_on_field' => 'tip_tende',
            'depends_on_value' => 'klizna',
        ]);

        // Polje prikazano samo ako je tip_tende = bocna
        $field3 = ConfiguratorField::create([
            'step_id' => $step2->id,
            'label' => 'Visina (cm)',
            'name' => 'visina',
            'type' => 'number',
            'required' => true,
            'order' => 2,
        ]);

        FieldCondition::create([
            'field_id' => $field3->id,
            'depends_on_field' => 'tip_tende',
            'depends_on_value' => 'bocna',
        ]);
    }
}
