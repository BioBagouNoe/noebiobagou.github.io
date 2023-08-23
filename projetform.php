<?php
$db=new PDO('mysql:host=localhost;dbname=canada',"root","");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
//Récuperer les informations
if(isset($_POST['envoyer'])){
    if(!empty($_POST['titre']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email'])
     && !empty($_POST['nationalite']) && !empty($_POST['pays']) && !empty($_POST['ville']) &&!empty($_POST['indicatif']) && !empty($_POST['telephone'])
      && !empty($_POST['signe_pays']) &&!empty($_POST['numero']) && !empty($_POST['statut']) && !empty($_POST['age']) && !empty($_POST['niveau'])
       && !empty($_POST['domaine_etude']) && !empty($_POST['date_obtention']) && !empty($_POST['autre_diplome']) && !empty($_POST['domaine_emploi']) && !empty($_POST['experience'])
        && !empty($_POST['langue_francais']) && !empty($_POST['langue_anglais']) && !empty($_POST['visite_canada']) && !empty($_POST['famille_canada']) && !empty($_POST['offre_canada']) && !empty($_POST['connu_vision']))
    {
        $titre=$_POST['titre'];
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $nationalite=$_POST['nationalite'];
        $pays=$_POST['pays'];
        $ville=$_POST['ville'];
        $indicatif=$_POST['indicatif'];
        $telephone=$_POST['telephone'];
        $signe_pays=$_POST['signe_pays'];
        $numero=$_POST['numero'];
        $statut=$_POST['statut'];
        $age=$_POST['age'];
        $niveau=$_POST['niveau'];
        $domaine_etude=$_POST['domaine_etude'];
        $date_obtention=$_POST['date_obtention'];
        $autre_diplome=$_POST['autre_diplome'];
        $domaine_emploi=$_POST['domaine_emploi'];
        $experience=$_POST['experience'];
        $langue_francais=$_POST['langue_francais'];
        $langue_anglais=$_POST['langue_anglais'];
        $visite_canada=$_POST['visite_canada'];
        $famille_canada=$_POST['famille_canada'];
        $conjoint_prenom=$_POST['conjoint_prenom'];
        $conjoint_nom=$_POST['conjoint_nom'];
        $niveau_conjoint=$_POST['niveau_conjoint'];
        $domaine_etude_conjoint=$_POST['domaine_etude_conjoint'];
        $date_obtention_diplome=$_POST['date_obtention_diplome'];
        $emplois_conjoint=$_POST['emplois_conjoint'];
        $domaine_emplois_conjoint=$_POST['domaine_emplois_conjoint'];
        $age_conjoint=$_POST['age_conjoint'];
        $langue_francais_conjoint=$_POST['langue_francais_conjoint'];
        $langue_anglais_conjoint=$_POST['langue_anglais_conjoint'];
        $nombre_enfant_moins_quatre=$_POST['nombre_enfant_moins_quatre'];
        $nombre_enfant_moins_vingt=$_POST['nombre_enfant_moins_vingt'];
        $offre_canada=$_POST['offre_canada'];
        $connu_vision=$_POST['connu_vision'];

        //Si l'utilisateur existe
        $sql="SELECT * FROM registers WHERE email=?";
        $statement=$db->prepare($sql);
        $statement->execute(array($email));
        $find=$statement->fetch();
        $exist=$statement->rowCount();

        if($exist==1)
        {
            $error="ok";
        }
        else{
            $query=$db->prepare("INSERT INTO registers(titre,prenom,nom,email,nationalite,pays,ville,indicatif,telephone,signe_pays,numero,statut,age,niveau,domaine_etude,date_obtention,autre_diplome,domaine_emploi,experience,langue_francais,langue_anglais,visite_canada,famille_canada,conjoint_prenom,conjoint_nom,niveau_conjoint,domaine_etude_conjoint,date_obtention_diplome,emplois_conjoint,domaine_emplois_conjoint,age_conjoint,langue_francais_conjoint,langue_anglais_conjoint,nombre_enfant_moins_quatre,nombre_enfant_moins_vingt,offre_canada,connu_vision) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $query->execute(array($titre,$prenom,$nom,$email,$nationalite,$pays,$ville,$indicatif,$telephone,$signe_pays,$numero,$statut,$age,$niveau,$domaine_etude,$date_obtention,$autre_diplome,$domaine_emploi,$experience,$langue_francais,$langue_anglais,$visite_canada,$famille_canada,$conjoint_prenom,$conjoint_nom,$niveau_conjoint,$domaine_emplois_conjoint,$date_obtention_diplome,$emplois_conjoint,$domaine_emplois_conjoint,$age_conjoint,$langue_francais_conjoint,$langue_anglais_conjoint,$nombre_enfant_moins_quatre,$nombre_enfant_moins_vingt,$offre_canada,$connu_vision));
            $success='0k';
            try{
                $mail->SMTPDebug =SMTP::DEBUG_OFF;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host= 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'noesabib@gmail.com';                     //SMTP username
                $mail->Password   = 'xytorkvorotrvbvl';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port= 587;



                            //Recipients
                $mail->setFrom('noesabib@gmail.com', 'noesabib@gmail.com');
                $mail->addAddress('imicanada509@gmail.com','imicanada509@gmail.com');     //Add a recipient
             
                $mail->addReplyTo('imicanada509@gmail.com', 'Information');
                
                $mail->isHTML(true);
                //Set email format to HTML
                $mail->Subject = 'Demande de Contrat de travail au Canada de la part de Mr/Mme'.$nom.''.$prenom;
                $mail->Body    ='Informations du candidat:<br>Nom de Famille:'.$nom.'<br>Prénom:'.$prenom.'<br>Email'.$email.'<br>Téléphone:'.$telephone.'<br>Pays:'.$pays;
                
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
               




            }catch(Exception $e){

            }
            
        }

        

        
        
        


    }
    else
    {
        $error="ok";
    }


}



//try {
    //Server settings
                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    
    //Content

    
        

   

    
    


    




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, ">
    <link rel="stylesheet" href="projetform.css"> 
    <title> </title>
</head>  
<body>  
        <img src="header.jpg" alt="" style="width:500px; margin-left:360px; height:400px">

   <h1 style="margin-left:150px;
    color:bisque;"> ENTREE EXPRESS CANADA   </h1>
   <!-- <div>
        
     
   </div >  -->
    <form action="" method="POST">  
               
                    <div>
                            <label for=""> Titre * </label>
                            <select name="titre" id="s1" >
                                        <option value=""> Please Select</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mme">Mme</option>
                            </select> 
                    </div >
                    <div id="div1">
                        <div> 
                                <p> Nom complet *  </p>
                                <input type="text"  name="prenom" id="i1"> <br>
                                <label for="">prénom</label> 
    
                        </div > 
                        
                        <div id="div11">  
                            <input type="text"   name="nom" id="i2"> <br>
                            <label for="" id="">Nom de famille</label>
    
                        </div > 
                    </div> 
                    <br>
                    <div>
                            <label for=""> E-mail * </label> <br>
                            <input type="email" value=""  name="email" placeholder="exemple@yahoo.fr" id="i3">
    
                    </div ><br> 
                </div > <br> 
                <div>
                    <label for=""> Votre nationalité * </label>  
                    <select name="nationalite" id="ss" >
                    <option value=""> Please Select</option>
                    <option value="Togolais">Togolais</option>
                    <option value="Français">Français</option>
                    <option value="Canadien">Canada</option>
                    <option value="Béninois">Béninois</option>

                    </select> 

                </div >  
            <br>
            <div>
                    <label for=""> Pays de residence * </label>  <br> 
                    <select name="pays" id="ssa" >
                    <option value=""> Please Select</option>
                    <option value="France">France</option>
                    <option value="Bénin">Bénin </option>
                    <option value="Togo">Togo </option>
                    <option value="Canada">Canada</option>
                    </select> 

            </div ><br>
            
                <div>
                        <label for=""> Ville * </label> <br>
                        <input type="text" value=""  name="ville" id="iville">

                </div >      
                <div div="div111"> 
                        <p> Numéro de Tel *</p>
                    <div >
                        <input type="text" value=""  name="indicatif" id="indic"> <br> 
                        <label for=""> indicatif pays </label>

                    </div >
                    <div id="num"> 
                        <input type="tel" value=""  name="telephone" id="number"> <br> 
                        <label for="">Numéro de téléphone</label> 

                    </div >
                </div >   
                <p> Autre No de Tel *</p>
                <div id="div111"> 
                        
                    <div>
                        <input type="text" value=""  name="signe_pays" id="indic">  <br> 
                        <label for=""> indicatif pays </label>

                    </div >
                    <div id="num2">
                        <input type="tel" value=""  name="numero" id="number">  <br> 
                        <label for="">Numéro de téléphone</label> 

                    </div >
                </div >    <br> 
                <div>
                        <label for=""> Statut Matrimonial * </label>  <br> 
                        <select name="statut" id="ssb" >
                        <option value=""> Please Select</option>
                        <option value="Célibataire">Célibataire</option>
                        <option value="Conjoint"> Conjoint(e) de fait (+de 12 mois de vie commune)</option>
                        <option value="Marié">Marié(e)</option>
                        </select> 
                        {!! $errors->first('statut','<span class="error">:message</span>') !!}

                </div >  <br>
                <div>
                        <label for=""> Vôtre Age* </label> <br>
                        <select name="age" id="ssc" >
                        <option value=""> Please Select</option>
                        <option value="Moins de 16 ans">Moins de 16 ans </option>
                        <option value="16 ans ">16 ans </option>
                        <option value="17 ans ">17 ans </option>
                        <option value="18 ans ">18 ans </option>
                        <option value="19 ans ">19 ans </option>
                        <option value="20 ans ">20 ans </option>
                        <option value=" ">  </option> 
                        <option value="21 ans ">21 ans </option>
                        <option value="22 ans ">22 ans </option>
                        <option value="23 ans ">23 ans </option>
                        <option value="24 ans ">24 ans </option>
                        <option value="25 ans ">25 ans </option>
                        <option value="26 ans ">26 ans </option>
                        <option value="27 ans ">28 ans </option>
                        <option value="29 ans ">29 ans </option>
                        <option value="30 ans ">30 ans </option>
                        <option value="31 ans ">31 ans </option>
                        <option value="32 ans ">32 ans </option>
                        <option value="33 ans ">33 ans </option>
                        <option value="34 ans ">34 ans </option> 
                        <option value="35 ans ">35 ans </option>
                        <option value="36 ans ">36 ans </option> 
                        <option value="37 ans ">37 ans </option>
                        <option value="38 ans ">39 ans </option>
                        <option value="40 ans ">40 ans </option>
                        <option value="41 ans ">41 ans </option>
                        <option value="42 ans ">42 ans </option>
                        <option value="44 ans ">43 ans </option>
                        <option value="45 ans ">45 ans </option>
                        <option value="46 ans ">46 ans </option>
                        <option value="47 ans ">47 ans </option>
                        <option value="48 ans ">48 ans </option>
                        <option value="49 ans ">49 ans </option>
                        <option value="50 ans ">50 ans </option>
                        <option value="41 ans ">Plus de 50 ans </option>
                        <option value="51 ans ">51 ans </option>
                        <option value="52 ans ">52 ans </option>
                        <option value="53 ans ">53 ans </option>
                        <option value="54 ans ">54 ans </option>
                        <option value="55 ans ">55 ans </option>
                        <option value="56 ans ">56 ans </option>
                        <option value="57 ans ">57 ans </option>
                        <option value="58 ans ">58 ans </option>
                        <option value="59 ans ">59 ans </option>
                        <option value="60 ans ">60 ans </option>
                        <option value="+ de 60 ans ">+ de 60 ans </option>
                        
                        </select> 

                </div > 
                <div>

                    <h3> Etude et Expérience professionelle  </h3> 
                    <div>
                        <label for=""> Niveau d'études * </label> <br>
                        <select name="niveau" id="ssd" >
                            <option value=""> Please Select</option>
                            <option value="Niveau inferieur au BAC ">Niveau inferieur au BAC </option>
                            <option value="Baccaluaréat de l'ensignement secondaire">Baccaluaréat de l'ensignement secondaire  </option>
                            <option value="Diplôme d'infimier(ère)adjointe / Certificate of assistant nurse"> Diplôme d'infimier(ère)adjointe / Certificate of assistant nurse </option>
                            <option value=" Certificat d'aptitude à la profession d'instituteurde l'ensignement technique- CAPIET"> Certificat d'aptitude à la profession d'instituteurde l'ensignement technique- CAPIET </option>
                            <option value="Diplôme de maitre d'education physique et sportive"> Diplôme de maitre d'education physique et sportive</option>
                            <option value="Brevet professionnel "> Brevet professionnel </option>
                            <option value="Certificat de capacité"> Certificat de capacité </option>
                            <option value="Diplome de bachelier technicien "> Diplome de bachelier technicien </option>
                            <option value="Baccaluaréat de l'enseignement technique et professionnel "> Baccaluaréat de l'enseignement technique et professionnel </option>
                            <option value="Diplome de technicien de laboratoire "> Diplome de technicien de laboratoire </option>
                            <option value="Diplome de telecommunication "> Diplome de telecommunication </option>
                            <option value="Etudes universitaires 1 an - Complété "> Etudes universitaires 1 an - Complété</option>
                            <option value=" Etudes universitaires 2 ans"> Etudes universitaires 2 ans </option>
                            <option value="BTS"> BTS </option>
                            <option value="DUT "> DUT</option>
                            <option value="DEUG"> DEUG </option>
                            <option value=" Licence/Bachelor"> Licence/Bachelor </option>
                            <option value="Master 1"> Master 1 </option>
                            <option value="Maîtrise / Master 2 "> Maîtrise / Master 2</option>
                            <option value="Diplôme d'ingénieur "> Diplôme d'ingénieur </option>
                            <option value="Diplôme d'études superieures de commerce  "> Diplôme d'études superieures de commerce </option>
                            <option value="Diplôme d'études supérieures spécialisées-DESS "> Diplôme d'études supérieures spécialisées-DESS </option>
                            <option value="DOCTORAT "> DOCTORAT </option>
                            <option value="Diplôme de technicien/ne Medicaux Sanitaire "> Diplôme de technicien/ne Medicaux Sanitaire </option>
                            <option value="Diplôme de professeur de collège  "> Diplôme de professeur de collège </option>
                            <option value="Diplôme de professeur d'enseignement secondaire 1er Grade "> Diplôme de professeur d'enseignement secondaire 1er Grade </option>
                            <option value="Diplôme d'études superieures de commerce "> Diplôme d'études superieures de commerce </option>
                            
                            <option value="Diplôme de professeur d'enseignement secondaire de 2e Grade "> Diplôme de professeur d'enseignement secondaire de 2e Grade  </option>
                            
                            <option value="Diplôme de professeur d'enseignement technique 1er Grade "> Diplôme de professeur d'enseignement technique 1er Grade </option>
                            
                            <option value="Diplôme de professeur d'enseignement technique 2e Grade "> Diplôme de professeur d'enseignement technique 2e Grade </option>
                        
                        </select>

                    </div >   <br>
                    <div>
                        <label for=""> Domaine d'études * </label>  <br>
                        <input type="text" value=""  name="domaine_etude" placeholder="ex:Biochimie" id="domaine"> 

                    </div >   <br>
                    <div>
                        <label for=""> Date d'obtention du diplôme * </label> <br>
                        <select name="date_obtention" id="sse" >
                            <option value=""> Please Select</option>
                            <option value="Moins de 5ans">Moins de 5ans </option>
                            <option value="Plus de cinq ans">Plus de cinq ans </option>
                        </select> 

                    </div >   <br>
                    <div>
                        <label for=""> Avez-vous un autre diplôme? Si oui Veuillez préciser </label> <br>
                        <input type="text" value=""  name="autre_diplome" id="dip">


                    </div >  <br>
                    <div>
                        <label for=""> Domaine de l'emploi *</label> <br>
                        <input type="text" value=""  name="domaine_emploi" placeholder="ex: Assurances" id="dom">

                    </div > <br>
                    <div>        
                        <label for="" id="laa"> Experience de travail *</label>  <br>
                        <select name="experience" id="ssh" >
                            <option value="">Please Select </option>
                            <option value="Aucune Connaissances">Aucune Connaissance </option>
                            <option value="Débutant">Débutant </option>
                            <option value="Intermediare"> Intermédiaire</option>
                            <option value="Avancé">Avancé</option>
                        </select>

                </div >
                <div>
                    <h1> Connaissances linguistiques  </h1>
                    <div>        
                                <label for="" id="laa"> Français *</label>   
                                <select name="langue_francais" id="ssf" >
                                    <option value=""> Please Select</option>
                                    <option value="Aucune Connaissances">Aucune Connaissances </option>
                                    <option value="Débutant">Débutant </option>
                                    <option value="Intermediare">IntermediaIre </option>
                                    <option value="Avancé">Avancé </option>
                                </select>

                    </div > 
                    <div>
                                    <label for="" id="lab" > Anglais *</label> <br>
                                    <select name="langue_anglais" id="ssg" >
                                        <option value=""> Please Select</option>
                                        <option value="Aucune Connaissances">Aucune Connaissances </option>
                                        <option value="Débutant">Débutant </option>
                                        <option value="Intermediare">IntermediaIre </option>
                                        <option value="Avancé">Avancé </option>
                                    </select> 

                    </div >   <br>
                    <div> 
                            <label for=""> Avez-vous visité le canada dans le passé </label>  <br>
                                    <select name="visite_canada" id="ssi" >
                                        <option value=""> Please Select</option>
                                        <option value="Non, jamais visité le canada ">Non, jamais visité le canada  </option>
                                        <option value="Oui, pour Travail/Etudes 6mois ou +">Oui, pour Travail/Etudes 6mois ou + </option>
                                        <option value="Oui, pour Travail/Etudes 3 à 6mois">Oui, pour Travail/Etudes 3 à 6mois  </option>
                                        <option value="Oui, PVT 3 mois ou +">Oui, PVT 3 mois ou + </option>
                                        <option value="Oui, Autres Sejours de 2 à 12 semaines">Oui, Autres Sejours de 2 à 12 semaines </option>

                                    </select>    <br>

                            <label for=""> Avez-vous de la famille au Canada? </label> <br>
                                    <select name="famille_canada" id="ssj" >
                                        <option value=""> Please Select</option>
                                        <option value="Non, aucune famille">Non, aucune famille </option>
                                        <option value="Oui, un Epoux/Conjoint de fait">Oui, un Epoux/Conjoint de fait </option>
                                        <option value="Oui, Fils/Fille">Oui, Fils/Fille </option>
                                        <option value="Oui, Frère/Soeur">Oui, Frère/Soeur</option>
                                        <option value="Oui, père/mère">Oui, père/mère</option>
                                        <option value="Oui, Grand père/ Grand mère">Oui, Grand père/ Grand mère</option>

                                    </select>  

                    
                    </div > 
                </div > 
                <h3> Informations du conjoint  <br> (A remplir Seulement s'il y a eu lieu) </h3> 
                <div>  
                            <p> Nom du conjoint *  </p>
                            <div id="div1">
                                   <div> 
                                        <input type="text" value=""  name="conjoint_prenom" id="i1"> <br>
                                        <label for="">prénom</label> 

                                    </div > 
                                    
                                    <div id="div112">  
                                        <input type="text" value=""  name="conjoint_nom" id="i4"> <br>
                                        <label for="" id="nom">Nom de famille</label>

                                    </div > 
                                    
                            </div >  <br>
                            <div>
                                <label for=""> Niveau d'etude du conjoint </label> <br>
                                <select name="niveau_conjoint" id="sso" >
                                    <option value=""> Please Select</option>
                                    <option value="Niveau inferieur au BAC ">Niveau inferieur au BAC </option>
                                    <option value="Baccaluaréat de l'ensignement secondaire">Baccaluaréat de l'ensignement secondaire  </option>
                                    <option value="Diplôme d'infimier(ère)adjointe / Certificate of assistant nurse"> Diplôme d'infimier(ère)adjointe / Certificate of assistant nurse </option>
                                    <option value=" Certificat d'aptitude à la profession d'instituteurde l'ensignement technique- CAPIET"> Certificat d'aptitude à la profession d'instituteurde l'ensignement technique- CAPIET </option>
                                    <option value="Diplôme de maitre d'education physique et sportive"> Diplôme de maitre d'education physique et sportive</option>
                                    <option value="Brevet professionnel "> Brevet professionnel </option>
                                    <option value="Certificat de capacité"> Certificat de capacité </option>
                                    <option value="Diplome de bachelier technicien "> Diplome de bachelier technicien </option>
                                    <option value="Baccaluaréat de l'enseignement technique et professionnel "> Baccaluaréat de l'enseignement technique et professionnel </option>
                                    <option value="Diplome de technicien de laboratoire "> Diplome de technicien de laboratoire </option>
                                    <option value="Diplome de telecommunication "> Diplome de telecommunication </option>
                                    <option value="Etudes universitaires 1 an - Complété "> Etudes universitaires 1 an - Complété</option>
                                    <option value=" Etudes universitaires 2 ans"> Etudes universitaires 2 ans </option>
                                    <option value="BTS"> BTS </option>
                                    <option value="DUT "> DUT</option>
                                    <option value="DEUG"> DEUG </option>
                                    <option value=" Licence/Bachelor"> Licence/Bachelor </option>
                                    <option value="Master 1"> Master 1 </option>
                                    <option value="Maîtrise / Master 2 "> Maîtrise / Master 2</option>
                                    <option value="Diplôme d'ingénieur "> Diplôme d'ingénieur </option>
                                    <option value="Diplôme d'études superieures de commerce  "> Diplôme d'études superieures de commerce </option>
                                    <option value="Diplôme d'études supérieures spécialisées-DESS "> Diplôme d'études supérieures spécialisées-DESS </option>
                                    <option value="DOCTORAT "> DOCTORAT </option>
                                    <option value="Diplôme de technicien/ne Medicaux Sanitaire "> Diplôme de technicien/ne Medicaux Sanitaire </option>
                                    <option value="Diplôme de professeur de collège  "> Diplôme de professeur de collège </option>
                                    <option value="Diplôme de professeur d'enseignement secondaire 1er Grade "> Diplôme de professeur d'enseignement secondaire 1er Grade </option>
                                    <option value="Diplôme d'études superieures de commerce "> Diplôme d'études superieures de commerce </option>
                                    
                                    <option value="Diplôme de professeur d'enseignement secondaire de 2e Grade "> Diplôme de professeur d'enseignement secondaire de 2e Grade  </option>
                                    
                                    <option value="Diplôme de professeur d'enseignement technique 1er Grade "> Diplôme de professeur d'enseignement technique 1er Grade </option>
                                    
                                    <option value="Diplôme de professeur d'enseignement technique 2e Grade "> Diplôme de professeur d'enseignement technique 2e Grade </option>
                                
                                </select> <br> <br>

                            </div>
                            

                           <div>
                            <label for=""> Domaine d'études * </label> <br>
                            <input type="text" value=""  name="domaine_etude_conjoint" placeholder="ex:Informatique" id="ing"> 

                           </div>
                            <div> <br>
                                <label for=""> Date d'obtention du diplôme (s'il y a eu lieu)</label> <br>
                                <select name="date_obtention_diplome" id="ssk" >
                                    <option value=""> Please Select</option>
                                    <option value="Moins de 5 ans">Moins de 5ans </option>
                                    <option value="Plus de cinq ans">Plus de cinq ans </option>
                                </select> 

                            </div > <br>
                            <div>
                                <label for=""> Emploi (Conjoint) dans les 10 dernières années </label> <br>
                                <select name="emplois_conjoint"  id="ssp" >
                                    <option value=""> Please Select</option>
                                    <option value="Moins de 6 mois ">Moins de 6 mois  </option>
                                    <option value="6 mois à 11 mois">6 mois à 11 mois  </option>
                                    <option value="12 mois à 23 mois ">12 mois à 23 mois  </option>
                                    <option value="24 mois à 35 mois">24 mois à 35 mois  </option>
                                    <option value="36 mois à 47 mois ">36 mois à 47 mois  </option>
                                    <option value="plus de 48 mois ">plus de 48 mois  </option>
                                </select>  

                            </div >  <br>
                            <div>
                                <label for=""> Domaine de l'emploi du conjoint * </label> <br>
                                <input type="text" value=""  name="domaine_emplois_conjoint" placeholder="ex:finances" id="inga"> 
                                
                            </div >  <br>
                            <div>
                                <label for=""> Age de votre conjoint * </label> <br>
                                <select name="age_conjoint"  id="ssm" >
                                        <option value=""> Please Select</option>
                                        <option value="Moins de 16 ans">Moins de 16 ans </option>
                                        <option value="16 ans ">16 ans </option>
                                        <option value="17 ans ">17 ans </option>
                                        <option value="18 ans ">18 ans </option>
                                        <option value="19 ans ">19 ans </option>
                                        <option value="20 ans ">20 ans </option>
                                        <option value="21 ans ">21 ans </option>
                                        <option value="22 ans ">22 ans </option>
                                        <option value="23 ans ">23 ans </option>
                                        <option value="24 ans ">24 ans </option>
                                        <option value="25 ans ">25 ans </option>
                                        <option value="26 ans ">26 ans </option>
                                        <option value="27 ans ">28 ans </option>
                                        <option value="29 ans ">29 ans </option>
                                        <option value="29 ans ">29 ans </option>
                                        <option value="30 ans ">30 ans </option>
                                        <option value="31 ans ">31 ans </option>
                                        <option value="32 ans ">32 ans </option>
                                        <option value="33 ans ">33 ans </option>
                                        <option value="34 ans ">34 ans </option> 
                                        <option value="35 ans ">35 ans </option>
                                        <option value="36 ans ">36 ans </option> 
                                        <option value="37 ans ">37 ans </option>
                                        <option value="38 ans ">39 ans </option>
                                        <option value="40 ans ">40 ans </option>
                                        <option value="41 ans ">41 ans </option>
                                        <option value="42 ans ">42 ans </option>
                                        <option value="44 ans ">43 ans </option>
                                        <option value="45 ans ">45 ans </option>
                                        <option value="46 ans ">46 ans </option>
                                        <option value="47 ans ">47 ans </option>
                                        <option value="48 ans ">48 ans </option>
                                        <option value="49 ans ">49 ans </option>
                                        <option value="50 ans ">50 ans </option>
                                        <option value="Plus de 50 ans ">Plus de 50 ans </option>
                                        <option value="51 ans ">51 ans </option>
                                        <option value="52 ans ">52 ans </option>
                                        <option value="53 ans ">53 ans </option>
                                        <option value="54 ans ">54 ans </option>
                                        <option value="55 ans ">55 ans </option>
                                        <option value="56 ans ">56 ans </option>
                                        <option value="57 ans ">57 ans </option>
                                        <option value="58 ans ">58 ans </option>
                                        <option value="59 ans ">59 ans </option>
                                        <option value="60 ans ">60 ans </option>
                                </select>


                            </div > 
                      
                </div >  
                <div>
                    <h3> Niveau de langue du conjoint <br> (s'il y a eu lieu) </h3> 

                    <div>        
                                <label for="" id="laa"> Français *</label>  
                                <select name="langue_francais_conjoint" id="ssf" >
                                    <option value=""> Please Select</option>
                                    <option value="Aucune Connaissances">Aucune Connaissances </option>
                                    <option value="Débutant">Débutant </option>
                                    <option value="Intermediare">IntermediaIre </option>
                                    <option value="Avancé">Avancé </option>
                                </select>  
                    </div > 
                    <div>
                                    <label for="" id="lab" > Anglais *</label> <br>
                                    <select name="langue_anglais_conjoint" id="ssg" >
                                        <option value=""> Please Select</option>
                                        <option value="Aucune Connaissances">Aucune Connaissances </option>
                                        <option value="Débutant">Débutant </option>
                                        <option value="Intermediare">IntermediaIre </option>
                                        <option value="Avancé">Avancé </option>
                                    </select>  
                    </div >
                
                </div >
                <div>
            
                    <h3> Avez-vous des enfants ?  </h3> 
                    <label for=""> Nombre d'enfant de moins de 13 ans  *</label> <br>
                    <select name="nombre_enfant_moins_quatre" id="sss" >
                                    <option value=""> Please Select</option> 
                                    <option value="Aucun"> Aucun </option>
                                    <option value="1">1 </option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                    </select>  <br> <br>
                    <label for=""> Nombre d'enfant de moins de 13 ans à 21 ans  *</label> <br>
                    <select name="nombre_enfant_moins_vingt" id="ssq" >
                                    <option value=""> Please Select</option>
                                    <option value="Aucun"> Aucun </option>
                                    <option value="1">1 </option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="plus de 4">plus de 4</option>
                    </select>  
                </div > 
                <div> 
                    <h3> Avez-vous déjà une offre d'emploi au canada  ?  </h3> 
                    <input type="checkbox" name="offre_canada" value="Oui" >
                    <label for="">  Oui </label>  <br>
                    <input type="checkbox" value="Non"  name="offre_canada" >
                    <label for="">  Non </label> 
            
                </div > 
                <div> 
                    <h3> Comment vous avez connu Vision Canada ?  * </h3> 
                    <select name="connu_vision" id="sst" >
                                    <option value=""> Please Select</option>
                                    <option value="Google"> Google </option>
                                    <option value=""> </option>
                                    <option value="Direct du consultant">Direct du consultant </option>
                                    <option value=""> </option>
                                    <option value="Njugush Ambassadeur"> Njugush Ambassadeur</option>
                                    <option value=""> </option>
                                    <option value="Herman Amisi Ambassadeur"> Herman Amisi Ambassadeur</option>
                                    <option value=""> </option>
                                    <option value="Chambre à louer">Chambre à louer Ambassadeur</option>
                                    <option value=""> </option>
                                    <option value="Facebook">Facebook</option>
                                    <option value=""> </option>
                                    <option value="Amis ou Famille">Amis ou Famille</option>
                                    <option value=""> </option>
                                    
                    </select>  
            
                </div >   <br>

             </div >  
                
                    <input type="submit" value="Evaluer"  name="envoyer" id="submit" >
                    
               

     </form> 

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($success)):?>
        <script>
        Swal.fire(
        'Félicitation!',
        'Votre demande de contrat a été envoyé avec succès!',
        'success'
        )
        </script>
    <?php else:?>
    

    <?php endif?>
       
    <?php if(isset($error)):?>
        <script>
            Swal.fire({
            icon: 'error',
            title: 'Oops,Désolé...',
            text: 'Vous avez laissé un champs vide',
            
            })
        </script>
    <?php else:?>
    

    <?php endif?>
    </body>
</html> 
  
  