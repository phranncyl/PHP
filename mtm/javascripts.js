<script type="text/javascript">
$(document).ready(function() {
    var unique_id = $.gritter.add({
        title: 'Welcome to Dashio!',
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        image: 'img/ui-sam.jpg',
        sticky: false,
        time: 8000,
        class_name: 'my-sticky-class'
    });

    return false;
});

$(document).ready(function() {
    $("#date-popover").popover({
        html: true,
        trigger: "manual"
    });
    $("#date-popover").hide();
    $("#date-popover").click(function(e) {
        $(this).hide();
    });

    $("#my-calendar").zabuto_calendar({
        action: function() {
            return myDateFunction(this.id, false);
        },
        action_nav: function() {
            return myNavFunction(this.id);
        },
        ajax: {
            url: "show_data.php?action=1",
            modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
        },
        {
            type: "block",
            label: "Regular event",
        }]
    });
});

function myNavFunction(id) {
    $("#date-popover").hide();
    var nav = $("#" + id).data("navigation");
    var to = $("#" + id).data("to");
    console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}
</script>

<script>
function openFileInput() {
    // Simulate a click on the file input element
    document.getElementById('fileInput').click();
}

function handleFileSelection() {
    // This function is called when a file is selected
    var selectedFile = document.getElementById('fileInput').files[0];
    console.log('Selected file:', selectedFile);
    // You can perform additional actions with the selected file if needed
}
</script>