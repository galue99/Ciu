<?php

use App\Picnic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        // call our class and run our seeds
        $this->call('BearAppSeeder');
        $this->command->info('Bear app seeds finished.'); // show information in the command line after everything is run
    }

}

// our own seeder class
// usually this would be its own file
class BearAppSeeder extends Seeder {

    public function run() {

        // clear our database ------------------------------------------
        DB::table('bears')->delete();
        DB::table('fish')->delete();
        DB::table('picnics')->delete();
        DB::table('trees')->delete();
        DB::table('bears_picnics')->delete();

        // seed our bears table -----------------------
        // we'll create three different bears

        // bear 1 is named Lawly. She is extremely dangerous. Especially when hungry.
        $bearLawly = App\Bear::create(array(
            'name'         => 'Lawly',
            'type'         => 'Grizzly',
            'danger_level' => 8
        ));

        // bear 2 is named Cerms. He has a loud growl but is pretty much harmless.
        $bearCerms = App\Bear::create(array(
            'name'         => 'Cerms',
            'type'         => 'Black',
            'danger_level' => 4
        ));

        // bear 3 is named Adobot. He is a polar bear. He drinks vodka.
        $bearAdobot = App\Bear::create(array(
            'name'         => 'Adobot',
            'type'         => 'Polar',
            'danger_level' => 3
        ));

        $this->command->info('The bears are alive!');

        // seed our fish table ------------------------
        // our fish wont have names... because theyre going to be eaten

        // we will use the variables we used to create the bears to get their id

        App\Fish::create(array(
            'weight'  => 5,
            'bear_id' => $bearLawly->id
        ));
        App\Fish::create(array(
            'weight'  => 12,
            'bear_id' => $bearCerms->id
        ));
        App\Fish::create(array(
            'weight'  => 4,
            'bear_id' => $bearAdobot->id
        ));

        $this->command->info('They are eating fish!');

        // seed our trees table ---------------------
        App\Tree::create(array(
            'type'    => 'Redwood',
            'age'     => 500,
            'bear_id' => $bearLawly->id
        ));
        App\Tree::create(array(
            'type'    => 'Oak',
            'age'     => 400,
            'bear_id' => $bearLawly->id
        ));

        $this->command->info('Climb bears! Be free!');

        // seed our picnics table ---------------------

        // we will create one picnic and apply all bears to this one picnic


    }

}
