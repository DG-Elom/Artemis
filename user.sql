--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `pseudo`, `email`, `password`, `admin`) VALUES
(1, 'gnaglo', 'elom', 'dgelom', 'elom.gnaglo@gmail.com', 'david1', 1),
(2, 'kpamegan', 'falonne', 'falcon', 'marina@gmail.com', 'falonne1', 1),
(3, 'Ouattara', 'Seydou', 'ngomo', 'seydou@gmail.com', 'seydou1', 0),
(5, 'Diallo', 'Kadiatou', 'diallo', 'diallo.kadiatou@gmail.com', 'diallo1', 0),
(13, 'Balde', 'Alseny', 'balal', 'alseny@gmail.com', 'alseny', 0),
(16, 'Barboza', 'Adjoa', 'clairboz', 'marie@gmail.com', 'marieclaire', 0),
(17, 'Kpoghomou', 'Nyanga', 'EricSama', 'nekkpoghomou@gmail.com', 'nyanga1', 1),
(19, 'Nelson', 'Addison', 'admin', 'baldepatatipatata@gmail.com', 'admin', 0),
(20, 'JEAN', 'JEAN', 'JEAN', 'chopper_57@hotmail.fr', 'JEAN', 1),
(21, 'Dupond', 'Smith', 'DSlog', 'DS@gmail.com', '123456', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
