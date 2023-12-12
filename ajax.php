<script>
    $(document).ready(function(){
        $('#contact-table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": "getcontacts.php"
        });
    });

  
     // popup functionality
     var showPopup=$("#contact-popup").dialog({ 
        autoOpen: false ,
        height: 500,
        width: 400,
        modal: true,
        
        close: function() {
          add_window.dialog( "close" );
          $('#contact-popup').addClass('hide');
          return null;
        }
    });

    /*  add contact popup */

    $("#add-contact").click(function() {
        showPopup.dialog("open");
    });

    // add form submit
    $('#contact-form').submit(function(e){
        e.preventDefault();
        // ajax
        $.ajax({
            url:"class.contact.php",
            type: "POST",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function(){
                var oTable = $('#contact-table').dataTable(); 
                oTable.fnDraw(false);
                //$('#add-modal').modal('hide');
                showPopup.dialog("close");
                $('#contact-form').trigger("reset");
            }
        });
        return false;
    });  
    /* edit user function */
    $('body').on('click', '.btn-edit', function () {
        var id = $(this).data('id');
        $.ajax({
            url:"class.contact.php",
            type: "POST",
            data: {
                id: id,
                mode: 'edit' 
            },
            dataType : 'json',
            success: function(result){
                console.log(result);
                $('#id').val(result.id);
                $('#prenom').val(result.prenom);
                $('#nom').val(result.nom);
                $('#telephone').val(result.telephone);
                $('#id_categorie').val(result.id_categorie);
                $('#contact-popup').removeClass('hide');
                showPopup.dialog("open");
            }
        });
    }); 

    /* DELETE FUNCTION */

    $('body').on('click', '.btn-delete', function () {
        var id = $(this).data('id');
        if (confirm("Etes vous sur de vouloir supprimer cet element ! "+id)) {
        $.ajax({
            url:"class.contact.php",
            type: "POST",
            data: {
                id: id,
                mode: 'delete' 
            },
            dataType : 'json',
            success: function(result){
                var oTable = $('#contact-table').dataTable(); 
                oTable.fnDraw(false);
            }
        });
        } 
        return false;
    });

</script>