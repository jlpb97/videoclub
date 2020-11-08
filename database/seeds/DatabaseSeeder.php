<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\User;

class DatabaseSeeder extends Seeder
{

	private $arrayPeliculas = array(		array(			'title' => 'El padrino',			'year' => '1972', 			'director' => 'Francis Ford Coppola', 			'poster' => 'https://pics.filmaffinity.com/El_padrino-993414333-large.jpg', 			'rented' => false, 			'synopsis' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.'		),		array(			'title' => 'El Padrino. Parte II',			'year' => '1974', 			'director' => 'Francis Ford Coppola', 			'poster' => 'https://i.pinimg.com/originals/4e/3f/41/4e3f41bab342202c89c677305ef4071c.jpg', 			'rented' => false, 			'synopsis' => 'Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael Corleone como jefe de los negocios familiares y los orígenes del patriarca, el ya fallecido Don Vito, primero en Sicilia y luego en Estados Unidos, donde, empezando desde abajo, llegó a ser un poderosísimo jefe de la mafia de Nueva York.'		),		array(			'title' => 'La lista de Schindler',			'year' => '1993', 			'director' => 'Steven Spielberg', 			'poster' => 'https://es.web.img3.acsta.net/pictures/19/02/12/18/49/4078948.jpg', 			'rented' => false, 			'synopsis' => 'Segunda Guerra Mundial (1939-1945). Oskar Schindler (Liam Neeson), un hombre de enorme astucia y talento para las relaciones públicas, organiza un ambicioso plan para ganarse la simpatía de los nazis. Después de la invasión de Polonia por los alemanes (1939), consigue, gracias a sus relaciones con los nazis, la propiedad de una fábrica de Cracovia. Allí emplea a cientos de operarios judíos, cuya explotación le hace prosperar rápidamente. Su gerente (Ben Kingsley), también judío, es el verdadero director en la sombra, pues Schindler carece completamente de conocimientos para dirigir una empresa.'		),		array(			'title' => 'Pulp Fiction',			'year' => '1994', 			'director' => 'Quentin Tarantino', 			'poster' => 'https://pics.filmaffinity.com/Pulp_Fiction-210382116-mmed.jpg', 			'rented' => true, 			'synopsis' => 'Jules y Vincent, dos asesinos a sueldo con muy pocas luces, trabajan para Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse manos a la obra. Su misión: recuperar un misterioso maletín. '		));

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        self::seedCatalog();
        $this->command->info('Tabla catálogo inicializada con datos!');

        self::seedUsers();
        $this->command->info('Tabla usuarios inicializada con datos!');
    }

    private function seedCatalog()
    {
    	DB::table('movies')->delete();
    	foreach ($this->arrayPeliculas as $pelicula) {
    		$p = new Movie();
    		$p->title = $pelicula['title'];
    		$p->year = $pelicula['year'];
    		$p->director = $pelicula['director'];
    		$p->poster = $pelicula['poster'];
    		$p->rented = $pelicula['rented'];
    		$p->synopsis = $pelicula['synopsis'];
    		$p->save();
    	}
    }

    private function seedUsers()
    {
        DB::table('users')->delete();
        
        $u1 = new User();
        $u1->name = 'admin1';
        $u1->email = 'admin1@email.com';
        $u1->password = bcrypt('12345');
        $u1->save();

        $u2 = new User();
        $u2->name = 'admin2';
        $u2->email = 'admin2@email.com';
        $u2->password = bcrypt('12345');
        $u2->save();
    }
}
