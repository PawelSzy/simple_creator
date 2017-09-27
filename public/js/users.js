$(document).ready(function() {
    $('#usersModal').on('show.bs.modal', function (event) {
        delete_modal_data();

        var link = $(event.relatedTarget); // Button that triggered the modal
        // Extract info from data-* attributes
        var email = link.data('email');
        var firstname = link.data('firstname');
        var surname = link.data('surname');
        var user_id = link.data('user_id');
        var modal = $(this);

        // Wyswietl dane na stronie
        $('#modal_email').text(email);
        $('#modal_firstname').text(firstname);
        $('#modal_surname').text(surname);

        ajax_get_additional_emails(user_id, add_emails_to_table);
        enable_add_emails_from_form_data(user_id);
    });

    function add_emails_to_table(emails) {
        var rowCount = $('#users-emails-table tr').length;

        emails.forEach(function (email, index) {
            var button_delete = '<button type="button" data-email-id='+ email.email_id +' class="close delete-email" aria-label="Close">'
                + '<span aria-hidden="true">&times;</span>'
                + '</button>';

            var table_row = '<tr><td class="email-row" id="modal_user_email"' + index + rowCount + '>'
                + (index + 1 + rowCount) + ". "
                + email.email
                + "     " + button_delete
                + '</td>'
                + '</tr>';

            $('#users-emails-table').append(table_row);
        });

        $('.delete-email').click(function () {
            ajax_delete_email($(this).data('email-id'), function () {
                $(this).closest('.email-row').hide()
            });
        });
    }


    function enable_add_emails_from_form_data(user_id) {
        // Add new emails after click add
        $("#add-email-button").click(function (e) {
            e.preventDefault();

            var loginForm = $("#input-form");  //form id

            var formData = loginForm.serializeArray()[0];

            var dataObj = {};

            $(formData).each(function(i, field){
                dataObj[field.name] = field.value;
            });

            ajax_add_additional_email(user_id, dataObj['user_email'], add_emails_to_table);
        });
    }

    function delete_modal_data() {
        $('#users-emails-table').empty();
    }


    //Ajax functions
    function ajax_get_additional_emails(id_user, callback) {
        $.ajax({
            type: "GET",
            url: '/user_email' + '/' + id_user,
            success: function (data) {
                console.log(data);

                callback(data, id_user);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

    function ajax_add_additional_email(user_id, email, callback) {
        $.post( "/user_email_add", { user_id: user_id, email: email})
            .done(function( data ) {
                var email = {};
                
                email.email = data.data.user_email;
                email.user_id = data.data.user_id;
                email.email_id = data.data.email_id;

                if(callback) {
                    callback([email]);
                }
            })
            .fail(function(data) {
                console.log('Error:', data);
            });
    }

    function ajax_delete_email(email_id, callback) {
        $.ajax({
            type: "DELETE",
            url: '/user_email' + '/' + email_id,
            success: function (data) {
                console.log(data);
                if(callback) {
                    callback(data);
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

});