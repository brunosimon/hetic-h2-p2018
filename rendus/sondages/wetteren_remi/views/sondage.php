<?php
    $title = 'Psyc\'HETIC | Quel psychopathe êtes-vous ?';
?>
<section class="content" id="sondage">
    <div id="questionnaire">
        <div class="consignes">
            <h1>le test <span class="big">psychologique</span></h1>
            <h2>20 questions, un seul résultat</h2>
            <h2>Cliquez sur les <span class="big">mots clés</span> pour modifier l'histoire selon votre cas !</h2>
        </div>
    </div>
    <form name="sondage" action="resultats" method="post">
      <p class="question">Avant de raconter mon histoire, je tiens à préciser que je suis <span id="C0" onclick="ope('S0')">un homme</span>, oui c'est important ;) .</p>
         <ul id="S0" class="options">
              <li id="R01" onclick="slct(0,1)"> un homme</li>
              <li id="R02" onclick="slct(0,2)">un femme</li>
              <li id="R03" onclick="slct(0,3)">un extraterrestre</li>
              <li id="R04" onclick="slct(0,4)">un transexuel</li>
              <li id="R05" onclick="slct(0,5)">un eunuque</li>
          </ul><input name="Q0" type="number" value="1">
      
      
            <h5 class="partTitle">La <span class="big">routine</span></h5>
            <p class="question">Ce matin alors que je m'approvisionnais <span id="C1" onclick="ope('S1')">au supermarché</span>, je vis un petit papier indiquant qu'un chat avait été perdu..</p>
            <ul id="S1" class="options">
                <li id="R12" onclick="slct(1,2)">au supermarché</li>
                <li id="R13" onclick="slct(1,3)">à l'épicerie</li>
                <li id="R14" onclick="slct(1,4)">à l'armurerie</li>
                <li id="R11" onclick="slct(1,1)">au kiosque d'en face</li>
                <li id="R15" onclick="slct(1,5)">à la boucherie</li>
            </ul><input name="Q1" type="number" value="2">

            <p class="question">Je me suis alors dit que si je trouvais le chat 
            <span id="C2" onclick="ope('S2')">je l'adopterais</span>.</p>
            <ul id="S2" class="options">
                <li id="R22" onclick="slct(2,2)">je l'adopterais</li>
                <li id="R24" onclick="slct(2,4)">j'irai le vendre</li>
                <li id="R25" onclick="slct(2,5)">je le mangerai</li>
                <li id="R23" onclick="slct(2,3)">je le laisserais</li>
                <li id="R21" onclick="slct(2,1)">j'irai le rendre</li>
            </ul><input name="Q2" type="number" value="2">

            <p class="question">Le soir, des amis m'ont envoyé un message m'indiquant de les rejoindre  <span id="C3" onclick="ope('S3')">au cinéma</span>,  histoire de sortir un peu.</p>
            <ul id="S3" class="options">
                <li id="R31" onclick="slct(3,1)">au cinéma</li>
                <li id="R35" onclick="slct(3,5)">aux catacombes</li>
                <li id="R32" onclick="slct(3,2)">au restaurant</li>
                <li id="R33" onclick="slct(3,3)">au Macdo</li>
                <li id="R34" onclick="slct(3,4)">dans la rue</li>
            </ul><input name="Q3" type="number" value="1">
            
            <p class="question">Il est vrai que ces derniers temps j'ai tendance à errer sur le web à regarder  
                <span id="C4" onclick="ope('S4')">des tests de Psychopathes</span>, ça pouvait donc me changer les idées.</p>
            <ul id="S4" class="options">
                    <li id="R45" onclick="slct(4,5)">des tests de Psychopathes</li>
                    <li id="R44" onclick="slct(4,4)">des documentaires animaliers</li>
                    <li id="R43" onclick="slct(4,3)">des films por...euh rien</li>
                    <li id="R42" onclick="slct(4,2)">facebook</li>
                    <li id="R41" onclick="slct(4,1)">Youtube</li>
                </ul><input name="Q4" type="number" value="5">
            
            <p class="question">Mais c'était sans compter la situation d'urgence dans laquelle je me trouvais! En effet, j'ai du  <span id="C5" onclick="ope('S5')">aider</span>, un piéton qui s'était blessé alors que je venais de faire mes emplettes.</p>
            <ul id="S5" class="options">
                <li id="R51" onclick="slct(5,1)">aider</li>
                <li id="R52" onclick="slct(5,2)">cacher</li>
                <li id="R55" onclick="slct(5,5)">achever</li>
                <li id="R54" onclick="slct(5,4)">observer</li>
                <li id="R53" onclick="slct(5,3)">déplacer</li>
            </ul><input name="Q5" type="number" value="1">

            <p class="question">C'est  <span id="C6" onclick="ope('S6')">la première fois</span>, que ce genre d'événement m'arrive.</p>
            <ul id="S6" class="options">
                <li id="R61" onclick="slct(6,1)">la première fois</li>
                <li id="R62" onclick="slct(6,2)">la deuxième fois</li>
                <li id="R64" onclick="slct(6,4)">quotidiennement</li>
                <li id="R65" onclick="slct(6,5)">régulièrement</li>
                <li id="R63" onclick="slct(6,3)">rare</li>
            </ul><input name="Q6" type="number" value="1">

            <h5 class="partTitle">S'<span class="big">habiller</span></h5>
            <p class="question">Après ce petit passage émotionnel, je me suis rappelé que nous étions en période de solde, c'était donc pour moi le moment d'acheter  
            <span id="C7" onclick="ope('S7')">des Ray-Ban</span>, car je l'avais mis sur ma liste des choses à avoir impérativement.</p>
            <ul id="S7" class="options">
                <li id="R71" onclick="slct(7,1)">des Ray-Ban</li>
                <li id="R72" onclick="slct(7,2)">des slips Petit Bâteau</li>
                <li id="R73" onclick="slct(7,3)">des Klynex</li>
                <li id="R74" onclick="slct(7,4)">une montre Cartier</li>
                <li id="R75" onclick="slct(7,5)">une tronçonneuse pas chère</li>
            </ul><input name="Q7" type="number" value="1">

            <p class="question">De manière général je suis plutôt <span id="C8" onclick="ope('S8')">normal</span>, dans ma façon de m'habiller.</p>
            <ul id="S8" class="options">
                <li id="R81" onclick="slct(8,1)">normal</li>
                <li id="R82" onclick="slct(8,2)">coloré</li>
                <li id="R84" onclick="slct(8,4)">sombre</li>
                <li id="R85" onclick="slct(8,5)">nu</li>
                <li id="R83" onclick="slct(8,3)">classe</li>
            </ul><input name="Q8" type="number" value="1">
            
            <h5 class="partTitle">Le <span class="big">déménagement</span></h5>
            <p class="question">Le lendemain, un ami m'a demandé de l'aide pour l'aider à dégager de vieux meuble dans son appartement. Mon premier réflexe fut de casser le premier meuble  
                <span id="C9" onclick="ope('S9')">avec un marteau</span>, pour pouvoir les mettre dans la benne qui partait à la déchetterie.</p>
            <ul id="S9" class="options">
                <li id="R91" onclick="slct(9,1)">avec un marteau</li>
                <li id="R92" onclick="slct(9,3)">avec une hache</li>
                <li id="R94" onclick="slct(9,4)">avec une épée</li>
                <li id="R92" onclick="slct(9,2)">avec un coup de pied</li>
                <li id="R95" onclick="slct(9,5)">avec l'object lui même</li>
            </ul><input name="Q9" type="number" value="1">
            
            <p class="question">Certes, on a beau dire que je ne suis pas très manuel, de là à penser que j'allais déclencher un incendie dans son appart...! Je suis donc sortie puis je me suis souvenue de mon ami qui était dans l'appartement, j'ai dû donc  <span id="C10" onclick="ope('S10')">aller le sauver</span>.</p>
            <ul id="S10" class="options">
                <li id="R101" onclick="slct(10,1)">aller le sauver</li>
                <li id="R105" onclick="slct(10,5)">le regarder brûler</li>
                <li id="R102" onclick="slct(10,2)">appeler les pompier</li>
                <li id="R103" onclick="slct(10,3)">nettoyer mon manteau</li>
                <li id="R104" onclick="slct(10,4)">lui envoyer un snap</li>
            </ul><input name="Q10" type="number" value="1">
            
            <p class="question">Parmis les affaires qu'on avait dû jeter se trouvait un casque. Quand j'y repense, j'avais pris le casque pour pouvoir <span id="C11" onclick="ope('S11')">faire de la moto</span>, il faut juste que je prenne une journée histoire de faire ça bien.</p>
            <ul id="S11" class="options">
                <li id="R111" onclick="slct(11,1)">faire de la moto</li>
                <li id="R112" onclick="slct(11,2)">faire des travaux</li>
                <li id="R114" onclick="slct(11,4)">faire un crash test</li>
                <li id="R113" onclick="slct(11,3)">le casser</li>
                <li id="R115" onclick="slct(11,5)">me défouler sur les passants</li>
            </ul><input name="Q11" type="number" value="1">
                
            <h5 class="partTitle">à la <span class="big">plage</span></h5>
            <p class="question">Le week-end dernier je suis allé à la plage, superbe journée ! J'ai pu  <span id="C12" onclick="ope('S12')">aller me baigner</span>, toute la journée.</p>
            <ul id="S12" class="options">
                <li id="R123" onclick="slct(12,3)">aller me baigner</li>
                <li id="R122" onclick="slct(12,2)">jouer au freesbie</li>
                <li id="R124" onclick="slct(12,4)">regarder des gens nus</li>
                <li id="R125" onclick="slct(12,5)">enterrer des enfants</li>
                <li id="R121" onclick="slct(12,1)">manger des glaces</li>
            </ul><input name="Q12" type="number" value="3">
            
            <p class="question">Le soir après la plage, j'aime <span id="C13" onclick="ope('S13')">lire un livre</span>, et uniquement après, j'arrive à dormir.</p>
            <ul id="S13" class="options">
                <li id="R131" onclick="slct(13,1)">lire un livre</li>
                <li id="R132" onclick="slct(13,2)">pisser dans l'eau</li>
                <li id="R133" onclick="slct(13,3)">faire un feu de bois</li>
                <li id="R135" onclick="slct(13,5)">tuer quelqu'un</li>
                <li id="R134" onclick="slct(13,4)">sonner chez les gens</li>
            </ul><input name="Q13" type="number" value="1">
               
               <h5 class="partTitle">Mon <span class="big">Job</span></h5>
               <p class="question">D'habitude je ne parle jamais travail, mais je pense que je vais faire une exception. Dans la vie je suis  
                   <span id="C14" onclick="ope('S14')">postier</span>, c'est par passion que j'ai choisi ce métier.</p>
               <ul id="S14" class="options">
                   <li id="R141" onclick="slct(14,1)">postier</li>
                   <li id="R144" onclick="slct(14,4)">enseignant</li>
                   <li id="R142" onclick="slct(14,2)">un super héro</li>
                   <li id="R143" onclick="slct(14,3)">développeur Web</li>
                   <li id="R145" onclick="slct(14,5)">agent à la ANPE</li>
               </ul><input name="Q14" type="number" value="1">
                   
                <p class="question">C'est un job qui me prend beaucoup de temps mais je m'octroie une petit pause durant laquelle je 
                    <span id="C15" onclick="ope('S15')">taquine mes collègues</span>, ça fait du bien, ça détend.</p>
                <ul id="S15" class="options">
                        <li id="R152" onclick="slct(15,2)">taquine mes collègues</li>
                        <li id="R154" onclick="slct(15,4)">reniffle mon voisin</li>
                        <li id="R155" onclick="slct(15,5)">rédige des lettres de menaces</li>
                        <li id="R153" onclick="slct(15,3)">lèche la vitre</li>
                        <li id="R151" onclick="slct(15,1)">prend un café</li>
                    </ul><input name="Q15" type="number" value="1">
                <p class="question">Le soir je rentre chez moi en prenant le 
                    <span id="C16" onclick="ope('S16')">métro</span>, ça reste pour moi le moyen de transport le plus agréable.</p>
                    
                <ul id="S16" class="options">
                        <li id="R164" onclick="slct(16,4)">métro</li>
                        <li id="R162" onclick="slct(16,2)">taxis</li>
                        <li id="R165" onclick="slct(16,5)">tapis volant</li>
                        <li id="R161" onclick="slct(16,1)">vélo</li>
                        <li id="R163" onclick="slct(16,3)">bus</li>
                    </ul><input name="Q16" type="number" value="4">
                    
                    
                    <h5 class="partTitle">A l'<span class="big">école</span></h5>
                    <p class="question">Quand j'étais petits, on m'embettais souvent. Du coup j'essayais de ne pas me laisser faire et de temps en temps je  
                        <span id="C17" onclick="ope('S17')">pleurais un coup</span>, puis ensuite ça allait un peu mieux.</p>
                    <ul id="S17" class="options">
                            <li id="R171" onclick="slct(17,1)">pleurais un coup</li>
                            <li id="R174" onclick="slct(17,4)">leur cassais la gueule</li>
                            <li id="R175" onclick="slct(17,5)">chiait dans leur sac</li>
                            <li id="R172" onclick="slct(17,2)">leur disais que ça ne me faisait rien</li>
                            <li id="R173" onclick="slct(17,3)">le disais à la maîtresse</li>
                        </ul><input name="Q17" type="number" value="1">
                        
                    <p class="question">Il n'y avait pas que les autres ! Des fois j'avais l'impression que les profs s'acharnaient contre moi. Je me souviens qu'un jour on m'avait punis alors que j'avais juste  
                        <span id="C18" onclick="ope('S18')">renverser mon plat à la cantine</span>, comme quoi, on avait tendance à s'acharner sur moi pour un rien.</p>
                    <ul id="S18" class="options">
                            <li id="R181" onclick="slct(18,1)">renverser mon plat à la cantine</li>
                            <li id="R183" onclick="slct(18,3)">sonner l'alarme incendie</li>
                            <li id="R184" onclick="slct(18,4)">mis le feu à une voiture</li>
                            <li id="R182" onclick="slct(18,2)">falsifié mon bulletin</li>
                            <li id="R185" onclick="slct(18,5)">volé la tronçonneuse du gardien</li>
                        </ul><input name="Q18" type="number" value="1">
                        
                    <p class="question">De manière général j'en garde un bon souvenir, j'ai tout de même eu 20/20 au BAC en  
                        <span id="C19" onclick="ope('S19')">révisant la veille</span>, simple et efficace. C'était à la porté de tout le monde.</p>
                    <ul id="S19" class="options">
                            <li id="R191" onclick="slct(19,1)">révisant la veille</li>
                            <li id="R193" onclick="slct(19,3)">ayant payé le prof</li>
                            <li id="R192" onclick="slct(19,2)">trichant sur mon voisin</li>
                            <li id="R194" onclick="slct(19,4)">me mettant dans dans une équipe d'intellos</li>
                            <li id="R195" onclick="slct(19,5)">provoquant la mort d'un pote</li>
                        </ul><input name="Q19" type="number" value="1">
                        
                        <h5 class="partTitle"></h5>
                    <p class="question">Bon bah je vais devoir vous laisser, il me reste quelque truc à faire avant de retourner au travail, je dois  
                        <span id="C20" onclick="ope('S20')">retirer de l'argent</span>, sacré journée hein?.</p>
                    <ul id="S20" class="options">
                            <li id="R201" onclick="slct(20,1)">retirer de l'argent</li>
                            <li id="R202" onclick="slct(20,2)">enterrer mon voisin</li>
                            <li id="R203" onclick="slct(20,3)">faire mes devoirs</li>
                            <li id="R204" onclick="slct(20,4)">aller prier Satan</li>
                            <li id="R205" onclick="slct(20,5)">sacrifier une chèvre</li>
                        </ul><input name="Q20" type="number" value="1">
                        
                        <input name="LONG" type="text" value="1">
                        <input name="LAT" type="text" value="1">
                    
            <input type="submit" id="checking" value="Alors docteur, est-ce que c'est grave?">
    </form>
</section>
<div id="map-canvas"></div>
