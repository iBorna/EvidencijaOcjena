DATABASE: evidencija

CREATE TABLE `studenti` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL
) 

CREATE TABLE `ocjene` (
  `id` int(11) NOT NULL,
  `predmet` varchar(30) NOT NULL,
  `ocjena` int(11) NOT NULL,
  `studenti_id` int(11) NOT NULL
)
