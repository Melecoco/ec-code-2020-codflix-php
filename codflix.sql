-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 25 juin 2020 à 18:28
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `codflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(20) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL,
  `poster_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`, `poster_url`) VALUES
(456, 3, 'The Simpsons', 'série', 'publié', '1989-12-17', 'Set in Springfield, the average American town, the show focuses on the antics and everyday adventures of the Simpson family; Homer, Marge, Bart, Lisa and Maggie, as well as a virtual cast of thousands. Since the beginning, the series has been a pop culture icon, attracting hundreds of celebrities to guest star. The show has also made name for itself in its fearless satirical take on politics, media and American life in general.', '', 'https://image.tmdb.org/t/p/w300//qcr9bBY6MVeLzriKCmJOv1562uY.jpg'),
(549, 3, 'Law & Order', 'série', 'publié', '1990-09-13', 'Law & Order is an American police procedural and legal drama television series, created by Dick Wolf and part of the Law & Order franchise. It originally aired on NBC and, in syndication, on various cable networks. Law & Order premiered on September 13, 1990, and completed its 20th and final season on May 24, 2010. At the time of its cancellation, Law & Order was the longest-running crime drama on American primetime television. After The Simpsons, both Law & Order and Gunsmoke tied for the second longest-running scripted American primetime series with ongoing characters.', '', 'https://image.tmdb.org/t/p/w300//jUKiOgSYVAP8ARYPotgnBwIK1x7.jpg'),
(1412, 3, 'Arrow', 'série', 'publié', '2012-10-10', 'Spoiled billionaire playboy Oliver Queen is missing and presumed dead when his yacht is lost at sea. He returns five years later a changed man, determined to clean up the city as a hooded vigilante armed with a bow.', '', 'https://image.tmdb.org/t/p/w300//gKG5QGz5Ngf8fgWpBsWtlg5L2SF.jpg'),
(1668, 3, 'Friends', 'série', 'publié', '1994-09-22', 'The misadventures of a group of friends as they navigate the pitfalls of work, life and love in Manhattan.', '', 'https://image.tmdb.org/t/p/w300//bRJOwllemPbE4JTQ0TtcVu9efff.jpg'),
(2734, 3, 'Law & Order: Special Victims Unit', 'série', 'publié', '1999-09-20', 'In the criminal justice system, sexually-based offenses are considered especially heinous. In New York City, the dedicated detectives who investigate these vicious felonies are members of an elite squad known as the Special Victims Unit. These are their stories.', '', 'https://image.tmdb.org/t/p/w300//6t6r1VGQTTQecN4V0sZeqsmdU9g.jpg'),
(30623, 3, 'Crayon Shin-chan', 'série', 'publié', '1992-04-13', 'Shin-chan, the boy next door, is a walking disaster, creating chaos wherever he goes. With the body of a child and the mind of an adult, Shinchan is wreaking more havoc than any child before. Shin-chan is carefree, optimistic and gets excited about everything. This 5 year-old likes to do things his way.', '', 'https://image.tmdb.org/t/p/w300//1YffzZDZmxonFz4MTy0gaBDC3S0.jpg'),
(60572, 3, 'Pokémon', 'série', 'publié', '1997-04-01', 'Join Ash Ketchum, accompanied by his partner Pikachu, as he travels through many regions, meets new friends and faces new challenges on his quest to become a Pokémon Master.', '', 'https://image.tmdb.org/t/p/w300//2AoqUTKKN4kjNe1K0kIPwiItHwv.jpg'),
(70523, 3, 'Dark', 'série', 'publié', '2017-12-01', 'A missing child causes four families to help each other for answers. What they could not imagine is that this mystery would be connected to innumerable other secrets of the small town.', '', 'https://image.tmdb.org/t/p/w300//ajmkAwuK1TRFWMjKoSMgoAXbnc7.jpg'),
(85853, 3, 'Perry Mason', 'série', 'publié', '2020-06-21', 'Set in 1932 Los Angeles, the series focuses on the origin story of famed defense lawyer Perry Mason. Living check-to-check as a low-rent private investigator, Mason is haunted by his wartime experiences in France and suffering the effects of a broken marriage. L.A. is booming while the rest of the country recovers from the Great Depression — but a kidnapping gone very wrong leads to Mason exposing a fractured city as he uncovers the truth of the crime.', '', 'https://image.tmdb.org/t/p/w300//gPBf35AqvXHvKEpDHaQ4D9xXxeX.jpg'),
(130267, 3, 'Seal Team Six: The Raid on Osama Bin Laden', 'film', 'publié', '2012-11-04', 'When the rumored whereabouts of Osama bin Laden are revealed, the CIA readies a team of seasoned U.S. Navy SEALs for the mission of a lifetime. Despite inconclusive evidence that bin Laden is inside the compound, and ignoring the possible ramifications of an unannounced attack on Pakistani soil, the Pentagon orders the attack. The SEAL Team bands together to complete their mission of justice in a riveting final showdown.', 'http://www.youtube.com/embed/M6vtiaNqtv4', 'https://image.tmdb.org/t/p/w300//hau6iHAIWJmlnaaZ0QRYZu9T6B1.jpg'),
(299536, 3, 'Avengers: Infinity War', 'film', 'publié', '2018-04-25', 'As the Avengers and their allies have continued to protect the world from threats too large for any one hero to handle, a new danger has emerged from the cosmic shadows: Thanos. A despot of intergalactic infamy, his goal is to collect all six Infinity Stones, artifacts of unimaginable power, and use them to inflict his twisted will on all of reality. Everything the Avengers have fought for has led up to this moment - the fate of Earth and existence itself has never been more uncertain.', 'http://www.youtube.com/embed/sAOzrChqmd0', 'https://image.tmdb.org/t/p/w300//7WsyChQLEftFiDOVTGkv3hFpyyt.jpg'),
(419704, 3, 'Ad Astra', 'film', 'publié', '2019-09-17', 'The near future, a time when both hope and hardships drive humanity to look to the stars and beyond. While a mysterious phenomenon menaces to destroy life on planet Earth, astronaut Roy McBride undertakes a mission across the immensity of space and its many perils to uncover the truth about a lost expedition that decades before boldly faced emptiness and silence in search of the unknown.', 'http://www.youtube.com/embed/P6AaSMfXHbA', 'https://image.tmdb.org/t/p/w300//xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg'),
(420817, 3, 'Aladdin', 'film', 'publié', '2019-05-22', 'A kindhearted street urchin named Aladdin embarks on a magical adventure after finding a lamp that releases a wisecracking genie while a power-hungry Grand Vizier vies for the same lamp that has the power to make their deepest wishes come true.', 'http://www.youtube.com/embed/9g5knnlF7Zo', 'https://image.tmdb.org/t/p/w300//ykUEbfpkf8d0w49pHh0AD2KrT52.jpg'),
(454626, 3, 'Sonic the Hedgehog', 'film', 'publié', '2020-02-12', 'Based on the global blockbuster videogame franchise from Sega, Sonic the Hedgehog tells the story of the world’s speediest hedgehog as he embraces his new home on Earth. In this live-action adventure comedy, Sonic and his new best friend team up to defend the planet from the evil genius Dr. Robotnik and his plans for world domination.', 'http://www.youtube.com/embed/szby7ZHLnkA', 'https://image.tmdb.org/t/p/w300//aQvJ5WPzZgYVDrxLX4R6cLJCEaQ.jpg'),
(475557, 3, 'Joker', 'film', 'publié', '2019-10-02', 'During the 1980s, a failed stand-up comedian is driven insane and turns to a life of crime and chaos in Gotham City while becoming an infamous psychopathic crime figure.', 'http://www.youtube.com/embed/t433PEQGErc', 'https://image.tmdb.org/t/p/w300//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg'),
(495764, 3, 'Birds of Prey (and the Fantabulous Emancipation of One Harley Quinn)', 'film', 'publié', '2020-02-05', 'Harley Quinn joins forces with a singer, an assassin and a police detective to help a young girl who had a hit placed on her after she stole a rare diamond from a crime lord.', 'http://www.youtube.com/embed/ptLZlrE8MrQ', 'https://image.tmdb.org/t/p/w300//h4VB6m0RwcicVEZvzftYZyKXs6K.jpg'),
(509585, 3, '7500', 'film', 'publié', '2019-12-26', 'When terrorists try to seize control of a Berlin-Paris flight, a soft-spoken young American co-pilot struggles to save the lives of the passengers and crew while forging a surprising connection with one of the hijackers.', 'http://www.youtube.com/embed/Z5Vz9nPw2lg', 'https://image.tmdb.org/t/p/w300//hL2uecLh2rTTbuVbOriXP0PhqIJ.jpg'),
(514593, 3, 'You Should Have Left', 'film', 'publié', '2020-06-19', 'In an effort to repair their relationship, a couple books a vacation in the countryside for themselves and their daughter. What starts as a perfect retreat begins to fall apart as one loses their grip on reality, and a sinister force tries to tear them apart.', 'http://www.youtube.com/embed/Bw0-cV_J9q4', 'https://image.tmdb.org/t/p/w300//2Gi9ZA4kRKKsWguUoTvIyj40dxF.jpg'),
(530915, 3, '1917', 'film', 'publié', '2019-12-25', 'At the height of the First World War, two young British soldiers must cross enemy territory and deliver a message that will stop a deadly attack on hundreds of soldiers.', 'http://www.youtube.com/embed/UcmZN0Mbl04', 'https://image.tmdb.org/t/p/w300//iZf0KyrE25z1sage4SYFLCCrMi9.jpg'),
(581859, 3, 'Da 5 Bloods', 'film', 'publié', '2020-06-12', 'Four African-American Vietnam veterans return to Vietnam. They are in search of the remains of their fallen squad leader and the promise of buried treasure. These heroes battle forces of humanity and nature while confronted by the lasting ravages of the immorality of the Vietnam War.', 'http://www.youtube.com/embed/D5RDTPfsLAI', 'https://image.tmdb.org/t/p/w300//yx4cp1ljJMDSFeEex0Zjv45b55E.jpg'),
(619592, 3, 'Force of Nature', 'film', 'publié', '2020-07-02', 'A gang of thieves plan a heist during a hurricane and encounter trouble when a disgraced cop tries to force everyone in the building to evacuate.', 'http://www.youtube.com/embed/iQKaY8G9VpQ', 'https://image.tmdb.org/t/p/w300//ucktgbaMSaETUDLUBp1ubGD6aNj.jpg'),
(706503, 3, 'Lost Bullet', 'film', 'publié', '2020-06-19', 'A small time delinquent, turned police mechanic for a go fast task force, is forced to defend his innocence when his mentor is killed by dirty cops.', 'http://www.youtube.com/embed/-qaYywvAyz8', 'https://image.tmdb.org/t/p/w300//qnlChF8U4diiykXQYs1miigGy7t.jpg'),
(707886, 3, 'Feel the Beat', 'film', 'publié', '2020-06-19', 'After failing to make it on Broadway, April returns to her hometown and reluctantly begins training a misfit group of young dancers for a competition.', 'http://www.youtube.com/embed/PhLSDnxLp-M', 'https://image.tmdb.org/t/p/w300//Af2jt7m9GLFpR4V11xOsFmT8OKD.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(4, 'melecduhalgouet@yahoo.fr', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(5, 'duhalgouetm@yahoo.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(6, 'melec.duhalgouet@edu.itescia.fr', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(7, 'slat@jaa.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(8, 'panpan@panpan.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(9, 'berenice.tritsch@gmail.fr', 'b18a694db12e4683ab1c9c49f31f926d8e43d17880f5b9f8b9175b69789e2802'),
(10, 'berenaice.triche@gmail.com', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918'),
(11, 'coding@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE;

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=707887;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);
