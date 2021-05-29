<?php
    session_start();
    include("fonctions.php");
    connectMaBase();
    $search = mysql_query('SELECT * FROM identifiants WHERE id='.$_SESSION['id'].';');
    $infos = mysql_fetch_array($search);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="/quizmaths/css/style.css" rel="stylesheet"/>
    <title>ToutSurLesMaths</title>
    <link rel="icon" type="image/x-icon" href="/quizmaths/images/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link href="/quizmaths/css/daynight.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" 
    crossorigin="anonymous">
</head>
<body onload="checker()">
<header>
		<section class="section-header">
			<div class="boutton-menu" style="display: none; width: 210px;"> <a onclick="displayMenu()" style="width: 40px; cursor:pointer;">&#9776;</a>
				<ul id="menu" class="hidemenu">
					<li><a href="/quizmaths/accueil">Accueil</a></li>
					<li><a href="/quizmaths/cours-et-lecons">Cours, Leçons</a></li>
					<li><a href="exercices">Exercices, Quizz</a></li>
					<?php
                        if($_SESSION['logged_in']){
                            echo('<li><a href="/quizmaths/moncompte">'.$infos['prenom'].'</a></li>');
                        }else{
                            echo('<li><a href="login">Me connecter</a></li>');
                        }
                    ?>
						<li><a href="mailto:jadeg2003@icloud.com">Contact</a></li>
				</ul>
			</div>
			<ul>
				<li><a href="/quizmaths/accueil">Accueil</a></li>
				<li><a href="/quizmaths/cours-et-lecons">Cours, Leçons</a></li>
				<li><a href="exercices">Exercices, Quizz</a></li>
			</ul> <img class="logo" src="/quizmaths/images/icon.png" alt="Logo du site">
			<ul>
				<?php
                if($_SESSION['logged_in']){
                    echo('<li id="compte"><a href="/quizmaths/moncompte">'.$infos['prenom'].'</a></li>');
                }else{
                    echo('<li id="compte"><a href="login">Me connecter</a></li>');
                }
                ?>
                <div style="display: flex;justify-content: space-around;align-items: center;">
                    <form action="" class="searchbar">
                        <input type="search"> <i class="fa fa-search"></i> </form>
                    <div class="wrapper">
                        <div class="toggle">
                            <input class="toggle-input" name="nightmodecheckbox" type="checkbox" />
                            <div class="toggle-bg"></div>
                            <div class="toggle-switch">
                                <div class="toggle-switch-figure"></div>
                                <div class="toggle-switch-figureAlt"></div>
                            </div>
                        </div>
                    </div>
                </div>
			</ul>
		</section>
	</header>
<div id="search_page"></div>
<main>
    <div style="background:deepskyblue;padding:10px;margin:0 -8px;padding: 80px;">
    <h1>Conditions Générales d'Utilisation</h1>
    <h3>Définitions</h3>
    Les Parties conviennent et acceptent que les termes suivants utilisés avec une majuscule, au singulier et/ou au pluriel, auront, dans le cadre des présentes Conditions Générales d'Utilisation, la signification définie ci-après :<br><br>
    <ul>
        <li>« Contrat » : désigne les présentes Conditions Générales d'Utilisation ainsi que la Politique de protection des données personnelles ;</li><br>
        <li>« Membre » : désigne indifféremment le Membre Freemium et le Membre Premium ;</li><br>
        <li>« Membre Freemium » désigne le membre ayant un compte sur notre Plateforme pour accéder aux fonctionnalités gratuites de notre Plateforme ;</li><br>
        <li>« Membre Premium » désigne le membre ayant un compte sur notre Plateforme pour accéder aux services Premium Solo ou Plus ;</li><br>
        <li>« Plateforme » : plateforme numérique de type site Web et/ou application mobile permettant l'accès au Service ainsi que son utilisation ;</li><br>
        <li>« Utilisateur » : désigne toute personne qui utilise la Plateforme, qu'elle soit un Visiteur ou un Membre ;</li><br>
        <li>« Visiteur » : désigne toute personne, internaute, naviguant sur la Plateforme sans création de compte associé.<br>Les présentes Conditions Générales d'Utilisation (ci-après les "CGU") régissent nos rapports avec vous, personne accédant à la Plateforme, applicables durant votre utilisation de la Plateforme et, si vous êtes un Membre jusqu'à désactivation de votre compte. Si vous n'êtes pas d'accord avec les termes des CGU il vous est vivement recommandé de ne pas utiliser notre Plateforme et nos services.</li><br>
    </ul>
    En naviguant sur la Plateforme, si vous êtes un Visiteur, vous reconnaissez avoir pris connaissance et accepté l'intégralité des présentes CGU et notre Politique de protection des données personnelles.<br><br>
    En créant un compte en cliquant sur le bouton « S'inscrire avec Facebook » ou « Inscription avec un email » ou « S'inscrire avec Google » pour devenir Membre, vous êtes invité à lire et accepter les présentes CGU et la Politique de protection des données personnelles, en cochant la case prévue à cet effet.<br><br>
    Nous vous encourageons à consulter les « Conditions Générales d'Utilisation et la Politique de protection des données personnelles » avant votre première utilisation de notre Plateforme et régulièrement lors de leurs mises à jour. Nous pouvons en effet être amenés à modifier les présentes CGU. Si des modifications sont apportées, nous vous informerons par email ou via notre Plateforme pour vous permettre d'examiner les modifications avant qu'elles ne prennent effet. Si vous continuez à utiliser notre Plateforme après la publication ou l'envoi d'un avis concernant les modifications apportées aux présentes conditions, cela signifie que vous acceptez les mises à jour. Les CGU qui vous seront opposables seront celles en vigueur lors de votre utilisation de la Plateforme.
    <h3>Article 1. Inscription au service</h3>
    1.1 Conditions d'inscription à la Plateforme<br><br>
    Certaines fonctionnalités de la Plateforme nécessitent d'être inscrit et d'obtenir un compte. Avant de pouvoir vous inscrire sur la Plateforme vous devez avoir lu et accepté les présentes CGU et la Politique de protection des données personnelles.<br><br>
    Vous déclarez avoir la capacité d'accepter les présentes conditions générales d'utilisation, c'est-à-dire avoir plus de 16 ans et ne pas faire l'objet d'une mesure de protection juridique des majeurs (mise sous sauvegarde de justice, sous tutelle ou sous curatelle).<br><br>
    Avant d'accéder à notre Plateforme, le consentement des mineurs de moins de 16 ans doit être donné par le titulaire de l'autorité parentale.<br><br>
    Notre Plateforme ne prévoit aucunement l'inscription, la collecte ou le stockage de renseignement relatifs à toute personne âgée de 15 ans ou moins.<br><br>
    1.2 Création de compte<br><br>
    Vous pourrez créer un compte des deux manières suivantes :
    <br><br>
    Soit remplir manuellement, sur notre Plateforme, les champs obligatoires figurant sur le formulaire d'inscription, à l'aide d'informations complètes et exactes. Pour enregistrer votre compte, il vous faudra soumettre à ToutSurLesMaths certaines informations à caractère personnel telles que votre nom, prénom et votre adresse email. Vous trouverez le descriptif du traitement de vos données dans notre Politique de protection des données personnelles ;<br><br>
    Soit en utilisant un compte existant (notamment via Google Plus ou Facebook), en utilisant la fonction prévue à cet effet. En utilisant une telle fonctionnalité, nous aurons accès, publierons sur notre Plateforme et conserverons certaines informations de votre compte Facebook ou Google. Vous pouvez à tout moment supprimer le lien entre votre compte sur la Plateforme ToutSurLesMaths et votre compte Google Plus ou Facebook par l'intermédiaire des réglages de votre profil Google Plus ou Facebook. Si vous souhaitez en savoir plus sur l'utilisation de vos données dans le cadre de votre compte Facebook ou Google, consultez notre Politique de protection des données personnelles et celles de Facebook et Google.<br>Vous recevrez ensuite un email avec un mot de passe temporaire que vous devrez ensuite modifier lors de votre première connexion à notre Plateforme.<br>A l'occasion de la création de votre compte, et ce quelle que soit la méthode choisie pour ce faire, vous vous engagez à fournir des informations personnelles vraies, exactes, complètes et à les mettre à jour par l'intermédiaire de votre profil ou en en avertissant ToutSurLesMaths, afin d'en garantir la pertinence et l'exactitude tout au long de votre relation avec ToutSurLesMaths.<br><br>
    En cas d'inscription par email, vous vous engagez à garder secret le mot de passe choisi lors de la création de votre compte et à ne le communiquer à personne. En cas de perte ou divulgation de votre mot de passe, vous vous engagez à en informer sans délai ToutSurLesMaths. Vous êtes seul responsable de l'utilisation faite de votre compte par un tiers, tant que vous n'avez pas expressément notifié ToutSurLesMaths de la perte, l'utilisation frauduleuse ou la divulgation de votre mot de passe à un tiers.<br><br>
    Vous vous engagez à ne pas créer ou utiliser, sous votre propre identité ou celle d'un tiers, d'autres comptes que celui initialement créé. Vous ne pouvez pas autoriser des tiers à utiliser votre compte. Vous ne pouvez pas céder ou, quoi qu'il en soit, transférer votre compte à toute autre personne ou entité.<br><br>
    Les informations que vous avez fournies pendant l'inscription peuvent être corrigées pendant le processus d'inscription en revenant aux écrans précédents et en corrigeant les informations erronées. Vous acceptez de respecter les lois applicables lorsque vous utilisez les services, et vous ne pouvez utiliser les services qu'à des fins légales. Le contenu présent sur la Plateforme doit uniquement être utilisé pour un usage privé.<br><br>
    Lorsque vous choisissez votre mot de passe, vous ne devez pas utiliser de mot de passe simpliste (par exemple : 123456).<br><br>
    L'identifiant et le mot de passe seront strictement personnels et confidentiels et vous devrez les conserver et les utiliser de manière à en préserver la stricte confidentialité.<br><br>
    Le Membre sera seul autorisé à accéder au Service à l'aide de son identifiant et son mot de passe. Toute utilisation de la Plateforme au moyen de ses identifiants et mot de passe est réputée avoir été faite par le Membre lui-même. En cas d'utilisation par un tiers de ses identifiant et mot de passe, le Membre devra en avertir immédiatement ToutSurLesMaths en lui adressant un email à l'adresse suivante : <a class="link" href="mailto:kevin.kameni77500@gmail.com">hello@toutsurlesmaths.com</a>.<br><br>
    Le Membre qui a perdu son mot de passe devra se connecter sur le site deToutSurLesMaths et suivre la procédure en cliquant sur le lien « mot de passe oublié ».<br><br>
    Le Membre est responsable de l'utilisation de la Plateforme et de toutes les actions réalisées au sein de la Plateforme avec son identifiant et son mot de passe, sauf si l'utilisation de son compte a été faite après sa désinscription, ou après notification à ToutSurLesMaths d'une utilisation abusive de son compte.<br><br>
    1.3. Conditions d'accès à la Plateforme<br><br>
    1.3.1 Si vous n'avez pas de compte Membre gratuit
    <br><br>
    Si vous n'avez pas créé de compte Membre sur notre Plateforme, vous pouvez tout de même accéder à la Plateforme mais vous ne pourrez pas bénéficier de toutes les fonctionnalités et vous n'aurez pas de profil personnel. En effet certains accès ne vous seront pas autorisés, comme l'accès intégral aux cours publiés par notre équipe pédagogique et les quiz de fin d'exercice. Vous n'aurez pas de compte personnel. Les présentes CGU vous sont opposables car elles régissent les conditions d'utilisation du Service, vous devez en prendre connaissance et les accepter avant de poursuivre votre navigation sur la Plateforme.<br><br>
    1.3.2 Si vous avez déjà un compte membre gratuit - Service Freemium
    <br><br>
    Le service ToutSurLesMaths qui ne nécessite pas de paiement est actuellement désigné par l'expression « Service Freemium ».<br><br>
    Si vous avez créé un compte Membre gratuit vous pouvez accéder à la Plateforme et à certaines fonctionnalités du Service Freemium. Suite à la création de votre compte, vous pourrez accéder à votre page de profil où vous renseignez certaines mentions qui sont obligatoires et d'autres qui sont optionnelles.<br><br>
    Vous pouvez accéder à tous les cours disponibles mais vous serez limités à 10 vidéos de cours par semaine. Vous avez également accès aux quiz à la fin des cours. Toutefois, comme vous n'aurez pas suivi de formation avec abonnement, nous ne pourrons pas vous délivrer de certificat relatif au cours suivi. Avant d'utiliser la Plateforme, vous devrez lire attentivement les présentes Conditions Générales d'Utilisation.
    <h3>Article 2. Informations fournies par vous</h3>
    Chaque personne garantit à ToutSurLesMaths que les informations qu'il fournit quant à son identité et ses coordonnées dans le cadre du Service sont vraies, exactes, complètes et à jour. Vous êtes seul responsable de la sincérité et de l'exactitude de ces informations. Vous vous engagez à mettre à jour régulièrement l'ensemble des informations afin de préserver leur exactitude.<br><br>
    ToutSurLesMaths ne pourra en aucun cas être tenue responsable des erreurs, omissions, imprécisions pouvant être relevées dans les informations que vous nous avez fournies, ni du préjudice pouvant éventuellement en découler pour les autres Utilisateurs ou pour des tiers.<br><br>
    Vous êtes responsable de toute l'activité qui se déroule sur votre compte, et vous acceptez de préserver à tout moment la sécurité et le secret de votre identifiant et de votre mot de passe. Vous ne pouvez posséder qu'un seul compte.
    <h3>Article 3. Propriété intellectuelle</h3>
    3.1. Propriété intellectuelle afférente au Service, à notre Plateforme et aux éléments qui les composent<br><br>
    A l'exception des cours réalisés par les Utilisateurs et/ou par les Partenaires de ToutSurLesMaths, l'ensemble des éléments techniques, graphiques, textuels ou autres constituant le Service et/ou notre Plateforme (textes, graphismes, logiciels, fichiers multimédias, photographies, images, vidéos, sons, plans, charte graphique, technologie(s), codes sources, noms, marques, logos, visuels, bases de données, etc.) ainsi que notre Plateforme et le Service eux-mêmes sont la propriété exclusive de ToutSurLesMaths.<br><br>
    L'Utilisateur reconnaît qu'aucune propriété ne lui est transmise, et qu'aucun droit ou licence ne lui est accordé(e), en dehors d'un droit d'utiliser le Service conformément aux présentes pendant la durée du Contrat, et des droits d'utilisation des cours qui lui sont concédés en vertu des licences Creative Commons visées à l'Article 4.11 ci-après.<br><br>
    En conséquence, sauf autorisation expresse et préalable de ToutSurLesMaths et/ou sauf licence Creative Commons l'y autorisant, l'Utilisateur s'engage à ne pas :<br><br>

    Reproduire, à des fins commerciales ou non, des cours présents au sein du Service (à l'exception de ses propres cours) et/ou les éléments techniques, graphiques, textuels ou autres constituant le Service et/ou notre Plateforme ;<br><br>
    Intégrer tout ou partie du contenu du Service et/ou de notre Plateforme dans un site tiers, à des fins commerciales ou non ;<br><br>
    Utiliser un robot, notamment d'exploration (spider), une application de recherche ou de récupération de sites Web ou tout autre moyen permettant d'extraire, réutiliser ou d'indexer tout ou partie du contenu du Service et/ou de notre Plateforme ;<br><br>
    Collecter les informations sur les Utilisateurs pour leur envoyer des messages non sollicités et/ou les intégrer au sein d'un service de référencement ou équivalent, gratuit ou payant ;<br><br>
    Copier les cours présents au sein du Service (à l'exception de ses propres cours) et/ou les éléments techniques, graphiques, textuels ou autres constituant le service et/ou notre Plateforme sur des supports de toute nature permettant de reconstituer tout ou partie des fichiers d'origine.<br>Toute utilisation non expressément autorisée d'éléments du Service et/ou de notre Plateforme engage la responsabilité civile et/ou pénale de son auteur et sera susceptible d'entraîner des poursuites judiciaires à son encontre.<br><br>
    3.2. Propriété intellectuelle afférente aux contenus publiés par l'Utilisateur au sein du Service<br><br>
    3.2.1. En contrepartie de l'usage du Service, et quelle que soit la licence Creative Commons à laquelle le cours est soumis par ailleurs, les Membres accordent à ToutSurLesMaths une licence mondiale, non-exclusive, transférable et pouvant donner lieu à l'octroi d'une sous-licence, conférant à ToutSurLesMaths le droit de copier, stocker, corriger, adapter et diffuser l'ensemble des contenus (en ce compris, les cours, les Projets et toute autre activité réalisée par les Membres au sein du Service) fournis par le Membre au sein du Service. Cette licence est concédée au fur et à mesure de la publication des éléments concernés, aux seules fins du bon fonctionnement du Service.<br><br>
    3.2.2. Les Membres susmentionnés garantissent qu'ils disposent des droits de propriété intellectuelle et des droits de la personnalité (et en particulier, le droit à l'image) nécessaires à la publication des contenus (en ce compris, les cours) qu'ils publient au sein du Service.<br><br>
    Ils garantissent également que les contenus qu'ils publient au sein du Service ne contiennent rien qui soit contraire aux droits des tiers et aux lois en vigueur, et notamment aux dispositions relatives à la diffamation, à l'injure, à la vie privée, au droit à l'image, à l'atteinte aux bonnes mœurs ou à la contrefaçon.<br><br>
    Vous garantissez ainsi ToutSurLesMaths contre tout recours éventuel d'un tiers concernant la publication desdits contenus (en ce compris, les cours) au sein du Service.
    <h3>Article 4. Fonctionnalités du service</h3>
    4.1. Les cours en ligne<br><br>
    4.1.1. Tout cours publié au sein du Service demeure la propriété de son auteur.<br><br>
    Sauf mention contraire, chaque cours est soumis à l'une des quatre (4) licences Creative Commons suivantes :
    <br><br>
    Licence CC BY ;<br><br>
    Licence CC BY-SA ;<br><br>
    Licence CC BY-NC ;<br><br>
    Licence CC BY-NC-SA ;<br><br>
    Les droits d'utilisation couverts par chacune de ces licences Creative Commons sont détaillés sur la page suivante.<br><br>
    L'Utilisateur s'engage à prendre connaissance de la licence à laquelle chaque cours est soumis et à respecter les modalités d'usage du cours visées par la licence concernée. Notamment, l'Utilisateur qui souhaite reproduire tout ou partie d'un cours doit impérativement vérifier que la licence à laquelle il est soumis le permet.<br><br>
    4.2 Espaces de discussion<br><br>
    Les Membres et les Abonnés ont la faculté d'accéder à des espaces de discussion où ils peuvent consulter notamment les fils de discussion entre Membres ou entre Abonnés, et échanger avec ces derniers sur une question donnée.<br><br>
    Vous vous engagez à ne pas diffuser de correspondance privée sur les espaces de discussion publics et doit, à cette fin, utiliser le service de messagerie privée.<br><br>
    Lorsque vous publiez un message, vous vous obligez à respecter en particulier les dispositions de l'Article 7.2 ci-après et celles de la « Charte de Bonne Conduite ».<br><br>
    Les Membres et les Abonnés peuvent visualiser les messages des autres Membres et Abonnés sur les espaces de discussion publics et les signaler, conformément à l'Article 5 ci-après.
    <h3>Article 5. Signalement - modération a posteriori</h3>
    Tout Membre ou Abonné a la possibilité de signaler à ToutSurLesMaths tout message ou commentaire et plus généralement tout contenu publié au sein du Service qui serait contraire au Contrat ou autrement illicite, et notamment outrageant, injurieux, diffamatoire, abusif, violent, obscène ou pornographique, ou comprenant une provocation à la discrimination ou à la haine fondée sur la race, la religion, le sexe, ou autre, une provocation aux crimes et délits, ou une apologie de crime, ou de nature à porter atteinte aux droit de propriété intellectuelle ou aux droits de la personnalité des tiers, ou encore de nature à altérer le fonctionnement du Service et/ou de notre Plateforme, de quelque manière que ce soit.<br><br>
    Pour cela, vous devrez contacter ToutSurLesMaths, soit par email à l'adresse : <a class="link" href="mailto:kevin.kameni77500@gmail.com">hello@toutsurlesmaths.com</a>, soit à l'aide du formulaire accessible au sein du Service en cliquant sur l'onglet « Nous contacter », soit par courrier postal à l'adresse : ToutSurLesMaths, 10, Quai de la Charente, 75019 Paris, France, et procéder comme suit :
    <br><br>
    Décliner votre identité ;<br><br>
    Décrire le contenu litigieux de manière précise et détaillée ainsi que sa localisation sur notre Plateforme ;<br><br>
    Décrire les motifs de fait et droit pour lesquels le contenu litigieux doit être considéré comme manifestement illicite et, par suite, retiré de notre Plateforme ;<br><br>
    Adresser la copie de la correspondance que vous aurez préalablement envoyée à l'auteur de ce contenu pour en demander la modification ou le retrait et/ou la justification que vous n'avez pas pu contacter cet auteur.<br>Nous nous réservons le droit de supprimer tout contenu illicite ou non conforme au Contrat qui aura été préalablement signalé. Tout signalement manifestement abusif pourra être sanctionné par ToutSurLesMaths.<br><br>
    Pour plus d'informations sur ses obligations, vous êtes invité à prendre connaissance de la « Charte de Bonne Conduite ».
    <h3>Article 6. Protection des données personnelles</h3>
    Nous portons une attention particulière à la protection de vos données personnelles. Vous trouverez ici le descriptif détaillé des utilisations que nous faisons de vos données personnelles et des cookies et leurs finalités.<br><br>
    ToutSurLesMaths invite expressément l'Utilisateur à consulter sa Politique de protection des données personnelles qui fait partie intégrante des présentes CGU.
    <h3>Article 7. Obligations des Utilisateurs et Charte de Bonne Conduite</h3>
    7.1 Obligations des Utilisateurs<br><br>
    Dans le cadre de l'utilisation de la Plateforme, nous vous demandons de vous engager à :
    <br><br>
    Garantir l'exactitude, l'intégrité et la légalité des informations que vous fournissez sur la Plateforme quantà votre identité et vos coordonnées ;<br><br>
    Garantir le bon usage de la Plateforme ;<br><br>
    Ne créer qu'un seul compte au sein de la Plateforme ;<br><br>
    S'abstenir de saisir des informations et/ou messages, commentaires et autres contenus malveillants, dénigrants,diffamatoires, injurieux, obscènes, pornographiques, violents, à caractère raciste, xénophobe, discriminatoire,volontairement trompeurs, illicites et/ou contraires à l'ordre public ou aux bonnes mœurs ;<br><br>
    Respecter les droits des tiers, et notamment le droit de chacun au respect de sa vie privée, de son image etde ses autres droits de la personnalité, ainsi que les droits de propriété intellectuelle (droit d'auteur,droits voisins, droit sur les bases de données, droit des marques, droit des brevets, dessins ou modèles,secret de fabrique, etc.) ;<br><br>
    Ne pas usurper la qualité, l'attribut ou l'identifiant d'un autre Utilisateur ou d'un tiers de nature à induireen erreur ou à créer une confusion quelconque quant à son identité, à la provenance des informations, contenus(cours, messages, commentaires, etc.) qu'il diffuse ou transmet au sein de la Plateforme ;<br><br>
    Ne pas altérer ou perturber l'intégrité de la Plateforme et/ou des données qui y sont contenues ;<br><br>
    Ne pas tenter d'obtenir un accès non autorisé à la Plateforme ou aux systèmes ou réseaux qui lui sont associésou d'intercepter des données ;<br><br>
    Utiliser la Plateforme dans le respect des législations et réglementations nationales et/ou internationales applicables.<br>En cas de manquement à l'une de ces obligations, nous nous réservons le droit de suspendre temporairement ou définitivement le compte de l'Utilisateur.<br><br>
    7.2 Charte de Bonne Conduite<br><br>
    ToutSurLesMaths est un site web communautaire basé sur l'entraide et le partage dont les forums sont ouverts à tous les Membres et Abonnés. Chacun est invité à y participer, en se créant un compte sur ToutSurLesMaths et en respectant les règles élémentaires de courtoisie et la législation en vigueur.<br><br>
    Les échanges sur ToutSurLesMaths sont modérés a posteriori, c'est-à-dire qu'aucun message ne sera relu avant sa publication. Les messages sont donc publiés immédiatement, mais sont susceptibles d'être contrôlés par l'équipe de modération et les administrateurs de notre Plateforme, après publication par le membre.<br><br>
    Le rôle de l'équipe de modération et des administrateurs est de veiller au bon fonctionnement des forums, en écartant tout message qui par leur caractère indigne, attentatoire aux personnes, destructeur ou manifestement hors sujet, nuisent aux échanges. Les modérateurs et les administrateurs excluent également tous messages contraires aux lois en vigueur.<br><br>
    Sont ainsi susceptibles de modération (liste non exhaustive) :
    <br><br>
    les messages à caractère racistes, haineux, homophobes, sexistes ou diffamatoires<br><br>
    les messages à caractère publicitaires<br><br>
    les messages obscènes, pornographiques ou relevant du harcèlement<br><br>
    les messages mentionnant des coordonnées précises comme un numéro de téléphone, une adresse postale et dontl'origine et l'exactitude sont invérifiables par les modérateurs ou pourraient engendrer un préjudices à des personnes<br><br>
    les messages publiés en plusieurs exemplaires<br><br>
    les messages hors sujet ou incitant à la polémique<br><br>
    les messages en langage abrégé ou dont l'orthographe est trop approximative<br><br>
    les messages rédigés entièrement en majuscules<br><br>
    En cas de non-respect de ces règles et consignes, l'équipe de ToutSurLesMaths appliquera certaines sanctions aux Utilisateurs concernés. La sanction la plus élevée est le bannissement et consiste à bloquer entièrement l'accès à la Plateforme à un Utilisateur.
    <h3>Article 8. Responsabilité de ToutSurLesMaths</h3>
    8.1 A l'égard des informations et/ou contenus publiés au sein de la Plateforme par les Utilisateurs<br><br>
    A l'exception des cours créés par les Membres - qui devront faire l'objet d'une validation préalable par ToutSurLesMaths avant leur mise en ligne, les informations et contenus (messages, commentaires) publiés par les Utilisateurs au sein de la Plateforme ne sont pas contrôlés en amont par ToutSurLesMaths avant leur publication au sein de la Plateforme. En revanche, ils seront susceptibles d'être contrôlés a posteriori par ToutSurLesMaths.<br><br>
    En notre qualité d'hébergeur de ces informations et/ou contenus (hors cours) mis en ligne par l'Utilisateur par l'intermédiaire de notre Plateforme, nous sommes soumis au régime de responsabilité atténuée prévu aux Articles 6.I.2 et suivants de la loi nº2004-575 du 21 juin 2004 pour la Confiance dans l'Économie Numérique. Nous pourrons, dans ce cadre, supprimer les Informations et/ou contenus manifestement illicites qui nous seront notifiés.<br><br>
    8.2 En cas d'inexécution de nos obligations<br><br>
    ToutSurLesMaths ne sera responsable que des dommages directs subis par les Utilisateurs, dont il sera établi qu'ils résultent de l'inexécution nos obligations.<br><br>
    En revanche, nous ne saurons en aucun cas être tenus responsable :
    <br><br>
    Des dommages qui résulteraient du fait de l'Utilisateur, de difficultés inhérentes au fonctionnement du réseau Internet et plus généralement des réseaux de télécommunication, quelle que soit leur nature, du fait d'un tiers ou d'un cas de force majeure ;<br><br>
    Des dommages indirects résultant de l'utilisation de la Plateforme, ceux-ci étant définis de façon non limitative comme les pertes d'exploitation (chiffre d'affaires, revenus ou bénéfices), les pertes d'opportunités, les préjudices d'image ou de réputation, préjudice commercial ou économique ;<br><br>
    De toute perte de données subie par l'Utilisateur, même si elle est du fait de ToutSurLesMaths.<h3>Article 9. Interruption du service pour maintenance ou amélioration</h3>
    Nous nous engageons à mettre tout en œuvre pour assurer le bon fonctionnement de la Plateforme et son accessibilité mais nous ne sommes tenus qu'à une obligation de moyens concernant la continuité de l'accès au Service. Nous ne pouvons garantir la pérennité ou les performances de la Plateforme.<br><br>
    En cas de mise à jour de la Plateforme pour une évolution technique, notre Plateforme sera inaccessible temporairement.<br><br>
    L'accès au Service pourra être interrompu pour des raisons notamment de maintenance, de mise à jour et en cas d'urgence.<br><br>
    Plus généralement, l'interruption du Service quel que soit la cause, la durée ou la fréquence, n'engagera pas notre responsabilité et ne donnera droit à aucune indemnité à l'Utilisateur.<br><br>
    En conséquence, nous ne pouvons être tenu pour responsable de la perte d'argent, ou de réputation, ni des dommages spéciaux, indirects ou induits résultant de l'interruption du Service. De même, nous ne pourrons être tenus pour responsable des éventuelles dégradations de matériel, logiciel ou données (exemple : contamination virale) subies par l'Utilisateur du fait de son utilisation du Service.<br><br>
    Pour éviter autant que possible des désagréments, vous devez vous assurer de la réalisation régulière de sauvegardes concernant vos informations, contenus et logiciels.<br><br>
    Vous reconnaissez utiliser le Service, mais un "bug" de notre Plateforme peut vous faire perdre certaines de vos données, les altérer ou les exposer. Nous nous engageons cependant à tout mettre en oeuvre pour les restaurer dans la mesure du possible et à vous garantir un accès à la Plateforme le plus rapidement.
    <h3>Article 10. Inscription et droits sur le compte Utilisateur</h3>
    10.1 Par un Membre<br><br>
    Tous les Membres de notre Plateforme disposent d'un droit d'accès, de modification ou de suppression de leur compte.<br><br>
    Les conditions de résiliation pour une souscription inférieure à quatorze (14) jours pour les abonnés ayant souscrit un Abonnement Premium sont régies par l'Article 9 des Conditions Générales de Service. Nous vous prions de bien vouloir vous y référer si vous êtes dans cette situation.<br><br>
    Si vous avez obtenu un certificat ou un diplôme ou validé des compétences nous ne pourrons pas faire droit à votre demande de suppression de compte. En raison de nos obligations réglementaires liées à la nature de notre activité, nous devons conserver votre dossier étudiant comprenant votre fiche identité, et l'ensemble de votre parcours suivi avec ToutSurLesMaths. Vos données seront archivées tout en veillant à une exigence maximale de sécurité en n'étant accessibles qu'à un nombre limité de personnes au sein de nos services. Nous pourrons, si vous le souhaitez, vous adressez votre dossier étudiant.<br><br>
    Si vous vous êtes engagés avec nous avec un Abonnement Premium plus mais que vous avez décidé d'arrêter votre Parcours, nous traiterons votre demande selon que vous avez décidé d'arrêter définitivement votre Abonnement ou de faire une suspension. Dans le premier cas, nous supprimerons toutes vos données dans un délai de trente (30) jours, mais dans le second cas, nous ne pourrons pas faire droit à votre demande car nous devons conserver votre dossier lorsque vous serez diplômé pour des contraintes règlementaires liées à la nature de notre activité.<br><br>
    Les Utilisateurs ainsi que les Abonnés Premium Solo peuvent à tout moment modifier et obtenir un droit d'accès à leur compte personnel en nous contactant par email à l'adresse <a class="link" href="mailto:kevin.kameni77500@gmail.com">hello@toutsurlesmaths.com</a>. Si vous souhaitez vous désinscrire de notre Plateforme, veuillez cliquer sur le lien « je veux supprimer mon compte » dans l'onglet paramètre du profil membre ou en nous contactant par email à l'adresse précité. Votre demande de suppression de compte entraînera la suppression de vos données personnelles de nos bases de données. La désinscription entraînera la résiliation du Contrat. Cette résiliation prendra effet dans un délai de trente (30) jours ouvrés à compter de la réception de la demande de désinscription par ToutSurLesMaths.<br><br>
    10.2 Par ToutSurLesMaths<br><br>
    Si une demande d'inscription à nos services est effectuée par un mineur sans le consentement préalable de son responsable légal, nous pourrons bloquer l'accès au Compte jusqu'à ce que le consentement soit obtenu.<br><br>
    Lorsque nous remarquons qu'un Utilisateur, un Membre ou un Abonné de la Plateforme ne respecte pas les présentes CGU et les CGV, nous prendrons contact avec lui pour l'avertir qu'une sanction à son égard peut être prise, notamment la suspension de son compte. La Charte de bonne conduite énoncée dans ces CGU doit être respectée par chacun pour le bon fonctionnement de la Plateforme et la bonne entente entre les personnes.<br><br>
    Si aucune solution ne parvient à être trouvée et que les règles de bonne conduite ne sont pas respectées, nous serons dans l'obligation de désactiver votre compte pour une durée temporaire ou définitive et nous prendrons contact avec vous au préalable par email.
    <h3>Article 11. Force majeure</h3>
    Aucune des parties ne sera responsable vis-à-vis de l'autre partie d'un retard d'exécution ou d'une inexécution en raison de survenance d'un événement en dehors du contrôle des parties qui ne pouvait être raisonnablement prévu lors de l'acceptation des CGU et dont les effets ne peuvent pas être évités par des mesures appropriées.<br><br>
    Le cas de force majeure suspend les obligations de la partie concernée pendant le temps où jouera la force majeure si cet évènement est temporaire. Néanmoins, les parties s'efforceront d'en minimiser dans toute la mesure du possible les conséquences. A défaut, si l'empêchement est définitif, les parties seront libérées de leurs obligations dans les conditions prévues aux Articles 1351 et 1351-1 du Code civil.
    <h3>Article 12. Résolution des différends</h3>
    Les CGU sont soumises à la loi française. Toutes difficultés relatives à la validité, l'application ou à l'interprétation des CGU seront soumises, à défaut d'accord amiable, au Tribunal de Grande Instance de Paris, auquel les Parties attribuent compétence territoriale, quel que soit le lieu d'exécution ou le domicile du défendeur. Cette attribution de compétence s'applique également en cas de procédure en référé, de pluralité de défendeurs ou d'appel en garantie.
    </div>
</main>
<footer class="links-bottom">
    <div style="padding:20px;" align="center">
        <a href="#top">Revenir en haut</a>
    </div>
    <div class="contact">
        <div style="color: #0D9FDC;">
        <h3>Si vous avez besoin de quoi que ce soit</h3>
        </div>
        <div class="a-block">
        <a href="#" >NOUS CONTACTER</a>
        </div>
    </div>
    <br><br>
    <ul class="bot-page">
        <ul>NOTRE SITE
            <li><a href="#">Accueil</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="terms-conditions.php">Conditions générales d'utilisation</a></li>
        </ul>
        <ul>LES NIVEAUX
            <li><a href="6e.php">6e</a></li>
            <li><a href="5e.php">5e</a></li>
            <li><a href="4e.php">4e</a></li>
            <li><a href="3e.php">3e</a></li>
        </ul>
        <div class="reseaux">
            <a href="https://www.instagram.com/__jxdde__/" target="_blank"><img src="images/instagram.png"></a>
            <a href="https://twitter.com/SbOmaa?s=20" target="_blank"><img src="images/twitter.png"></a>
            <a href="https://www.tiktok.com/@__jxdde__?lang=fr" target="_blank"><img src="images/tiktok.png"></a>
            <a href="https://www.youtube.com/channel/UC0y_0oUVZeCrCzAZRvG6cig" target="_blank"><img src="images/youtube.png"></a>
        </div>
    </ul>
</footer>
<script type="text/javascript" src="/quizmaths/cookies/daynight.js"></script>
<script type="text/javascript" src="/quizmaths/js/navbar.js"></script>
<?php
    $themeClass = '';
    if (!empty($_COOKIE['theme'])) {
      if ($_COOKIE['theme'] == 'dark') {
        $themeClass = 'dark-theme';
        echo('<script type="text/javascript">
        var x = document.querySelector("input[name=nightmodecheckbox]");
        x.checked = true;
        setNightMode();
        </script>');
      } else if ($_COOKIE['theme'] == 'light') {
        $themeClass = 'light-theme';
      }
    }
?>
</body>
</html>