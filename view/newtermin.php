
<main id="content">
    <article class="contFormular" style="height: auto">
        <div class="formular">
            <form method="post" action="newterminupload" name="zSetzung">
                <input type="text" name='nameK' class='inp' placeholder="Name" required>
                <input type="text" name='ort' class='inp' placeholder="Ort" required>
                <input type="date" name='date' class='inp' placeholder="Datum" required>
                <label class="container">Zielsetzng hinzufügen
                    <input type="radio" checked="checked" name="radioZ" id="mitZ" onclick="radioCh()">
                    <span class="checkmark"></span>
                </label>
                <label class="container">keine Zielsetzng
                    <input type="radio"  name="radioZ" onclick="radioCh()">
                    <span class="checkmark"></span>
                </label>
                <hr>
                <div id="zielsetzung">
                    <p>Zielsetzung</p>
                    <textarea placeholder="Ziele:" rows="20" name="ziele" id="ziele" cols="40" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
                </div>
                <div class="btn" style="margin-bottom: 20px">
                    <input type="submit" class="button btnsave" value="Speichern">
                </div>
            </form>

    </article>
</main>
