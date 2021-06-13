 $(document).ready(function() {
            function loadTable(page) {
                $.ajax({
                    url: "ajax-load.php",
                    type: "POST",
                    data: {page_no :page },
                    success: function(data) {
                        $('#table-data').html(data);
                    }
                });
            }
            loadTable();

            //pagination code
            $(document).on('click','#pagination a',function(e){
                e.preventDefault();
                let page_id = $(this).attr('id');
                loadTable(page_id);
            })

            //insert record
            $('#save-button').on('click', function(e) {
                e.preventDefault();
                let fname = $('#fname').val();
                let lname = $('#lname').val();

                if (fname == '' || lname == '') {
                    $('#error-message').html('All fields are required').slideDown();
                    $('#success-message').slideUp();
                } else {
                    $.ajax({
                        url: "ajax-insert.php",
                        type: "POST",
                        data: {
                            first_name: fname.trim(),
                            last_name: lname.trim()
                        },
                        success: function(data) {
                            if (data == 1) {
                                loadTable();
                                $('#addForm').trigger('reset');
                                $('#success-message').html("Data Inserted successfully").slideDown();
                                $('#error-message').slideUp();
                            } else {

                                $('#error-message').html("Can't Save Record. ").slideDown();
                                $('#success-message').slideUp();
                            }

                        }
                    });
                }
            });
            //delete record
            $(document).on('click', '.delete-btn', function() {
                
                let studentID = $(this).data('id');
                let element = this;
                if (confirm('Do you really want to delete this record?')) {
                    $.ajax({
                        url: '148.ajax_delete.php',
                        type: 'POST',
                        data: {
                            id: studentID
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(element).closest('tr').fadeOut();
                                $('#success-message').html("Record deleted successfully").slideDown();
                                $('#error-message').slideUp();
                            } else {
                                $('#error-message').html("Can't delete Record. ").slideDown();
                                $('#success-message').slideUp();
                            }
                        }
                    });
                }
            });
            //update data
            //===========//
            //show Modal Box
            $(document).on('click', '.edit-btn', function() {
                $('#modal').show();
                let studentID = $(this).data('eid');

                $.ajax({
                    url: '149.ajax-update.php',
                    type: 'POST',
                    data: {
                        id: studentID
                    },
                    success: function(data) {
                        $('#modal-form table').html(data);
                    }
                })
            });

            //Hide Modal Box
            $('#close-btn').on('click', function() {
                $('#modal').hide();
            });

            //save update form
            $(document).on('click', '#edit-submit', function() {
                let stuID = $('#edit-id').val();
                let fname = $('#edit-fname').val();
                let lname = $('#edit-lname').val();
                if(fname == "" || lname == ""){
                     $('#uerror-message').html('All fields are required').slideDown();
                    $('#success-message').slideUp();
                }else{
                    $.ajax({
                    url: 'ajax-update-form.php',
                    type: 'POST',
                    data: {
                        id: stuID,
                        first_name: fname,
                        last_name: lname
                    },
                    success: function(data) {
                        if (data == 1) {
                            $('#modal').hide();
                            loadTable();
                            $('#success-message').html("Data Updated successfully").slideDown();
                            $('#error-message').slideUp();
                        }

                    }
                });
                }
                

            });

            //Live Search
            $('#search').on('keyup',function(){
                let search_term = $(this).val();
                $.ajax({
                    url: '150.ajax-live-search.php',
                    type: 'POST',
                    data :{search : search_term},
                    success: function(data){
                        $('#table-data').html(data);
                    }
                });
            });
            


        });