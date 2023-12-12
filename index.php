<!DOCTYPE html>
<html>
<head>
<title>Contact Management</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <!------------->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
<!-- DataTables JS library -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <style type="text/css">
        .bs-example{
            margin: 20px;
        }
    </style>
</head>
<body>

    <div class="bs-example">
        <h2 class="float-left">Liste des contacts</h2>
        <button id="add-contact" ><a href="javascript:void(0)" >Add Contact</a></button>
        <table id="contact-table"  style="width:100%">
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>telephone</th>
                    <th>categorie</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    
    <div class="contact-form hidden" id="contact-popup" >
        <form id="contact-form" name="contact-form"  >
            <input type="hidden"  id="mode" name="mode" value="add">
            <input type="hidden"  id="id" name="id">
            <label for="prenom">Prenom:</label>
            <input type="text"  id="prenom" name="prenom" >
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom">
            <label for="telephone">Telephone:</label>
            <input type="text" id="telephone" name="telephone">
            <label for="id_categorie">Category:</label>
            <select id="id_categorie" name="id_categorie">
                <option value="1">Amis</option>
                <option value="2">Professionnels</option>
            </select>
            <input type="submit" id="submit"value="Enregistrer" name="submit"/>
        </form>
    </div>

        <?php include 'ajax.php' ?>
</body>

</html>