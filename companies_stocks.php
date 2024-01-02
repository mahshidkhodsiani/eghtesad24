<div class="table-responsive">
    <table class="table header-border table-hover verticle-middle">

        <thead>
            <tr>
                <th scope='col'>شرکت</th>
                <th scope='col'>ارزش بازار</th>
                <th scope='col'>قیمت سهام</th>
                <th scope='col'>تغییرات</th>
                <th scope='col'>حجم</th>
                <!-- <th scope='col'>P/E Ratio</th> -->
                <!-- <th scope='col'>EPS</th> -->
                <!-- <th scope='col'>Dividend</th> -->
                <!-- <th scope='col'>Dividend Yield</th> -->
                <!-- <th scope='col'>PEG Ratio</th> -->
                <th scope='col'>بخش</th>
                <!-- <th scope='col'>Recommendation</th> -->
            </tr>
        </thead>

        <tbody id="stockTableBody">

        </tbody>
    </table>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    <?php
            
            // PHP code to read JSON data from file
            $jsonFile = './Companies/table_data.json';  // Change this to the actual file path

            if (file_exists($jsonFile)) {
                $jsonData = json_decode(file_get_contents($jsonFile), true);
                
            } else {
                $jsonData = [];
            }

            ?>

    // Function to create a table row
    function createTableRow(data) {
        var row = "<tr>";

        for (var i = 0; i < data.length; i++) {
            if (i !== 5 && i !== 6 && i !== 7 && i !== 8 && i !== 9 && i !== 11) {
                if (i === 0 && data[i].endsWith("D")) {
                    var modifiedString = data[i].slice(0, -1);
                    row += "<td>" + modifiedString + "</td>";
                } else {
                    row += "<td>" + data[i] + "</td>";
                }
            }
        }
        row += "</tr>";
        return row;
    }

    // Creating the table
    var tableHTML = "";

    <?php for ($i = 0; $i < count($jsonData) ; $i++) { ?>
    tableHTML += createTableRow(<?php echo json_encode($jsonData[$i]); ?>);
    <?php
            }
            ?>

    // Displaying the table
    document.getElementById("stockTableBody").innerHTML = tableHTML;

});
</script>