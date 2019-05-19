CREATE DATABASE User;

CREATE TABLE Contact(
id int(11),
nomUser varchar (30) NOT NULL,
prenomUser varchar (30) NOT NULL,
societeUser varchar (30) NOT NULL,
adresseUser varchar (50),
codePostalUser int (6),
villeUser varchar (50),
telephoneUser int (6),
emailUser varchar (50) NOT NULL,
PRIMARY KEY (id));

CREATE TABLE Ville(
id int(11),
nomVille varchar (50),
codeVille varchar (50),
codePostalVille int(6),
PRIMARY KEY (id));

INSERT INTO Ville (id, nomVille, codeVille, codePostalVille) VALUES 
(1,"Saint-Denis","Saint-Denis",97400), 
(2,"Saint-Pierre","Saint-Pierre", 97410),
(3,"Bras Panon","Bras_Panon",97412),
(4, "Cilaos","Cilaos",97413),
(5, "Entre-Deux", "Entre-Deux", 97414),
(6, "La Possession","La_Possession",97419),
(7, "Le Port","Le_Port",97420),
(8, "Les Avirons", "Les_Avirons",97425),
(9, "Les Trois-Bassins", "Les_Trois-Bassins", 97426),
(10, "Etang Sale","Etang_Sale", 97427),
(11, "La Petite-Ile", "La_Petite-Ile",97429),
(12, "Le Tampon", "Le_Tampon", 97430),
(13, "La Plaine des Palmistes","La_Plaine_des_Palmistes", 97431),
(14, "Salazie","Salazie", 97433),
(15, "Saint-Leu","Saint-Leu",  97436),
(16, "Sainte-Marie","Sainte-Marie", 97438),
(17, "Sainte-Rose", "Sainte-Marie", 97439),
(18, "Saint-Andre","Saint-Andre", 97440),
(19, "Sainte-Suzanne","Sainte-Suzanne", 97441),
(20, "Saint-Philippe", "Saint-Philippe", 97442),
(21, "Saint-Louis","Saint-Louis", 97450),
(22, "Saint-Paul","Saint-Paul",97460),
(23, "Saint-Benoît","Saint-Benoît", 97470),
(24, "Saint-Joseph","Saint-Joseph", 97480)