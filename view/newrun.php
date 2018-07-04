<?php
//Wird angezeigt, wenn man ein Training ohne Termin erstellen will
if($_GET["termin"]=='false') {
    ?>
    <main id="content">
        <article class="contFormular">
            <div class="formular">
                <select id="sportart" class="drp" name="sportart" onchange="showUpload()">
                    <option value="0" selected="selected">Sportart auswählen</option>
                    <option value="1">Oreintierungslauf</option>
                    <option value="2">Dauerlauf</option>
                    <option value="3">Andere Aktivität</option>
                </select>
                <!-- Wenn beim Select OL ausgewählt wird-> Session wird später gebraucht -->
                <form id="sportat-ol" class="backgrundGrayTransparent" action="insertevent" method="post"
                      enctype="multipart/form-data">
                    <?php $_SESSION["sportart"] = 1; ?>
                    <div id="karte">
                        <p>Karte:</p>
                        <input type="text" name='nameK' class='inp' placeholder="Name" required>
                        <input type="text" name='ort' class='inp' placeholder="Ort" required>
                        <input type="text" name='stand' class='inp' placeholder="Stand" required>
                        <input type="text" name='massstab' class='inp' placeholder="Massstab" required>
                        <select class="drp" id="gGr" name="Gelaende_grob">
                            <option value="0" selected="selected">Gelände grob</option>
                            <option value="1">technisch anspruchsvoll</option>
                            <option value="2">Urban</option>
                            <option value="3">Blocherwald</option>
                            <option value="4">Park</option>
                        </select>
                        <select class="drp" id="gFe" name="Gelaende_fein">
                            <option value="0" selected="selected">Gelaende fein</option>
                            <option value="1">Jura</option>
                            <option value="2">Alpin</option>
                            <option value="3">Mittelland</option>
                        </select>
                    </div>
                    <div id="ol">
                        <p>OL:</p>
                        <select class="drp" id="dekl" name="deklaration">
                            <option value="0" selected="selected">Deklaration</option>
                            <option value="1">Training</option>
                            <option value="2">Regionaler OL</option>
                            <option value="3">Nationaler OL</option>
                            <option value="4">Internationaler OL</option>
                        </select>
                        <select class="drp" id="disz" name="disziplin">
                            <option value="0" selected="selected">Disziplin</option>
                            <option value="1">Langdistanz</option>
                            <option value="2">Normaldistanz</option>
                            <option value="3">Mitteldistanz</option>
                            <option value="4">Sprint</option>
                            <option value="5">Staffel</option>
                            <option value="6">Nacht-OL</option>
                        </select>
                        <!-- Wenn die Werte aus dem GPX ausgelesen werden konnten werden diese Inputs nicht angezeigt-->
                        <?php if (!isset($_SESSION['aktGPXn']['Distanz'])) { ?>
                            <input type="text" name='distanz' class='inp' placeholder="Distanz in KM" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['time'])) { ?>
                            <input type="text" name='dauer' class='inp' placeholder="Dauer: 0:55'17" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['Datum'])) { ?>
                            <input type="text" name='datum' class='inp' placeholder="Datum: 2001-07-11" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['verticalheight'])) { ?>
                            <input type="text" name='verticalheight' class='inp' placeholder="Höhenmeter in Meter"
                                   required>
                        <?php } ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="jpgkarte"
                                   accept="image/*">
                            <label class="custom-file-label" for="inputGroupFile01">Katrte hinzufügen</label>
                        </div>
                    </div>

                    <div class="btn">
                        <input type="submit" class="button btnsave" value="Speichern"></inut>
                    </div>
                </form>
                <!-- Wenn beim Select DL ausgewählt wird-> Session wird später gebraucht -->
                <form id="sportat-dl" class="backgrundGrayTransparent" action="insertevent" method="post">
                    <?php $_SESSION["sportart"] = 2; ?>
                    <div id="karte">
                        <p>Dauerlauf:</p>
                        <input type="text" name='nameK' class='inp' placeholder="Name" required>
                        <select class="drp" id="gGr" name="DL_Form">
                            <option value="0" selected="selected">Form</option>
                            <option value="1">Intervall</option>
                            <option value="2">schneller DL</option>
                            <option value="3">mittlerer DL</option>
                            <option value="4">langsamer DL</option>
                            <option value="5">Footing</option>
                        </select>
                        <!-- Wenn die Werte aus dem GPX ausgelesen werden konnten werden diese Inputs nicht angezeigt-->
                        <?php if (!isset($_SESSION['aktGPXn']['Distanz'])) { ?>
                            <input type="text" name='distanz' class='inp' placeholder="Distanz in KM" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['time'])) { ?>
                            <input type="text" name='dauer' class='inp' placeholder="Dauer in Min" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['Datum'])) { ?>
                            <input type="date" name='datum' class='inp' placeholder="Datum: 2001-07-11" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['verticalheight'])) { ?>
                            <input type="text" name='verticalheight' class='inp' placeholder="Höhenmeter in Meter"
                                   required>
                        <?php } ?>
                    </div>
                    <div class="btn">
                        <input type="submit" class="button btnsave" value="Speichern"></inut>
                    </div>
                </form>
                <!-- Wenn beim Select anders ausgewählt wird-> Session wird später gebraucht -->
                <form id="sportat-anders" class="backgrundGrayTransparent" action="insertevent" method="post">
                    <?php $_SESSION["sportart"] = 3; ?>
                    <div id="karte">
                        <p>Andere Aktivität:</p>
                        <input type="text" name='nameK' class='inp' placeholder="Name" required>
                        <select class="drp" id="gGr" name="Intens_Select">
                            <option value="0" selected="selected">Intensität</option>
                            <option value="1">regenerativ</option>
                            <option value="2">extensiv</option>
                            <option value="3">mittel</option>
                            <option value="4">intensiv</option>
                            <option value="5">überschwellig</option>
                        </select>
                        <!-- Wenn die Werte aus dem GPX ausgelesen werden konnten werden diese Inputs nicht angezeigt-->
                        <?php if (!isset($_SESSION['aktGPXn']['Distanz'])) { ?>
                            <input type="text" name='distanz' class='inp' placeholder="Distanz in KM" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['time'])) { ?>
                            <input type="text" name='dauer' class='inp' placeholder="Dauer in Min" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['Datum'])) { ?>
                            <input type="date" name='datum' class='inp' placeholder="Datum: 2001-07-11" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['verticalheight'])) { ?>
                            <input type="text" name='verticalheight' class='inp' placeholder="Höhenmeter in Meter"
                                   required>
                        <?php } ?>
                    </div>
                    <div class="btn">
                        <input type="submit" class="button btnsave" value="Speichern"></inut>
                    </div>
                </form>
            </div>
        </article>
    </main>
    <?php
}
//Wird angezeigt, wenn man die Auswertung einem Termin hinzufügen will
elseif(1==1){
    ?>
    <main id="content">
        <article class="contFormular" style="height: auto">
            <div class="formular">
                <form id="sportat-ol" class="backgrundGrayTransparent" action="updateevent" method="post"
                      enctype="multipart/form-data" style="display: block; overflow: hidden; height: auto">
                    <?php $_SESSION["sportart"] = 1; ?>
                    <div style="overflow: auto">
                    <div id="karte">
                        <p>Karte:</p>
                        <?php if (isset($_SESSION['aktDetailInfo']['MapName'])) { ?>
                        <input type="text" name='nameK' class='inp' value="<?php echo $_SESSION['aktDetailInfo']['MapName']; ?>" required>
                        <?php } ?>
                        <?php if (isset($_SESSION['aktDetailInfo']['ort'])) { ?>
                        <input type="text" name='ort' class='inp' value="<?php echo $_SESSION['aktDetailInfo']['ort']; ?>" required>
                        <?php } ?>
                        <input type="text" name='stand' class='inp' placeholder="Stand" required>
                        <input type="text" name='massstab' class='inp' placeholder="Massstab" required>
                        <select class="drp" id="gGr" name="Gelaende_grob">
                            <option value="0" selected="selected">Gelände grob</option>
                            <option value="1">technisch anspruchsvoll</option>
                            <option value="2">Urban</option>
                            <option value="3">Blocherwald</option>
                            <option value="4">Park</option>
                        </select>
                        <select class="drp" id="gFe" name="Gelaende_fein">
                            <option value="0" selected="selected">Gelaende fein</option>
                            <option value="1">Jura</option>
                            <option value="2">Alpin</option>
                            <option value="3">Mittelland</option>
                        </select>
                    </div>
                    <div id="ol">
                        <p>OL:</p>
                        <select class="drp" id="dekl" name="deklaration">
                            <option value="0" selected="selected">Deklaration</option>
                            <option value="1">Training</option>
                            <option value="2">Regionaler OL</option>
                            <option value="3">Nationaler OL</option>
                            <option value="4">Internationaler OL</option>
                        </select>
                        <select class="drp" id="disz" name="disziplin">
                            <option value="0" selected="selected">Disziplin</option>
                            <option value="1">Langdistanz</option>
                            <option value="2">Normaldistanz</option>
                            <option value="3">Mitteldistanz</option>
                            <option value="4">Sprint</option>
                            <option value="5">Staffel</option>
                            <option value="6">Nacht-OL</option>
                        </select>

                        <?php if (!isset($_SESSION['aktGPXn']['Distanz'])) { ?>
                            <input type="text" name='distanz' class='inp' placeholder="Distanz in KM" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['time'])) { ?>
                            <input type="text" name='dauer' class='inp' placeholder="Dauer: 0:55'17" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['Datum'])) { ?>
                            <input type="text" name='datum' class='inp' placeholder="Datum: 2001-07-11" required>
                        <?php } ?>
                        <?php if (!isset($_SESSION['aktGPXn']['verticalheight'])) { ?>
                            <input type="text" name='verticalheight' class='inp' placeholder="Höhenmeter in Meter"
                                   required>
                        <?php } ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="jpgkarte"
                                   accept="image/*">
                            <label class="custom-file-label" for="inputGroupFile01">Katrte hinzufügen</label>
                        </div>
                    </div>
                    </div>

                    <div id="auswertung">
                        <div class="continer_aus_ueb">
                            <div class="aus_ueb">
                                <p>Auswertung</p>
                            </div>
                            <label class="switch" onclick="switchSlider()">
                                <input type="checkbox" id="slider_chbx">
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <textarea placeholder="Auswertung:" rows="20" name="auswertung"  id="auswetung_txt" cols="40" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
                    </div>
                    <div class="btn" style="margin-top: 5px">
                        <input type="submit" class="button btnsave" value="Speichern" style="margin-top: 5px"></inut>
                    </div>
                </form>
            </div>
        </article>
    </main>
<?php
}
unset($_SESSION['aktDetailInfo']);
?>