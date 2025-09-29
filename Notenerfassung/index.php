<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Notenerfassung</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-3">Notenerfassung</h1>

    <form id="form_grade" method="post" action="index.php">

        <div class="row">

            <div class="col-sm-6">
                <label for="name">Name*</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       maxlength="20"
                       required="required"
                />
            </div>

            <div class="col-sm-6">
                <label for="email">E-Mail</label>
                <input type="email"
                       name="email"
                       class="form-control"
                />
            </div>

        </div>

        <div class="row">

            <div class="col-sm-4 form-group">
                <label for="subject">Fach*</label>
                <select name="subject"
                        class="form-select"
                        required="required">
                    <option>Mathematik</option>
                    <option>Deutsch</option>
                    <option>Englisch</option>
                </select>


            </div>

            <div class="col-sm-4 form-group">
                <label for="grade">Note*</label>
                <input type="number"
                       name="grade"
                       class="form-control"
                       min="1"
                       max="5"
                       required="required"
                />

            </div>

            <div class="col-sm-4 form-group">
                <label for="examDate">Prüfungsdatum*</label>
                <input type="date"
                       name="examDate"
                       class="form-control"
                       required="required"
                />

            </div>

        </div>

        <div class="row mt-3">

            <div class="col-sm-3 mb-3">
                <input type="submit"
                       name="submit"
                       class="btn btn-primary btn-block"
                       value="Validieren"
                />

            </div>

            <div class="col-sm-3">
                <a href="index.php" class="btn btn-secondary btn-block">Löschen</a>

            </div>

        </div>


    </form>
</div>
</body>
</html>


<?php
?>
