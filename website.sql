-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u2
-- http://www.phpmyadmin.net
--
-- Host: wp221.webpack.hosteurope.de
-- Erstellungszeit: 30. Apr 2016 um 22:30
-- Server Version: 5.5.46
-- PHP-Version: 5.4.45-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `db10460403-weltfairsteher`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `challenge`
--

CREATE TABLE IF NOT EXISTS `challenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` varchar(2000) COLLATE utf8_bin NOT NULL,
  `points` int(11) NOT NULL,
  `category` enum('food','energy','culture','climate-change','production','selfmade','water') COLLATE utf8_bin NOT NULL,
  `author` int(11) DEFAULT NULL,
  `author_time` datetime DEFAULT NULL,
  `location` enum('home','teacher','school') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=54 ;

--
-- Daten für Tabelle `challenge`
--

INSERT INTO `challenge` (`id`, `name`, `description`, `points`, `category`, `author`, `author_time`, `location`) VALUES
(16, 'Barnga', 'Spielt angeleitet von eurer Lehrkraft das spannende Kartenspiel Barnga, um eine ganz besondere Erfahrung zu machen. Teilnehmen kann dabei die gesamte Klasse.', 2, 'culture', NULL, '2016-03-01 17:05:58', 'home'),
(17, 'Stop the plastic', 'Was schwimmt eigentlich in unseren Ozeanen? Ihr würdet jetzt bestimmt verschiedene Fische und andere Getiere aufzählen – doch habt ihr auch an den vielen Müll und Dreck gedacht? \r\nPlastik braucht nicht nur 500 Jahre bis es verrottet, sondern verschmutzt und vergiftet darüber hinaus massiv die Ozeane. Überlegt euch mindestens zehn Dinge, wo ihr im Alltag Plastikmüll vermeiden könnt!', 2, 'water', NULL, '2016-03-01 17:09:22', 'home'),
(18, 'Save the water', 'Wie könnt ihr vorhandenes Wasser (Waschbecken-/Toilettenwasser, Regen, etc.) ein zweites Mal nutzen? Arbeitet mindestens drei Vorschläge aus und setzt einen davon um!', 4, 'water', NULL, '2016-03-01 17:15:52', 'home'),
(19, 'Oil is limited', 'Habt ihr eigentlich eine Ahnung welche Gegenstände um euch rum Erdöl als Bestandteil haben? Findet es in dieser Challenge heraus und sucht mindestens 20 Gegenstände, die aus Erdöl bestehen. Informiert euch außerdem welche Alternativen es gibt.', 3, 'water', NULL, '2016-03-01 17:16:50', 'home'),
(20, 'Obst- und Gemüse-Check', 'Wenn wir unser Obst und Gemüse zum ersten Mal sehen, dann liegt es meist wohl geordnet und gesäubert in der Auslage eines Supermarktes. Welchen langen Weg die Lebensmittel jedoch bereits zurückgelegt haben und welche Folgen dies für unsere Umwelt und die regionalen Bauern hat, bleibt zumeist verdeckt und unbeachtet. In der Challenge „Obst- und Gemüse-Check“ soll der Blick deshalb wieder auf die eigentliche Herkunft der Lebensmittel gelenkt werden.\r\nBesucht dazu die Obst- und Gemüseabteilung eines Supermarktes in der Nähe und notiert euch, woher eure fünf Lieblings-Obst- oder Gemüsesorten kommen. Markiert die Länder anschließend auf einer Weltkarte.', 3, 'food', NULL, '2016-03-01 17:18:01', 'home'),
(21, 'Kaffeebecher to go again', 'Stündlich werden in Deutschland mehr als 300.000 Kaffeebecher aus Pappe und Plastik weggeworfen. Mit der Energie, die zur Produktion der Kaffeebecher nötig ist, könnte man eine Stadt mit 100.000 Einwohnern durchgehend mit Energie versorgen!\r\n\r\nÜberzeugt mindestens eine*n Cafébetreiber*in in eurer Nähe, an der Initiative „Coffee to go again“ teilzunehmen. Dabei verpflichten sich die Verkäufer, auch mitgebrachte Getränkebecher aufzufüllen, um Müll zu reduzieren und einen hinweisenden Aufkleber am Eingang anzubringen. Am besten bildet ihr eine oder mehrere kleine Gruppen, um in eurer Freizeit Cafés aufzusuchen und seht euch zuvor die thematisch passenden Videos und Artikel im Leckerwissen an. Alle weiteren Informationen erfahrt ihr hier (https://www.facebook.com/notes/coffee-to-go-again/neue-shops-f%C3%BCr-coffee-to-go-again-alle-tipps-auf-einen-blick/1650990868522641). Einen Aufkleber könnt ihr per Mail an post@coffee-to-go-again.de bestellen (Wichtig: Schreibt in die Mail, dass ihr Teilnehmer von WeltFAIRsteher seid).', 3, 'production', NULL, '2016-03-01 17:20:11', 'home'),
(22, 'Die Werbejäger', 'Werbung soll unser Verhalten beeinflussen, doch in welche Richtung? Und für wen ist diese Beeinflussung eigentlich gut? Untersucht in eurer Freizeit jeweils eine Werbung eurer Wahl (TV, Radio, Internet, Print, etc), um dem Prinzip von Werbung auf die Spur zu kommen. Macht euch Gedanken zur jeweiligen Werbung, um herauszufinden, inwiefern nur die „halbe Wahrheit“ zum jeweiligen Produkt gezeigt wurde und inwiefern die Werbung euch beeinflussen soll. Notiert euch dafür auch wo und wann die Werbung gezeigt wurde, welches Unternehmen sie schaltete und was in der Werbung überhaupt präsentiert wurde. Stellt eure einzeln gesammelten Ergebnisse anschließend in einer Unterrichtseinheit vor, um voneinander zu lernen und eure Medienkompetenz zu stärken.', 2, 'production', NULL, '2016-03-01 17:21:14', 'home'),
(23, 'Sauber unterwegs', 'Bestimmt habt ihr schon oft von dem Gas CO2 gehört und dass dieses CO2 sehr schlecht für die Umwelt sein soll. Wisst ihr aber, dass es auch bei eurer täglichen Fahrt zur Schule erzeugt wird? Durch die Abgase von Autos oder auch Busen. In dieser Challenge dürft ihr euch das Ganze mal genauer ansehen. \r\nAnalysiert dazu mindestens fünf Energieträger auf die Produkte, die bei der chemischen Umsetzung entstehen. Wählt dabei aus Öl, Erdgas, Wasserstoff, Kohle, Atomenergie oder Grundstoffen für Ökostrom.', 3, 'energy', NULL, '2016-03-01 17:22:18', 'home'),
(24, 'Nachhaltig warm', 'Die meiste Energie im Haushalt wird für die Erwärmung von Räumen benötigt. Dabei könnte viel Energie gespart werden, wenn wir gezielter heizen würden. Messt daher über mindestens einen Tag und eine Nacht den Temperaturverlauf in eurem Klassenzimmer. Vergleicht die Ergebnisse mit euren Wunsch-Temperaturen (je nach Uhrzeit) und zeigt auf, wann und wie man Heizenergie sparen könnte!', 3, 'energy', NULL, '2016-03-01 17:22:55', 'home'),
(25, 'Nachhaltiges Frühstück', 'Gegessen wird täglich, doch wer macht sich heute noch wirklich Gedanken dazu, was wir da eigentlich essen? Erdbeeren im Winter oder auch Bananen aus Uganda – all das kann zu jeder Zeit ganz einfach im Supermarkt erworben werden. Welche Implikationen diese Vielfalt an Nahrungsmitteln für die Natur, den Menschen und die Wirtschaft hat, bleibt jedoch beim Griff zur Gurke aus China verborgen. Im Rahmen dieser Challenge soll der Blick genau auf diese unbedachten Folgen des konventionellen Konsums gelenkt werden.\r\nOrganisiert dazu ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend (unter anderem) einen Vergleich der Preise und Herkunft mit den konventionellen Nicht-Bio-Produkten.', 4, 'food', NULL, '2016-03-10 23:00:36', 'home'),
(26, 'Sharing is Caring', 'Veranstaltet einen einmaligen Verkaufsstand, an dem ihr möglichst ökologisch nachhaltige und fair gehandelte Lebensmittel, beispielsweise leckere Häppchen, etc., verkauft. Den Erlös spendet ihr anschließend zu mindestens 70% an einen Verein bzw. eine Organisation etc. eurer Wahl. Voraussetzung: Die Spenden gehen an einen Verein etc., der den Kriterien der Nachhaltigkeit folgt. Was mit den restlichen 30% geschieht, also ob ihr davon etwas für die Klasse anschafft, sie in andere Challenges investiert, auf euch aufteilt, oder ebenfalls mit dem Verein etc. teilt, bleibt euch überlassen.\r\nBildet insgesamt drei Gruppen, die sich um die Organisation und Gestaltung des Verkaufsstandes, die angebotenen Produkte sowie die Wahl eines Vereins, etc., welcher die Spende erhält, kümmert.', 7, 'culture', NULL, '2016-03-10 23:01:16', 'home'),
(27, 'Upcycling - Kreative Müllverarbeitung', '„Upcycling“ – Wiederverwertung statt Müll! Informiert euch in Büchern, Zeitschriften, Internet etc. über „Upcycling“ und sammelt Gegenstände, die normalerweise im Müll landen. Lasst eurer Kreativität freien Lauf und bastelt aus nutzlosen Gegenständen, Dinge die ihr im Alltag braucht!\r\nMöglich sind zum Beispiel: Briefumschläge aus alten Kalenderblättern, Ohrringe aus Radiergummiresten, praktische Stiftehalter aus Konservendosen und vieles mehr… Extrapunkte gibt es, wenn ihr eine Ausstellung in eurer Schule organisiert!', 4, 'production', NULL, '2016-03-10 23:01:50', 'home'),
(28, 'Find the light', 'Lichtschalter an – es werde Licht! Für uns selbstverständlich – in vielen Teilen der Erde jedoch nicht. Der Grund dafür ist eine mangelhafte Energieversorgung. Umso mehr sollten wir bewusst mit unserer Energie umgehen! Unterschiedliche Lichtquellen brauchen beispielsweise unterschiedlich viel Strom.\r\nMesst den Energieverbrauch und die Beleuchtungsstärke von mindestens vier verschiedenen Lichtquellen! Entscheidet, wie man Energie sparen kann. Und denkt dran – wenn ihr euer Zimmer verlasst: Licht aus!', 5, 'energy', NULL, '2016-03-10 23:02:19', 'home'),
(29, 'CO2-Fußabdruck Klassenfahrt', 'Habt ihr euch schon mal damit beschäftigt welches Transportmittel euch am umweltschonendsten von A nach B bringt? Wenn nicht, dann ist diese Challenge genau das richtige für euch! \r\nBestimmt von mindestens zwei Klassenfahrten das gewählte Verkehrsmittel, den Zielort, die Anzahl der teilnehmenden Schüler*innen sowie die Dauer des Aufenthalts. Überlegt, ob die Wahl des Verkehrsmittels aus nachhaltiger Sicht sinnvoll war und denkt einmal darüber nach wie ihr das nächste mal umweltschonender vereisen könntet.', 3, 'energy', NULL, NULL, 'home'),
(31, 'Electrify the water', 'Um auf erneuerbare Energien umzusteigen braucht es gute Ideen und das notwendige Know-How. Doch das will geübt sein! \r\nBaut deshalb ein funktionsfähiges Modell eines Wasserrads, mit dem man Strom in einem Bach oder am Wasserhahn erzeugen kann!', 9, 'energy', NULL, NULL, 'home'),
(32, 'Emissionen ahoi!', 'Habt ihr euch schon mal Gedanken darüber gemacht, wie eure Kleidung, euer Laptop oder euer Handy von Asien zu euch gelangt? Ist der Transport vom Hersteller zu euch wirklich sauber? Oder wird auf dem Weg über die Weltmeere die Luft ganz schön verschmutzt?\r\n\r\nIn dieser Challenge bekommt ihr die Möglichkeit, euch selbst über die Nachhaltigkeit von Containerschiffen zu informieren. Der Bund Naturschutz hat kurz und knapp die wichtigsten Aspekte zu diesem Thema zusammengefasst – fragt euren Lehrer nach diesem Artikel. Die Themen sind „Mehrkosten durch saubere Schiffsmotoren“, „Luftschadstoffe aus Schiffsabgasen“ sowie „Maßnahmen zur Reduzierung der Emissionen“. Stellt diese drei Themen in drei Kleingruppen auf drei separaten Plakaten anschaulich und für alle verständlich dar, so dass jeder vom anderen lernen kann. Ihr könnt dabei auch entscheiden, ob ihr bereit wärt, die Mehrkosten eines sauberen Handytransports in Kauf zu nehmen.', 4, 'energy', NULL, NULL, 'home'),
(33, 'Moderne Mobilität', 'Roller, Auto, Fahrrad oder Bus – wie kommt ihr, eure Mitschüler*innen oder eure Lehrer*innen eigentlich zu der Schule? Begebt euch auf die Suche nach den Umweltschonern unter euch und findet heraus, wie eure Freund*innen und Lehrer*innen zur Schule kommen. Diskutiert anschließend darüber, ob die Verkehrsmittel umweltschonend sind und was ihr, eure Freund*innen und Lehrer*innen in Zukunft verbessern könntet.', 4, 'energy', NULL, NULL, 'home'),
(35, 'Save the Energy', 'Jeden Tag verbrauchen wir Energie für alltägliche Dinge wie Kochen, Waschen oder Licht. Meistens kann dabei sogar noch Energie eingespart werden. Schaut euch das Ganze mal genauer an und messt den Energieverbrauch von mindestens zehn verschiedenen Elektrogeräten eurer Wahl und überlegt euch, wo man am besten Energie sparen könnte!', 5, 'energy', NULL, NULL, 'home'),
(37, 'Ich bin dann mal vegan', 'Eine Ernährung ohne Tierprodukte hat einige Vorteile für die Umwelt und die eigene Gesundheit – aber nicht nur. Bildet eine Gruppe von zwei bis vier Personen, die ein detailliertes Referat zum Veganismus hält, um die genannten Vor- und Nachteile zu erklären, aber auch zu zeigen, was „vegan“ überhaupt bedeutet und wie eine vegane Ernährung praktisch aussehen kann. Erstellt anschließend ein Plakat mit den wichtigsten Informationen des Referats, das im Klassenzimmer oder Schulgebäude aufgehängt werden kann.', 2, 'food', NULL, NULL, 'home'),
(38, 'Der Siegel-Spiegel', 'Um Lebensmittel einfacher bezüglich Qualität und nachhaltiger Herstellung vergleichen zu können, sind meist Siegel an der Verpackung angebracht – doch wer weiß wirklich, was die Siegel bedeuten? \r\nErstellt in einer Gruppe aus zwei bis vier Personen einen Siegel-Spiegel, also ein Plakat, auf dem ihr mindestens acht wichtige Siegel zur Qualität und Nachhaltigkeit von Lebensmitteln zeigt und erklärt. Stellt dieses Plakat außerdem der Klasse vor und hängt es im Klassenzimmer oder dem Schulgebäude auf.', 2, 'food', NULL, NULL, 'home'),
(39, 'Land unter!', 'Wenn ihr mit 70 Jahren gemeinsam mit euren Enkeln Venedig oder Amsterdam besuchen wollt, dann ist das vielleicht gar nicht mehr möglich, denn sie werden im Meer verschwunden sein. Welche Städte womöglich noch untergehen, wenn der Meeresspiegel weiterhin steigt kannst du in dieser Challenge herausfinden!', 2, 'climate-change', NULL, NULL, 'home'),
(40, 'Meine Welt in 50 Jahren', 'Was bedeutet der Klimawandel eigentlich für unsere Zukunft und welche Auswirkungen hat die Erderwärmung für die eigene Lebensführung? Jedem, der sich darüber noch keine Gedanken gemacht hat, bietet diese Challenge einen Rahmen dafür sich aktiv mit der eigenen Zukunft auseinanderzusetzen. Mit viel Phantasie und Kreativität dürft ihr eure eigenen Ideen und Vorschläge für die Welt in 50 Jahren festhalten. Gestaltet dazu DIN-A4-Plakate, die ein worst-case-Szenario, ein best-case-Szenario oder ein Wunschbild darstellen! Hängt eure Plakate auf einer Wand im Klassenzimmer auf und vergleicht euer eigenes mit denen der anderen!', 2, 'climate-change', NULL, NULL, 'home'),
(41, 'Plant for the planet', 'Pflanzen sind nicht nur wichtige Nahrung, sondern auch die grüne Lunge unseres Planeten. Sie versorgen uns mit Sauerstoff und halten den Biokreislauf im Gleichgewicht. Wollt ihr einen kleinen Beitrag dazu leisten? Pflanzt (fünf) verschiedene Pflanzen und pflegt diese behutsam, damit sie über ... Monate überleben und leistet so einen Beitrag zu einer etwas besseren Luft.', 2, 'climate-change', NULL, NULL, 'home'),
(42, 'Entdeckungsreise Handy', 'Alte Handys – Nur noch Schrott?! Geht auf Erkundungstour im Innenleben eines Handys und bestimmt die wertvollen Rohstoffe, die sich unter der Hülle verstecken.\r\nSammelt alte und kaputte Handys im Familien-, Freundes- und Bekanntenkreis und schraubt diese in Kleingruppen auseinander. \r\nBesprecht in der Klasse die Rohstoffgewinnung und Produktion, bestimmt das Herkunftsland der Rohstoffe und findet heraus, ob es ökologischere Alternativen zu Apple & Co. gibt. Extrapunkte gibt es, wenn ihr eine Handysammelstelle in eurer Schule einrichtet und ein Informationsplakat dazu gestaltet. Die Sammelbox sollte regelmäßig geleert werden.', 5, 'production', NULL, NULL, 'home'),
(43, 'FairTeiler', 'In nahezu jedem Haushalt lassen sich unzählige Gegenstände ausfindig machen, die eigentlich gar nicht mehr gebraucht werden. Warum diese – für andere vielleicht noch nützlichen – Gegenstände nicht einfach teilen und damit den Ressourcenverbrauch reduzieren?\r\nDagegen könnt ihr etwas tun! Baut euch euren eigenen FairTeiler! Das ist ein Platz, an dem ihr ungenutzte Dinge mit euren Klassenkameraden/ -innen teilen könnt. So gestaltet ihr mit eurer eigenen originellen Sharing-Plattform einen ersten Schritt weg von der Wegwerf-Gesellschaft. Lasst eurer Kreativität freien Lauf und gestaltet gemeinsam euren individuellen und einzigartigen FairTeiler.', 9, 'production', NULL, NULL, 'home'),
(44, 'Schoko-Rollenspiel', 'Schokolade – ein Sinnbild für Glück und Genuss. Jährlich essen wir Deutschen ungefähr 12,22 Kilogramm Schokolade und damit sind wir die Spitzenreiter in Europa. Beim Biss in die süße Tafel machen sich jedoch nur wenige von uns tatsächlich Gedanken darüber, wo und wie diese produziert wurde. In dem Schoko-Rollenspiel wird deshalb Genuss und Information verbunden und dabei ein Einblick in die Produktionskette einer Tafel Schokolade gewährt.\r\nSpielt dazu angeleitet von eurer Lehrkraft das Schoko-Rollenspiel und findet heraus, wer von dem Kauf einer Tafel Schokolade wirklich profitiert.', 3, 'production', NULL, NULL, 'home'),
(45, 'Werbemüll, nein danke!', 'Jede Woche landen in vielen Briefkästen Werbeblätter, die ungelesen in den Müll geworfen oder vom Wind in der Straße verteilt werden. Die Papierverschwendung könnte reduziert werden, wenn alle Menschen, die keine Werbung wollen, entsprechende Schilder an ihren Briefkästen anbringen.\r\nDruckt die Materialdatei mindestens fünf Mal pro Klassenmitglied aus, unterzeichnet sie und verteilt die Blätter in eurer Freizeit an eure Nachbar*innen. Ihr könnt alleine oder in Gruppen von Haus zu Haus gehen, um alle gedruckten Schilder euren Nachbarn zu geben und es ihnen möglichst einfach zu machen, den Werbemüll freiwillig zu reduzieren. Ob am Ende alle Nachbar*innen tatsächlich das Schild aufhängen, wird nicht bewertet.', 3, 'production', NULL, NULL, 'home'),
(53, 'Denk mal! Eine Stunde Philosophie', 'Versucht in eurer Freizeit ein Foto zu schießen, auf dem nichts zu sehen ist, was von Menschen gebaut wurde. Debattiert anschließend im Klassenverbund philosophische Fragestellungen, wie beispielsweise „Ist der Mensch Teil der Natur?", oder „Für wen oder was sollten Menschen Verantwortung übernehmen?“. Verteilt in den darauffolgenden Tagen ein kurzes Handout in der Klasse, das zwei Schüler*innen auf Basis der Antworten auf die philosophischen Fragen erstellt haben. Denkt anschließend (etwa im Schulbus oder bei Langeweile Zuhause) eigenständig darüber nach, ob die Antworten auch auf euch selbst zutreffen.', 3, 'culture', NULL, '2016-04-16 12:38:02', 'home'),
(47, 'Don´t let it flow', 'Messt an einem Wasserhahn an eurer Schule, wie viel Wasser pro einmal Händewäschen verbraucht wird. Stoppt dazu die Zeit bei einigen eurer Mitschüler, wie lange dabei der Wasserhahn läuft. Anschließend füllt ihr diese Zeitspanne lang Wasser in Messbecher/Eimer, um zu sehen, wie viel das ist. Erarbeitet Lösungen, wie man Wasser sparen könnte! (Dies könnt ihr übrigens auch zu Hause machen – einfach mal messen, wie lange Mama oder Papa duscht und dann diese Zeit lang Wasser in Eimer füllen! Ihr werdet staunen, wie viel das ist!)', 4, 'water', NULL, NULL, 'home'),
(48, 'Stay clean, but fair', 'Wisst ihr, was ihr euch täglich mit eurem Shampoo in die Haare schmiert? Was ist da eigentlich drin? Ein Blick auf die Inhaltsstoffe von Hygieneartikeln ist hochinteressant. Ihr werdet staunen, was so alles in Shampoo, Duschdas & Co. Drin ist.\r\nLasst euch die Inhaltsstoffe von mindestens zwei Hygieneprodukten von eurem Lehrer erklären! Bringt dazu eure Shampoos, Seifen, etc. mit in die Schule! Sammelt überdies weitere (mindestens 5) Vorschläge für nachhaltigere Hygiene!', 3, 'water', NULL, NULL, 'home'),
(49, 'Taste the water', 'Macht eine Blindverkostung zwischen Leitungswasser und Wasser aus der Plastik- oder Glasflasche! Vergleicht die Kosten für Leitungswasser und Wasser aus der Flasche! Bewertet die unterschiedlichen Verpackungsarten (TetraPaks, Plastik- und Glasflaschen) auf ihre Nachhaltigkeit!', 5, 'water', NULL, NULL, 'home'),
(50, 'Wear fair', 'Habt ihr euch schon mal Gedanken darüber gemacht, wie es eigentlich möglich ist, dass eure Kleidung teilweise so günstig ist? Können diejenigen, die die Kleidung herstellen, damit überhaupt richtig bezahlt werden? Wer näht eigentlich eure Kleidung? Oft heißt die Antwort darauf: Von Kindern, für Kinder – dem soll ein Ende gesetzt werden. Jeder einzelne kann etwas dagegen tun.\r\nMacht unter Anleitung eures Lehrers/ eurer Lehrerin mindestens 3 der 5 Lernspiele zum Thema nachhaltige Kleidung!', 5, 'water', NULL, NULL, 'home'),
(51, 'Be responsible', 'Habt ihr euch schon einmal ehrenamtlich engagiert oder tut es immer noch? In dieser Challenge habt ihr die Möglichkeit eure Tätigkeiten euren Mitschüler*innen vorzustellen. Listet alle ehrenamtlichen Tätigkeiten auf und findet heraus, welche Möglichkeiten es noch gibt sich sozial zu engagieren!', 2, 'culture', NULL, NULL, 'home'),
(52, 'Dienstleistungs-Liste', 'Was kann ich selbst zu einer gelingenden Gemeinschaft beitragen? Eine einfache Frage, die selten gestellt wird, jedoch weitreichende Implikationen haben kann. Der eine ist gut in Mathe und der andere gut in Deutsch, der eine kann gut Fußball spielen und der andere hat ein Talent zum Tanzen . Jeder Mensch hat etwas, dass er gut kann oder aber gerne können würde.\r\nDurch die Gestaltung einer Dienstleistungsliste könnt ihr eure Stärken und Wünsche zusammenbringen und daraus eine Plattform für einen regen Austausch von Dienstleistungen schaffen.', 5, 'culture', NULL, NULL, 'home');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `teacher` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `teacher` (`teacher`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `class`
--

INSERT INTO `class` (`id`, `name`, `teacher`) VALUES
(1, 'Die Sojapatronen', 3),
(2, 'Elektrokürbis', 4),
(3, 'Mc Do Not', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `forgot`
--

CREATE TABLE IF NOT EXISTS `forgot` (
  `id` varchar(40) COLLATE utf8_bin NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `forgot`
--

INSERT INTO `forgot` (`id`, `user`, `created_at`) VALUES
('9ce6975f2a1379b78e72b3573f7e5d7f', 6, '2016-04-17 21:41:27');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `leckerwissen`
--

CREATE TABLE IF NOT EXISTS `leckerwissen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text COLLATE utf8_bin NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `category` enum('food','energy','culture','climate-change','production','other','water') COLLATE utf8_bin NOT NULL,
  `type` enum('article','video','other') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=50 ;

--
-- Daten für Tabelle `leckerwissen`
--

INSERT INTO `leckerwissen` (`id`, `link`, `title`, `category`, `type`) VALUES
(11, 'https://www.youtube.com/watch?v=iiDCNdsU4vI', 'Hagen Rether über Fleisch, Milch & Co [Kabarett]', 'food', 'video'),
(17, 'https://www.youtube.com/watch?v=zOAIOr18FFo', 'Freihandelsabkommen zwischen EU und Afrika', 'production', 'video'),
(18, 'https://news.utopia.de/ratgeber/diese-gruene-filme-sollte-jeder-gesehen-haben/?utm_source=Interessenten&utm_campaign=d3c906d3e5-Newsletter_Mo_15KW52_Interessenten&utm_medium=email&utm_term=0_af58dac727-d3c906d3e5-262279765', '15 Dokumentarfilme zu Nachhaltigkeit', 'food', 'article'),
(19, 'http://www.feelgreen.de/diese-seekuh-frisst-plastikmuell/id_76539278/index', 'Müllschiff soll Plastikmüll aus den Meeren fischen', 'climate-change', 'article'),
(20, 'https://www.facebook.com/gary.yourofsky/videos/886039734784609/', 'Methan - schlimmer als CO²?', 'climate-change', 'video'),
(21, 'http://www.klimaretter.info/forschung/nachricht/18133-landwirtschaft-ist-zweitgroesster-emittent', 'Landwirtschaft auf Rang 2 der größten Treibhausgasemittenten', 'climate-change', 'article'),
(22, 'https://news.utopia.de/ratgeber/12-bilder-die-zeigen-dass-mit-unserer-konsumkultur-etwas-nicht-stimmt/', '12 Bilder, die zeigen, dass mit unserer Konsumkultur etwas nicht stimmt', 'production', 'article'),
(23, 'http://www.feelgreen.de/klimawandel-anstieg-des-meeresspiegels-koennte-megastaedte-ueberfluten/id_76030018/index', 'Anstieg des Meeresspiegels könnte Megastädte überfluten', 'climate-change', 'article'),
(24, 'http://www.zdf.de/ZDFmediathek#/beitrag/video/2514628/Flucht-vor-dem-Klimawandel', 'Flucht vor dem Klimawandel (ZDF)', 'climate-change', 'video'),
(25, 'http://www.palettenbett.com/', 'Palettenmöbel selber bauen', 'production', 'other'),
(26, 'https://www.youtube.com/watch?v=lI0Xc2CWPjM', 'Konsum, Glück und Zeitknappheit', 'other', 'video'),
(27, 'http://de.yallahdeutschland.de/', 'Yallah Deutschland - Videoportal zu Flüchtlingen', 'culture', 'other'),
(28, 'http://www.erneuerbareenergien.de/erneuerbaren-anteil-steigt-2015-voraussichtlich-auf-33-prozent/150/434/91426/', 'Ökostrom-Anteil in Deutschland', 'energy', 'article'),
(29, 'https://www.youtube.com/watch?v=lmXAwTisSd0', 'Gründe, sich vegan zu ernähren', 'food', 'video'),
(30, 'http://www.vegan.eu/index.php/was_ist_vegan.html', 'Was ist vegan?', 'food', 'article'),
(31, 'http://www.wwf.de/2012/maerz/kampf-gegen-globale-wasserkrise/', 'Weltweite Wasserknappheit sorgt für Konflikte', 'water', 'article'),
(32, 'http://www.globalisierung-fakten.de/folgen-der-globalisierung/krisen/wasserknappheit/', 'Fakten zu Wasserknappheit', 'water', 'article'),
(33, 'http://ec.europa.eu/environment/pubs/pdf/factsheets/water_scarcity/de.pdf', 'Dürre in der EU', 'water', 'article'),
(34, 'http://www.biorama.eu/', 'Biorama - Magazin für nachhaltigen Lebensstil', 'other', 'other'),
(35, 'http://www.degrowth.de/de/?', 'Degrowth - Antiwachstumsbewegung', 'culture', 'other'),
(36, 'http://www.klimaretter.info/', 'Klimaretter - Magazin zur Klima- und Energiewende', 'other', 'other'),
(37, 'http://gizmodo.com/here-what-we-ll-be-eating-in-2050-and-what-we-won-t-1762636132', 'Was wir 2050 noch essen werden können', 'food', 'article'),
(38, 'http://www.feelgreen.de/leibspeise-plastik-forscher-entdecken-recycling-bakterium/id_77222778/index', 'Dieses Bakterium frisst Plastik', 'water', 'article'),
(40, 'http://www.love-green.de/facts/warum-wir-geduld-haben-sollten-id12898.html', 'Spannende Umwelt-Fakten', 'climate-change', 'other'),
(41, 'https://www.facebook.com/NowThisNews/videos/1023251154431675/', 'Essbares Besteck, um Plastikgeschirr zu vermeiden', 'water', 'video'),
(42, 'https://www.youtube.com/watch?v=eQmS6s9ZJsc', 'Wie lebt man Nachhaltigkeit?', 'other', 'video'),
(43, 'http://www.oya-online.de/home/index.html', 'OYA-Magazin - anders denken.anders leben', 'other', 'other'),
(44, 'https://www.youtube.com/watch?v=znqPSaquNXs', 'Filmtipp "Der Lorax" - Trailer', 'other', 'video'),
(45, 'https://de.wikipedia.org/wiki/Tiefen%C3%B6kologie', 'Tiefenökologie (Philosophie)', 'other', 'article'),
(46, 'https://www.nabu.de/umwelt-und-ressourcen/oekologisch-leben/essen-und-trinken/16469.html', 'Nachhaltige Getränkewahl', 'water', 'article'),
(47, 'https://de.serlo.org/35106/uebersicht', 'Anleitung für eine Kräuterspirale', 'food', 'other'),
(48, 'http://www.feelgreen.de/-frau-ohne-plastik-verraet-ihre-besten-haushaltstipps/id_77584836/index', 'Tipps für einen Haushalt ohne Plastik', 'water', 'article'),
(49, 'https://de.serlo.org/permakultur', 'Permakultur', 'water', 'other');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `milestone`
--

CREATE TABLE IF NOT EXISTS `milestone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `points` (`points`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `milestone`
--

INSERT INTO `milestone` (`id`, `points`, `description`) VALUES
(1, 10, 'Schon nicht schlecht'),
(2, 20, 'ziemlich krass');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `solved_challenge`
--

CREATE TABLE IF NOT EXISTS `solved_challenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `at` datetime NOT NULL,
  `class` int(11) NOT NULL,
  `challenge` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `class_2` (`class`,`challenge`),
  KEY `class` (`class`),
  KEY `challenge` (`challenge`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `solved_challenge`
--

INSERT INTO `solved_challenge` (`id`, `at`, `class`, `challenge`) VALUES
(4, '2016-03-10 23:05:51', 1, 20),
(5, '2016-03-10 23:05:54', 1, 26),
(6, '2016-03-10 23:05:58', 2, 17),
(7, '2016-03-12 23:22:26', 2, 18),
(8, '2016-03-12 23:22:45', 3, 16),
(9, '2016-03-12 23:22:50', 3, 38),
(10, '2016-03-19 19:23:49', 2, 16),
(11, '2016-04-26 19:34:59', 2, 37);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `suggested`
--

CREATE TABLE IF NOT EXISTS `suggested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `class` int(11) DEFAULT NULL,
  `points` int(11) NOT NULL,
  `location` enum('home','teacher','school') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class` (`class`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `suggested`
--

INSERT INTO `suggested` (`id`, `title`, `description`, `class`, `points`, `location`) VALUES
(3, 'Hallo!', 'Challenge-Beschreibung', 2, 7, 'home');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `role`) VALUES
(3, '$2y$10$WDN.6j.TlEIWUd40fhovoe4wAdjJyvaB2dJtdY7CFqk38FWmzcP6i', 'a@b.de', 2),
(4, '$2y$10$CenkCYnbeP01VK5PMheAnuWC6HaqoukjkldCHCqkzSVmfCj7Av8UG', 'teacher@test.de', 1),
(5, '$2y$10$qwO4uyYVYBiWu7bpzf5cV.kB7G6TYIoNVEMe8IG4Wvw7hwoeShjFK', 'andreas-eichenseher@web.de', 2),
(6, '$2y$10$UcFJjRR39AZnE2WG3x.6bOeAPz19GNueDZkAY1ad4SVr4b3NpNYou', 'mackie.loeffel@web.de', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
