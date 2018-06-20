<main id="content">
    <article class="contFormular">
        <div class="formular">
            <form>
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
                    <input type="text" name='distanz' class='inp' placeholder="Distanz in KM" required>
                    <input type="text" name='dauer' class='inp' placeholder="Dauer in Min" required>
                    <input type="text" name='datum' class='inp' placeholder="Datum: 2001-07-11" required>
                </div><div class="btn">
                    <input type="submit" class="button btnsave"></inut>
                </div>
            </form>
        </div>
    </article>
</main>
