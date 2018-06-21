<?php
print_r($_SESSION['aktGPXname']);
echo $_SESSION['aktGPXn']['Distanz'];
?>
<main id="content">
    <article class="contFormular">
        <div class="formular">
            <select id="sportart" class="drp" name="sportart" onchange="showUpload()">
                <option  value="0" selected="selected">Sportart auswählen</option>
                <option value="1">Oreintierungslauf</option>
                <option value="2">Dauerlauf</option>
                <option value="3">Andere Aktivität</option>
            </select>
            <form id="sportat-ol" class="backgrundGrayTransparent">
                <div id="karte">
                    <p>Karte:</p>
                    <input type="text" name='nameK' class='inp' placeholder="Name" required>
                    <input type="text" name='ort' class='inp' placeholder="Ort" required>
                    <input type="text" name='stand' class='inp' placeholder="Stand" required>
                    <input type="text" name='stand' class='inp' placeholder="Massstab" required>
                    <select class="drp" id="gGr" name="Gelaende_grob" >
                        <option  value="0" selected="selected">Gelände grob</option>
                        <option value="1">technisch anspruchsvoll</option>
                        <option value="2">Urban</option>
                        <option value="3">Blocherwald</option>
                        <option value="4">Park</option>
                    </select>
                    <select class="drp" id="gFe" name="Gelaende_fein" >
                        <option  value="0" selected="selected">Gelaende fein</option>
                        <option value="1">Jura</option>
                        <option value="2">Alpin</option>
                        <option value="3">Mittelland</option>
                    </select>
                    <input type="text" name='stand' class='inp' placeholder="Ordner" >
                </div>
                <div id="ol">
                    <p>OL:</p>
                    <select class="drp" id="dekl" name="deklaration" >
                        <option  value="0" selected="selected">Deklaration</option>
                        <option value="1">Training</option>
                        <option value="2">Regionaler OL</option>
                        <option value="3">Nationaler OL</option>
                        <option value="4">Internationaler OL</option>
                    </select>
                    <select class="drp" id="disz" name="disziplin" >
                        <option  value="0" selected="selected">Disziplin</option>
                        <option value="1">Langdistanz</option>
                        <option value="2">Normaldistanz</option>
                        <option value="3">Mitteldistanz</option>
                        <option value="4">Sprint</option>
                        <option value="5">Staffel</option>
                        <option value="6">Nacht-OL</option>
                    </select>
                    <?php if(!isset($_SESSION['aktGPXn']['Distanz'])){?>
                        <input type="text" name='distanz' class='inp' placeholder="Distanz in KM"  required>
                    <?php } ?>
                    <?php if(!isset($_SESSION['aktGPXn']['time'])){?>
                    <input type="text" name='dauer' class='inp' placeholder="Dauer in Min" required>
                    <?php } ?>
                    <?php if(!isset($_SESSION['aktGPXn']['Datum'])){?>
                    <input type="text" name='datum' class='inp' placeholder="Datum: 2001-07-11" required>
                    <?php } ?>

                </div><div class="btn">
                    <input type="submit" class="button btnsave" value="Speichern"></inut>
                </div>
            </form>
            <form id="sportat-dl" class="backgrundGrayTransparent">
                <div id="karte">
                    <p>Dauerlauf:</p>
                    <input type="text" name='nameK' class='inp' placeholder="Name" required>
                    <select class="drp" id="gGr" name="Gelaende_grob" >
                        <option  value="0" selected="selected">Form</option>
                        <option value="1">Intervall</option>
                        <option value="2">schneller DL</option>
                        <option value="3">mittlerer DL</option>
                        <option value="4">langsamer DL</option>
                        <option value="5">Footing</option>
                    </select>
                    <?php if(!isset($_SESSION['aktGPXn']['Distanz'])){?>
                        <input type="text" name='distanz' class='inp' placeholder="Distanz in KM"  required>
                    <?php } ?>
                    <?php if(!isset($_SESSION['aktGPXn']['time'])){?>
                        <input type="text" name='dauer' class='inp' placeholder="Dauer in Min" required>
                    <?php } ?>
                    <?php if(!isset($_SESSION['aktGPXn']['Datum'])){?>
                        <input type="date" name='datum' class='inp' placeholder="Datum: 2001-07-11" required>
                    <?php } ?>
                </div>
                <div class="btn">
                    <input type="submit" class="button btnsave" value="Speichern"></inut>
                </div>
            </form>
            <form id="sportat-anders" class="backgrundGrayTransparent">
                <div id="karte">
                    <p>Andere Aktivität:</p>
                    <input type="text" name='nameK' class='inp' placeholder="Name" required>
                    <select class="drp" id="gGr" name="Gelaende_grob" >
                        <option  value="0" selected="selected">Intensität</option>
                        <option value="1">regenerativ</option>
                        <option value="2">extensiv</option>
                        <option value="3">mittel</option>
                        <option value="4">intensiv</option>
                        <option value="5">überschwellig</option>
                    </select>
                    <?php if(!isset($_SESSION['aktGPXn']['Distanz'])){?>
                        <input type="text" name='distanz' class='inp' placeholder="Distanz in KM"  required>
                    <?php } ?>
                    <?php if(!isset($_SESSION['aktGPXn']['time'])){?>
                        <input type="text" name='dauer' class='inp' placeholder="Dauer in Min" required>
                    <?php } ?>
                    <?php if(!isset($_SESSION['aktGPXn']['Datum'])){?>
                        <input type="date" name='datum' class='inp' placeholder="Datum: 2001-07-11" required>
                    <?php } ?>
                </div>
                <div class="btn">
                    <input type="submit" class="button btnsave" value="Speichern"></inut>
                </div>
            </form>
        </div>
    </article>
</main>
