<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Film;
use App\Entity\DVD;
use App\Entity\Order;
use App\Entity\User;
use App\Entity\Customer;
use App\Entity\Genre;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Genre
        $genreSciFi = new Genre();
        $genreSciFi->setName('Sci-Fi');
        $manager->persist($genreSciFi);

        $genreThriller = new Genre();
        $genreThriller->setName('Thriller');
        $manager->persist($genreThriller);

        $genreComedy = new Genre();
        $genreComedy->setName('Comedy');
        $manager->persist($genreComedy);

        $genreAction = new Genre();
        $genreAction->setName('Action');
        $manager->persist($genreAction);

        $manager->flush();

        $genres = [
            'Sci-Fi' => $genreSciFi,
            'Thriller' => $genreThriller,
            'Comedy' => $genreComedy,
            'Action' => $genreAction,
        ];

        $filmsData = [
            [
                'title' => 'Inception',
                'description' => 'A mind-bending thriller',
                'releaseYear' => 2010,
                'runtime' => 148,
                'director' => 'Christopher Nolan',
                'studio' => 'Warner Bros',
                'genres' => ['Sci-Fi', 'Thriller'],
                'actors' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt'],
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A computer hacker learns about the true nature of his reality',
                'releaseYear' => 1999,
                'runtime' => 136,
                'director' => 'The Wachowskis',
                'studio' => 'Warner Bros',
                'genres' => ['Sci-Fi', 'Action'],
                'actors' => ['Keanu Reeves', 'Laurence Fishburne'],
            ],
            [
                'title' => 'Star Wars: Episode IV - A New Hope',
                'description' => 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire\'s world-destroying battle station.',
                'releaseYear' => 1977,
                'runtime' => 121,
                'director' => 'George Lucas',
                'studio' => '20th Century Fox',
                'genres' => ['Sci-Fi', 'Action'],
                'actors' => ['Mark Hamill', 'Harrison Ford'],
            ],
            [
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'description' => 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.',
                'releaseYear' => 2001,
                'runtime' => 178,
                'director' => 'Peter Jackson',
                'studio' => 'New Line Cinema',
                'genres' => ['Sci-Fi', 'Action'],
                'actors' => ['Elijah Wood', 'Ian McKellen'],
            ],
            [
                'title' => 'Fight Club',
                'description' => 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.',
                'releaseYear' => 1999,
                'runtime' => 139,
                'director' => 'David Fincher',
                'studio' => '20th Century Fox',
                'genres' => ['Thriller', 'Action'],
                'actors' => ['Brad Pitt', 'Edward Norton'],
            ],
            [
                'title' => 'Avatar',
                'description' => 'A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.',
                'releaseYear' => 2009,
                'runtime' => 162,
                'director' => 'James Cameron',
                'studio' => '20th Century Fox',
                'genres' => ['Sci-Fi', 'Action'],
                'actors' => ['Sam Worthington', 'Zoe Saldana'],
            ],
            [
                'title' => 'The Lion King',
                'description' => 'Lion prince Simba and his father are targeted by his bitter uncle, who wants to ascend the throne himself.',
                'releaseYear' => 1994,
                'runtime' => 88,
                'director' => 'Roger Allers, Rob Minkoff',
                'studio' => 'Walt Disney Pictures',
                'genres' => ['Comedy'],
                'actors' => ['Matthew Broderick', 'Jeremy Irons'],
            ],
            [
                'title' => 'Back to the Future',
                'description' => 'Marty McFly, a 17-year-old high school student, is accidentally sent thirty years into the past in a time-traveling DeLorean invented by his close friend, eccentric scientist Doc Brown.',
                'releaseYear' => 1985,
                'runtime' => 116,
                'director' => 'Robert Zemeckis',
                'studio' => 'Universal Pictures',
                'genres' => ['Sci-Fi', 'Comedy'],
                'actors' => ['Michael J. Fox', 'Christopher Lloyd'],
            ],
            [
                'title' => 'Jurassic Park',
                'description' => 'During a preview tour, a theme park suffers a major power breakdown that allows its cloned dinosaur exhibits to run amok.',
                'releaseYear' => 1993,
                'runtime' => 127,
                'director' => 'Steven Spielberg',
                'studio' => 'Universal Pictures',
                'genres' => ['Sci-Fi', 'Thriller'],
                'actors' => ['Sam Neill', 'Laura Dern'],
            ],
            [
                'title' => 'The Avengers',
                'description' => 'Earth\'s mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity.',
                'releaseYear' => 2012,
                'runtime' => 143,
                'director' => 'Joss Whedon',
                'studio' => 'Marvel Studios',
                'genres' => ['Action', 'Sci-Fi'],
                'actors' => ['Robert Downey Jr.', 'Chris Evans'],
            ],
            [
                'title' => 'The Silence of the Lambs',
                'description' => 'A young F.B.I. cadet must receive the help of an incarcerated and manipulative cannibal killer to help catch another serial killer, a madman who skins his victims.',
                'releaseYear' => 1991,
                'runtime' => 118,
                'director' => 'Jonathan Demme',
                'studio' => 'Orion Pictures',
                'genres' => ['Thriller'],
                'actors' => ['Jodie Foster', 'Anthony Hopkins'],
            ],
            [
                'title' => 'Schindler\'s List',
                'description' => 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.',
                'releaseYear' => 1993,
                'runtime' => 195,
                'director' => 'Steven Spielberg',
                'studio' => 'Universal Pictures',
                'genres' => ['Thriller'],
                'actors' => ['Liam Neeson', 'Ben Kingsley'],
            ],
            [
                'title' => 'Saving Private Ryan',
                'description' => 'Following the Normandy Landings, a group of U.S. soldiers go behind enemy lines to retrieve a paratrooper whose brothers have been killed in action.',
                'releaseYear' => 1998,
                'runtime' => 169,
                'director' => 'Steven Spielberg',
                'studio' => 'DreamWorks Pictures',
                'genres' => ['Thriller', 'Action'],
                'actors' => ['Tom Hanks', 'Matt Damon'],
            ],
            [
                'title' => 'The Prestige',
                'description' => 'After a tragic accident, two stage magicians engage in a battle to create the ultimate illusion while sacrificing everything they have to outwit each other.',
                'releaseYear' => 2006,
                'runtime' => 130,
                'director' => 'Christopher Nolan',
                'studio' => 'Warner Bros',
                'genres' => ['Thriller'],
                'actors' => ['Christian Bale', 'Hugh Jackman'],
            ],
            [
                'title' => 'The Departed',
                'description' => 'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in South Boston.',
                'releaseYear' => 2006,
                'runtime' => 151,
                'director' => 'Martin Scorsese',
                'studio' => 'Warner Bros',
                'genres' => ['Thriller'],
                'actors' => ['Leonardo DiCaprio', 'Matt Damon'],
            ],
            [
                'title' => 'Braveheart',
                'description' => 'Scottish warrior William Wallace leads his countrymen in a rebellion to free his homeland from the tyranny of King Edward I of England.',
                'releaseYear' => 1995,
                'runtime' => 178,
                'director' => 'Mel Gibson',
                'studio' => '20th Century Fox',
                'genres' => ['Action'],
                'actors' => ['Mel Gibson', 'Sophie Marceau'],
            ],
            [
                'title' => 'Gladiator',
                'description' => 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.',
                'releaseYear' => 2000,
                'runtime' => 155,
                'director' => 'Ridley Scott',
                'studio' => 'DreamWorks Pictures',
                'genres' => ['Action'],
                'actors' => ['Russell Crowe', 'Joaquin Phoenix'],
            ],
            [
                'title' => 'Goodfellas',
                'description' => 'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito in the Italian-American crime syndicate.',
                'releaseYear' => 1990,
                'runtime' => 146,
                'director' => 'Martin Scorsese',
                'studio' => 'Warner Bros',
                'genres' => ['Thriller'],
                'actors' => ['Robert De Niro', 'Ray Liotta'],
            ],
            [
                'title' => 'Se7en',
                'description' => 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his motives.',
                'releaseYear' => 1995,
                'runtime' => 127,
                'director' => 'David Fincher',
                'studio' => 'New Line Cinema',
                'genres' => ['Thriller'],
                'actors' => ['Morgan Freeman', 'Brad Pitt'],
            ],
            [
                'title' => 'The Green Mile',
                'description' => 'The lives of guards on Death Row are affected by one of their charges: a black man accused of child murder and rape, yet who has a mysterious gift.',
                'releaseYear' => 1999,
                'runtime' => 189,
                'director' => 'Frank Darabont',
                'studio' => 'Warner Bros',
                'genres' => ['Thriller'],
                'actors' => ['Tom Hanks', 'Michael Clarke Duncan'],
            ],
            [
                'title' => 'Django Unchained',
                'description' => 'With the help of a German bounty-hunter, a freed slave sets out to rescue his wife from a brutal plantation-owner in Mississippi.',
                'releaseYear' => 2012,
                'runtime' => 165,
                'director' => 'Quentin Tarantino',
                'studio' => 'The Weinstein Company',
                'genres' => ['Action', 'Comedy'],
                'actors' => ['Jamie Foxx', 'Christoph Waltz'],
            ],
            [
                'title' => 'Mad Max: Fury Road',
                'description' => 'In a post-apocalyptic wasteland, a woman rebels against a tyrannical ruler in search for her homeland with the aid of a group of female prisoners, a psychotic worshiper, and a drifter named Max.',
                'releaseYear' => 2015,
                'runtime' => 120,
                'director' => 'George Miller',
                'studio' => 'Warner Bros',
                'genres' => ['Action', 'Sci-Fi'],
                'actors' => ['Tom Hardy', 'Charlize Theron'],
            ],
            [
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his empire to his reluctant son',
                'releaseYear' => 1972,
                'runtime' => 175,
                'director' => 'Francis Ford Coppola',
                'studio' => 'Paramount Pictures',
                'genres' => ['Thriller'],
                'actors' => ['Marlon Brando', 'Al Pacino'],
            ],
            [
                'title' => 'Pulp Fiction',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife intertwine in four tales of violence and redemption',
                'releaseYear' => 1994,
                'runtime' => 154,
                'director' => 'Quentin Tarantino',
                'studio' => 'Miramax',
                'genres' => ['Thriller', 'Comedy'],
                'actors' => ['John Travolta', 'Uma Thurman'],
            ],
            [
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker emerges, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice',
                'releaseYear' => 2008,
                'runtime' => 152,
                'director' => 'Christopher Nolan',
                'studio' => 'Warner Bros',
                'genres' => ['Action', 'Thriller'],
                'actors' => ['Christian Bale', 'Heath Ledger'],
            ],
            [
                'title' => 'Forrest Gump',
                'description' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold through the perspective of an Alabama man with an IQ of 75',
                'releaseYear' => 1994,
                'runtime' => 142,
                'director' => 'Robert Zemeckis',
                'studio' => 'Paramount Pictures',
                'genres' => ['Comedy'],
                'actors' => ['Tom Hanks', 'Robin Wright'],
            ],
            [
                'title' => 'Interstellar',
                'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival',
                'releaseYear' => 2014,
                'runtime' => 169,
                'director' => 'Christopher Nolan',
                'studio' => 'Paramount Pictures',
                'genres' => ['Sci-Fi', 'Thriller'],
                'actors' => ['Matthew McConaughey', 'Anne Hathaway'],
            ],
            [
                'title' => 'Gladiator',
                'description' => 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery',
                'releaseYear' => 2000,
                'runtime' => 155,
                'director' => 'Ridley Scott',
                'studio' => 'DreamWorks',
                'genres' => ['Action'],
                'actors' => ['Russell Crowe', 'Joaquin Phoenix'],
            ],
            [
                'title' => 'Titanic',
                'description' => 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic',
                'releaseYear' => 1997,
                'runtime' => 195,
                'director' => 'James Cameron',
                'studio' => '20th Century Fox',
                'genres' => ['Thriller', 'Comedy'],
                'actors' => ['Leonardo DiCaprio', 'Kate Winslet'],
            ],
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency',
                'releaseYear' => 1994,
                'runtime' => 142,
                'director' => 'Frank Darabont',
                'studio' => 'Castle Rock Entertainment',
                'genres' => ['Thriller'],
                'actors' => ['Tim Robbins', 'Morgan Freeman'],
            ],
        ];

        foreach ($filmsData as $filmData) {
            $film = new Film(
                $filmData['title'],
                $filmData['description'],
                $filmData['releaseYear'],
                $filmData['runtime'],
                $filmData['director'],
                $filmData['studio'],
                $filmData['actors']
            );
            /*
            // Associer les genres au film après la création

            foreach ($filmData['genres'] as $genreName) {
                if (isset($genres[$genreName])) {
                    $film->addGenre($genres[$genreName]);
                } else {
                    throw new \Exception("Genre not found: $genreName");
                }
            }

            $manager->persist($film);

            // Film
            $items = [];
            for ($i = 0; $i < 3; $i++) {
                $dvd = new DVD(
                    $film,
                    $i % 2 == 0 ? DVD::FORMAT_BLURAY : DVD::FORMAT_DVD,
                    mt_rand(10, 30),
                    mt_rand(1, 100),
                    'poster_' . $i . '.jpg'
                );
                $manager->persist($dvd);
                $items[] = $dvd; // Ajouter les DVDs à la liste des items
            }

            $customer = new Customer();
            $customer->setFirstName('John');
            $customer->setLastName('Doe');
            $customer->setEmail('john.doe@example.com');
            $customer->setAddress('123 Main St');
            $customer->setPhoneNumber('555-1234');
            $manager->persist($customer);

            $order = new Order();
            $order->setOrderDate(new \DateTime());
            $order->setStatus(Order::STATUS_PENDING);
            $order->setCustomerId($customer);
            $order->setItems($items); // Utiliser l'array des items ici
            $order->setTotalPrice(19.99);
            $manager->persist($order);

            // Exemple d'utilisateur
            $user = new User();
            $user->setUsername('admin');
            $user->setPassword(password_hash('password', PASSWORD_BCRYPT));
            $user->setRoles([User::ROLE_ADMIN]);
            $manager->persist($user);
    */
        }
        $manager->flush();
    }
}
