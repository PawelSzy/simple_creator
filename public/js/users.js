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

        get_additional_email(user_id, add_emails_to_table)

    });

    function add_emails_to_table(emails) {
        emails.forEach(function (email, index) {
            var button_delete = '<button type="button" data-email-id='+ email.email_id +' class="close delete-email" aria-label="Close">'
                + '<span aria-hidden="true">&times;</span>'
                + '</button>';

            var table_row = '<tr><td class="email-row" id="modal_user_email"' + index + '>'
                + (index + 1) + ". "
                + email.email
                + "     " + button_delete
                + '</td>'
                + '</tr>';

            $('#users-emails-table').append(table_row);
        });

        $('.delete-email').click(function () {
            delete_email($(this).data('email-id'), function () {
                $(this).closest('.email-row').hide()
            });
        });
    }

    function delete_modal_data() {
        $('#users-emails-table').empty();
    }

    function delete_email(email_id, callback) {
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

    function get_additional_email(id_user, callback) {
        $.ajax({
            type: "GET",
            url: '/user_email' + '/' + id_user,
            success: function (data) {
                console.log(data);

                callback(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }
});