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

        // add_emails_to_table(emails);
    });

    function add_emails_to_table(emails) {
        emails.forEach(function (email, index) {
            var button_delete = '<button type="button" class="close delete-email" aria-label="Close">'
                + '<span aria-hidden="true">&times;</span>'
                + '</button>';

            var table_row = '<tr><td id="modal_user_email"' + index + '>'
                + (index + 1) + ". "
                + email
                + "     " + button_delete
                + '</td>'
                + '</tr>';

            $('#users-emails-table').append(table_row);
        });
    }

    function delete_modal_data() {
        $('#users-emails-table').empty();
    }

    function delete_email()
    {

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