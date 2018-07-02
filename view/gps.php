<main id="content">
    <article class="big" id="welcome">
        <h1 class="dark">Training</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.
        </p>
    </article>
    <div class="small" id="ug1">
        <article class="art">
            <h2 class="light">Alle Trianings auf einen Blick</h2>
        </article>
        <div class="btn">
            <a href="gpsarchiv">
                <div class="button">
                    <span>Mehr</span>
                </div>
            </a>
        </div>
    </div>

    <div class="small" id="ug2">
        <h2 class="dark centerTxt">Neue Einheit erfassen</h2>

        <div class="btn btnnewrunto">
            <div  id="" class="button btndark" style="visibility:hidden" ><span>Einheit Planen</span></div></a>
            <div  id="btnnewrun" class="button btndark" ><span>Einheit erfassen</span></div></a>
        </div>
    </div>
    <div class="small" id="ug3">
        <article class="art">
            <h2 class="light">Alle Termine auf einen Blick</h2>
        </article>
        <div class="btn">
            <a href="#">
                <div class="button">
                    <span>Mehr</span>
                </div>
            </a>
        </div>
    </div>

    <div class="small" id="ug2">
        <h2 class="dark centerTxt" style="margin-bottom:20px ">Neuer OL planen</h2>
        <p class="dark centerTxt" style="margin: 0; margin-bottom: 20px">Für die Planung und Zielsetzung kannst du entweder einen Termin selbst erstellen oder einen Wettkampf auswählen, der beim SOLV eingetragen ist.</p>
        <div class="btn btnnewrunto" style="margin: 0 auto">
            <a href="termine?strdat=now">
            <div  id="" class="button btndark"><span>Temin vom SOLV</span></div></a>
            <a href="newtermin">
            <div  id="btnnewrun" class="button btndark" ><span>Eigener Termin</span></div></a>
        </div>
    </div>


    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Neue Einheit erfassen</h2>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <form action="uploadgpx" method="post" enctype="multipart/form-data">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="gpxfile" accept=".gpx">
                            <label class="custom-file-label" for="inputGroupFile01">Bitte wähle das GPX-File der Einheit aus</label>
                        </div>
                        <br>
                        <input type="submit" class="custom-file-input" id="btnWeiterFile" value="Weiter">
                        <label class="custom-file-label" for="btnWeiterFile">Weiter</label>
                    </form>
                </div>
                <a href="newrun">Kein GPX - lade die Einheit manuell hoch.</a>
            </div>
            <div class="modal-footer">
                <h3></h3>
            </div>
        </div>


    </div>
</main>
