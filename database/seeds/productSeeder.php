<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Product::class, 10)->create();
        Product::create(
            [   'titulo' => 'GTA Vice City',
                'descripcion' => 'Primer entrega de la saga GTA',
                'precio_unitario' => 200,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 2,
                'marca_id' => 1,
                'poster' => 'OLZHIxbhzZYhHMWuCAcFlueH1AtPO9zZIjQvTip4.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'GTA San Andreas',
                'descripcion' => 'Segunda entrega de la saga GTA',
                'precio_unitario' => 250,
                'descuento' => 5,
                'stock'=> 10,
                'categoria_id' => 2,
                'marca_id' => 1,
                'poster' => 'NfXEH0oeeD3Afk5x0jAtD9Bla9K2g3iYENwALrOz.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'GTA III',
                'descripcion' => 'Tercera entrega de la saga GTA',
                'precio_unitario' => 300,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 2,
                'marca_id' => 1,
                'poster' => 'Q6Xehp8DTZD2zsOdI9dRPZ2hOo9mPsEHykG0egwt.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'GTA IV',
                'descripcion' => 'Cuarta entrega de la saga GTA',
                'precio_unitario' => 400,
                'descuento' => 15,
                'stock'=> 23,
                'categoria_id' => 2,
                'marca_id' => 1,
                'poster' => 'LmseStTwgGkFLbD9qmgMwwvBLOOS1ADmHx34piet.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'GTA V',
                'descripcion' => 'Quinta entrega de la saga GTA',
                'precio_unitario' => 500,
                'stock'=> 50,
                'categoria_id' => 2,
                'marca_id' => 1,
                'poster' => '1276x6JtkEaQ4okQWAd13CvSpXzLORgQvlm0eoOQ.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'Battlefield 3',
                'descripcion' => 'Juego de guerra clásico',
                'precio_unitario' => 200,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 2,
                'marca_id' => 2,
                'poster' => 'fz94PYy3oX0cCgXRjH9G4H1oRqpklqKZf1jIBjEE.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'Battlefield 4 - Second Assault',
                'descripcion' => 'Juego de guerra clásico',
                'precio_unitario' => 300,
                'descuento' => 0,
                'stock'=> 1,
                'categoria_id' => 2,
                'marca_id' => 2,
                'poster' => 'oYPfOvdKJ3u9zJKbF41jTXeo9WktNUEbFgC4Jnak.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'Battlefield 5',
                'descripcion' => 'Juego de guerra clásico para XBOX',
                'precio_unitario' => 500,
                'descuento' => 10,
                'stock'=> 10,
                'categoria_id' => 2,
                'marca_id' => 2,
                'poster' => '9w5k0cB1Hxjhcniq48tfIAZKAd7YFq7YzPh4MkCt.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'Call Of Duty - Infinity Warfare',
                'descripcion' => 'Juego de guerra de la saga Call Of Duty',
                'precio_unitario' => 400,
                'descuento' => 10,
                'stock'=> 30,
                'categoria_id' => 2,
                'marca_id' => 3,
                'poster' => 'ywxFRoZ200nO7AaZ2guYiUSuvUHHa6m3bBvZwnUS.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'Call Of Duty WarZone',
                'descripcion' => 'Juego de guerra de la saga Call Of Duty para jugar multijugador',
                'precio_unitario' => 500,
                'descuento' => 5,
                'stock'=> 30,
                'categoria_id' => 2,
                'marca_id' => 3,
                'poster' => 'h8kXo9nljBvduOhDzpvfhG7dAiO2p2huq64YIVgY.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'Red Dead Redemption 3',
                'descripcion' => 'Juego de aventura para PS4',
                'precio_unitario' => 400,
                'descuento' => 10,
                'stock'=> 60,
                'categoria_id' => 3,
                'marca_id' => 5,
                'poster' => "TfqVzu0lu0ZHxfFeiJO2I8QzdRg4DIsFev4ETWGp.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Resident Evil 2',
                'descripcion' => 'Segunda entrega de la saga Resident Evil',
                'precio_unitario' => 300,
                'descuento' => 25,
                'stock'=> 30,
                'categoria_id' => 3,
                'marca_id' => 2,
                'poster' => "eKAYOnKb1CVuxMyNGJD2tiWepcw90AknTiK8CmAK.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Resident Evil 3',
                'descripcion' => 'Tercera entrega de la saga Resident Evil',
                'precio_unitario' => 400,
                'stock'=> 39,
                'categoria_id' => 3,
                'marca_id' => 5,
                'poster' => '5K3Dx9gFJOkTAIgFcXbTtELI3qyHal4U0tnWLDOx.jpeg'
            ]);
        Product::create(
            [   'titulo' => 'The Last Of Us',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 200,
                'descuento' => 0,
                'stock'=> 70,
                'categoria_id' => 3,
                'marca_id' => 2,
                'poster' => "dGfVWYLDIWX6txgAio7fyq8J3assZeRFdsfwVvgI.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Walking Dead',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 200,
                'descuento' => 0,
                'stock'=> 60,
                'categoria_id' => 3,
                'marca_id' => 2,
                'poster' => "Ow69Af5hqx6BYTkQhjkEoi1z3yI3fdCGzLCnGo52.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'PastCure',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 50,
                'categoria_id' => 3,
                'marca_id' => 2,
                'poster' => "vJ5ZejXDAKl4WII7SMN6YUcJcjaUsAONyubzY8T7.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Monster Hunter',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 40,
                'categoria_id' => 3,
                'marca_id' => 2,
                'poster' => "FmqcnoBDd0pKj2vS8QxscctgppKihBg4K3TfDFPP.png"
            ]);
        Product::create(
            [   'titulo' => 'Minecraft',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 500,
                'descuento' => 0,
                'stock'=> 30,
                'categoria_id' => 3,
                'marca_id' => 2,
                'poster' => "JAypOzKPnLsmtfejmQqBHR7Q60n4aU31tEgNvmhq.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Life Is Strange',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 3,
                'marca_id' => 2,
                'poster' => "yxliis42QquGnqTKGj4bnvRxSSmNB6eAN7K6n0uM.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Heavy Rain',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 50,
                'categoria_id' => 3,
                'marca_id' => 2,
                'poster' => "C0pkv20S9jWYP7FtfYM8hno0COteTpAAqY988Gcc.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Arkanoid',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "2HB03ylEhb6tB4pUlNhBEqZJUMRwAk2ByYzTbKuz.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Asteroids',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "y1G7ToGnIkiHQadLCgjKPHWL3vuaZbeI6fza9DCu.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Buscaminas',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "y9dxO6gdZVqQu03QndAxfgY5sHPWvBF3IJHTTplf.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Monkey Island',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "XIghUI5GKf1VhPtUJ0f6CSZCuADI61xGTTuVntO4.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'PacMan',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "8YV11VLqOgPdrDjz63pT7DFzpYu67BKjyE3A70QD.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Pinball',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "vX9Bh1gTHQqZx4fsEbuKIzpJX0t12mCBU8l01BGB.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'PuzzleBooble',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "xXgHt7YP4zB1r6mGPNznXouOlPomYcbMfYYYCU8C.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Solitario Spider',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "ozkysI3dl9uzPDZ3qwindZJbfnTI3HjPtuV5lTw1.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Space Invaders',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "8ulDB737YGP0Ugb8L08U0DIZDy6c3jKAJWVwKP45.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Tetris',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 50,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 4,
                'marca_id' => 2,
                'poster' => "aKkHChiddsm1aAerK3tTr7BYr2SIqrN820ggKyI1.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Need For Speed Hot Pursuit',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "JSVr3ko2lghGpkXhMUmlAsumKvNdjl5nqUmMr1zn.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Need For Speed No Limits',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "Dz074DKmFCkTGGx2PKwLINY3VLdUo0lkCcmkRqgN.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Need For Speed PayBacks',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "tqFVDZ3sL0LXNmpyx5uzLrBJf6mRrFSzabSeIsi8.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Need For Speed Rivals',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "0HcV0QwoqKlNRWzK03zhoI0c3wXFYWbALemwdVGX.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Need For Speed Underground 3',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 50,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "sKyFA7EhsRmfbfxM04M6UJylj8ogz2yIFTGRnUez.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Need For Speed Underground 1',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 40,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "ARVAOzrVeqjX8kcXcBtJNcOPDPKW1HSNSgUoguZg.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'RealRacing 3',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 30,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "4wa5THDbp1z17kagrYmFXGjaN0eRSOquSD46BuRn.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'GRID',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 20,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "YURLH5pDKDe8veoJ8WOzY7mhLOfId1jXH3Qp7UeH.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'MR4 MotoRacer',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "eM7ysq4BcNRL61DLKEHRo0s5iCS1MtzNZSVh6kRF.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'MX vs ATV',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 5,
                'marca_id' => 2,
                'poster' => "0t5pMxzNHa7uV6LFO5ORLU3ykmQrVP1Y0W3o4kvu.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'FIFA 20',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 2,
                'poster' => "Y7GMiW9Cjqb8U9YC5MehkVhm7kxLpggkZkAUARrX.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'PES 20',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 3,
                'poster' => "vsMfjs0C25F1B0fqYQB7I5OQSgvUdBm7bzJcylif.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'FIFA 19',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 2,
                'poster' => "dsJhw0eZ0Pf5Ph6TvbYjNPvw7YPYbEyIOq6Blxl2.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'PES 19',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 3,
                'poster' => "10XqJiiKhD3nxM8CFaWzy4NqVxJ5bbLGwdV6bIe9.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'FIFA 18',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 20,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 2,
                'poster' => "xwki2vjXl3wWxEjvgNxhh3AM7bSwMEG7H15qiOks.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'PES 18',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 20,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 3,
                'poster' => "cVdkEl7oTa70cZNRzU8ytjHESb6lW1zae8FnQXQB.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Football Manager 2020',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 2,
                'poster' => "RY11OPuoIDn77lKpwEkhzJE4JeRCGQfv4fhsrlhC.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'NBA 2020 - XBOX',
                'descripcion' => 'Este juego está disponible para XBOX',
                'precio_unitario' => 600,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 2,
                'poster' => "wEYDUPIlQAlWo7oRXeSGJjmQ4GwfT0cBUGM19xdA.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'NBA 2020 - PS4',
                'descripcion' => 'Este juego está disponible para XBOX.',
                'precio_unitario' => 600,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 2,
                'poster' => "XGC5Zi573mRgBYzmW15NXCwHjlP47B7cfuJJdp23.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Summer Athletics',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 200,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 6,
                'marca_id' => 2,
                'poster' => "uMgJM8o8GjSCSn0OTTG7POsb3zkI4xGIX4xNuoB4.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Age Of Empires II',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 400,
                'descuento' => 10,
                'stock'=> 60,
                'categoria_id' => 7,
                'marca_id' => 5,
                'poster' => "eU596D8IGNA9fmcVzs83ohOjKOTqJJkMuAwlNqt0.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Age Of Empires III',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 300,
                'descuento' => 25,
                'stock'=> 30,
                'categoria_id' => 7,
                'marca_id' => 2,
                'poster' => "aRXFgiJzxLFLMutQYHg24smxsWag8dHQxToaDNYF.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Commandos I',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 400,
                'stock'=> 39,
                'categoria_id' => 7,
                'marca_id' => 5,
                'poster' => "CCUUThjYVgl5H1QdWMMzDw4hdX0RvZbuloSF0nWJ.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Commandos II',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 200,
                'descuento' => 0,
                'stock'=> 70,
                'categoria_id' => 7,
                'marca_id' => 2,
                'poster' => "fg6ZfgRwAiIe4b66iiti2aGuI2LYaUwP2LV7qzJ9.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Commandos III',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 200,
                'descuento' => 0,
                'stock'=> 60,
                'categoria_id' => 7,
                'marca_id' => 2,
                'poster' => "OQEtct7TCFDwZVCj5TKHAvwzslbe6VUdoX91jn6a.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Dungeon Keeper I',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 50,
                'categoria_id' => 7,
                'marca_id' => 2,
                'poster' => "ULTI2DHFUIcAnoIlNEHR0yarYcU6BFjcLkDazqTw.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Dungeon Keeper II',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 40,
                'categoria_id' => 7,
                'marca_id' => 2,
                'poster' => "ZUYoM2eCYwRlipCcEiDTMf7FSy1N6CAMZlsK6Jdj.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Red Alert I',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 500,
                'descuento' => 0,
                'stock'=> 30,
                'categoria_id' => 7,
                'marca_id' => 2,
                'poster' => "b17GOmGHqcYSyY7aHgwOh0fSm0bk99D5pdSUUKNC.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Red Alert II',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 7,
                'marca_id' => 2,
                'poster' => "y9L2PHpkKLg17LCB8Ddab31tDbrMQohA4J8uT7LV.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Red Alert III',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 50,
                'categoria_id' => 7,
                'marca_id' => 2,
                'poster' => "4XUMuNf4wXCze2C1nXLPcOGC2fuO2sG9yTmYPwD3.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'World Of Warcraft',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "mUWZYUK7B3lhtcZ7BEYRDpeTyrgtvqRK1lMsdShZ.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Aion',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 430,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "M0RZfdkwnvoYpUVaeabtFpJAl2MgkYz0s3ybVOeA.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Black Desert',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 420,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "Ep5xqjk6NtjneCOZqtLfzU7dosXpia5XWB3xXIel.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'DC Universe Online',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 400,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "NsbBQIa6naFvbP59OIPsUPeyJtseLWKNHav7Cfd8.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'EVE Empire Space I',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 300,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "DE31boyyFdBxvvEkguSS1jGtWW7Ig3eARJwu4ttP.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Guild Wars 2',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 550,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "xyUFi0jdHYdVwq66TuDdnoarHBhYjZHIVO7eBSoe.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Never Winter Uprising',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 450,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "2XLeZ6tCAsh5vajVRh4F6vOAXgDkNAUqkEApqSYz.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Star Trek Legacy',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 350,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "D0S6tYHYDxZBmmxqB28MougqjrI6bxuLT1X7JfcH.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Exiled Realm Of Arborea',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 300,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "hxE5lcxKclwclp6HZxyNjrdZi36UvRpya0juFJ2X.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'World Of Tanks',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 300,
                'descuento' => 0,
                'stock'=> 10,
                'categoria_id' => 8,
                'marca_id' => 2,
                'poster' => "fkr79IpH0C0TZH5utI2YkqdzzH8GuhRXJWtBDeaL.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Witcher I',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "jq0C50cLniqqgfl9LDuR1GfQIeipOu6ZckRoBIkb.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Witcher II',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "1MNLYVFVXPtoUGOyHvUIYrKAEStSa96d9XEJSzRl.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Witcher III',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "fRqGdW2mbjqF6Z3VnAkWl6HOinKpzJ3jDyolrN4o.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Elder Scrolls V Skyrim Legendary Edition',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 50,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "jYWaqAvFjQmVF0WuANoqvRXfek4nnfRKVjCDiof1.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Elder Scrolls IV',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 40,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "4vRh3tJWHVkUVKtRFqINEd8IVO2ADKGrkysAtL95.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Mass Effect',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 30,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "J1L3KeZ6HsWgJFiaUZJLbgEyaJrikNuJhRrzXv1p.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Dragon Age Origin',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 20,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "RHnRnFgjXtqRKtH16K183ReCtLCFo2bydERv8V25.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Dragon Age Inquisition',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "sLPRqfRJUp9VnYa1PaQB3s6zjYfaV9c69nbfl4Dx.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Biomutant',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "qUlmbeTvDime75apncH2JR3KE20iwDIN7sfWjyjl.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Baldurs Gate',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 250,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 9,
                'marca_id' => 2,
                'poster' => "nEj6ooMV9v3M3kKOAc4oXCM6OvUnumpxLtoFrhz4.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Sims 4',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 2,
                'poster' => "H0dYvzLvnR6W0GbsgxL8XQCsOn6GOXbpXJcVom1h.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Sims 3',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 3,
                'poster' => "dvt0d0SGRKkRYMUXKbTP5gE6vL4dgJiQY9RAJq6o.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'The Sims 2',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 2,
                'poster' => "ZqV7BO9StbcBALoNY6Nz1ltaA7Z4R9neLJewBKvK.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Spore',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 3,
                'poster' => "sldi6dxgUG382GtxvKwZEUtXBn6VcduPzxVeNisB.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Universe Sandbox',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 20,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 2,
                'poster' => "ryqo3l5DOXRNlcOMiHdnKIhLLFuzpa96dcjDKbhB.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Farming Simulator - XBOX',
                'descripcion' => 'Este juego está disponible para XBOX.',
                'precio_unitario' => 600,
                'descuento' => 20,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 3,
                'poster' => "SgK8F6k2W6xgr2nxcLPncQZyHmmJheYbxVC3JPCz.png"
            ]);
        Product::create(
            [   'titulo' => 'Farming Simulator - PS4',
                'descripcion' => 'Este juego está disponible para Play Station 4.',
                'precio_unitario' => 600,
                'descuento' => 0,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 2,
                'poster' => "035NbUnbChYBsyZLNbcI8kSTL10GkRoS6i1yx5Mh.png"
            ]);
        Product::create(
            [   'titulo' => 'Farming Simulator - PC',
                'descripcion' => 'Este juego está disponible para PC',
                'precio_unitario' => 600,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 2,
                'poster' => "GIyMJeVGKynNTEanrWveEOj4jVpcjan5P9EpcME8.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Euro Truck Simulator',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 600,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 2,
                'poster' => "2N0fGFSFnsgjoyAXaiJpLGdAdlGBOHkZ99DGY23R.jpeg"
            ]);
        Product::create(
            [   'titulo' => 'Animal Crossing',
                'descripcion' => 'Este juego está disponible para Play Station 4, XBOX y PC.',
                'precio_unitario' => 200,
                'descuento' => 10,
                'stock'=> 20,
                'categoria_id' => 10,
                'marca_id' => 2,
                'poster' => "2N0fGFSFnsgjoyAXaiJpLGdAdlGBOHkZ99DGY23R.jpeg"
            ]);

    }
}
