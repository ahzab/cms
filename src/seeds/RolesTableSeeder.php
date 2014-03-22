<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// Reset table
		// DB::table('roles')->truncate();

		$roles = Pongo::system('roles');

		foreach ($roles as $name => $level) {

			$role = array(
						'name' => $name,
						'level' => $level
					);

			DB::table('roles')->insert($role);

		}
		
	}

}
