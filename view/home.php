<main id="content">

    <article class="big" id="welcome">


    </article>

    <div class="small" id="b1">

        <article class="art">
            <h2 class="light">Archiv</h2>

            <p class="light">Alle erfassten Trainings auf einen Blick:</p>
        </article>
        <div class="btn">
            <a href="gpsarchiv">
                <div class="button"><span>Mehr</span></div></a>
        </div>
    </div>

    <div class="small" id="b2">
        <h2 class="dark centerTxt">Neue Einheit</h2>

        <div class="btn btnnewrunto">
            <div  id="" class="button btndark" ><span>Einheit Planen</span></div></a>
            <div  id="btnnewrun" class="button btndark" ><span>Einheit erfassen</span></div></a>
        </div>

    </div>

    <div class="smallGps left" id="b3">

        <article class="training">
            <h2 class="light"> zum letzten Eintrag</h2>
        </article>
        <div class="btn">
            <?php $id=selectlastEvent();?>
            <a href="detailansicht<?php echo "?id=".$id ?>">
                <div class="button btndark"><span>Mehr </span></div></a>
        </div>
    </div>

    <div class="small" id="b4">
        <article class="art">
            <h2 class="light">Termine</h2>
        </article>
        <a href="termine?strdat=now">
            <div class="btn">
                <div class="button"><span>Mehr</span></div>
            </div>
        </a>

    </div>


<?php gpxUpload(); unset($_SESSION["aktB_B_ID"]); ?>

</main>
