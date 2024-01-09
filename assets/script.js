$(document).ready(function(){
    // Handle mouse-over effect on table rows
    $("table tr:even").css("background-color", "#f2f2f2");
    $("table tr").hover(
        function() {
            $(this).css("background-color", "#ddd");
        },
        function() {
            $(this).css("background-color", $(this).index() % 2 === 0 ? "#f2f2f2" : "#fff");
        }
    );

    // Handle click on username (to show popup with user data)
   $("table").on("click", "tr td:first-child", function() {
           var username = $(this).text();
           $.ajax({
               url: 'user_popup.php',
               type: 'POST',
               data: { username: username },
               beforeSend: function() {
                   // Show a loading indicator while fetching data
                   $(".popup-content").html('<div class="loader"></div>');
               },
               success: function(response) {
                   $(".popup-content").html(response);
                   $(".popup").show();
               },
               error: function() {
                   $(".popup-content").html('<p>Error fetching user details.</p>');
                   $(".popup").show();
               }
           });
       });

    // Close popup on close button click
    $(".close-btn").click(function() {
        $(".popup").hide();
    });

    // Confirm delete button action
    $('#confirmDelete').on('click', function() {
        $.post('delete_user.php', { username: selectedUsername }, function(response) {
            // Handle the response from the server after deletion
            alert(response); // For example, show a success message
            closeModal(); // Close the confirmation modal
            location.reload(); // Refresh the page to update the user table (for demo purposes)
        });
    });


});

// Function to confirm user deletion
function confirmDelete(username) {
    if (confirm(`Are you sure you want to delete user '${username}'?`)) {
        $.ajax({
            url: 'delete_user.php',
            type: 'POST',
            data: { username: username },
            success: function(response) {
                alert(response); // Show deletion status message
                location.reload(); // Refresh the page after deletion (for demo purposes)
            }
        });
    }
}
